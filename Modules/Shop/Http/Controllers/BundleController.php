<?php

namespace Modules\Shop\Http\Controllers;

use App\Traits\ImageStore;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;
use Modules\Shop\Entities\ShopBundle;
use Modules\Shop\Entities\ShopBundleFile;
use Modules\Shop\Entities\ShopProduct;
use Yajra\DataTables\Facades\DataTables;

class BundleController extends Controller
{
    use ImageStore;

    private const VIDEO_EXTENSIONS = ['mp4', 'avi', 'mov', 'webm', 'mkv', 'flv', 'wmv', 'm4v'];

    /**
     * Shop sidebar entry — same Products screen with Savings & Bundles tab open.
     */
    public function index()
    {
        return view('shop::bundle.index');
    }

    public function create()
    {
        $selectableProducts = $this->selectableProducts();

        return view('shop::bundle.create', compact('selectableProducts'));
    }

    public function edit($id)
    {
        $bundle = ShopBundle::with(['products', 'files', 'videos'])->findOrFail($id);
        $selectableProducts = $this->selectableProducts();
        $selectedProductIds = $bundle->products->pluck('id')->all();

        return view('shop::bundle.edit', compact('bundle', 'selectableProducts', 'selectedProductIds'));
    }

    public function store(Request $request)
    {
        $validator = $this->makeValidator($request);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $totals = $this->calculateTotals($request);

        $bundle = new ShopBundle();
        $this->fillBundle($bundle, $request, $totals);
        $bundle->save();
        $this->syncFeaturedFlag($bundle);
        $bundle->products()->sync($request->input('product_ids', []));
        $this->storeBundleImages($bundle, $request);
        $this->storeBundleVideo($bundle, $request);

        return response()->json([
            'status' => 200,
            'message' => 'Saved successfully',
            'goto' => route('bundle.index'),
        ], 200);
    }

    public function update(Request $request)
    {
        $validator = $this->makeValidator($request, true);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $bundle = ShopBundle::findOrFail($request->id);
        $totals = $this->calculateTotals($request);
        $this->fillBundle($bundle, $request, $totals);
        $bundle->save();
        $this->syncFeaturedFlag($bundle);
        $bundle->products()->sync($request->input('product_ids', []));
        $this->storeBundleImages($bundle, $request);

        if ($request->hasFile('bundle_video')) {
            $this->replaceBundleVideo($bundle, $request);
        }

        return response()->json([
            'status' => 200,
            'message' => 'Updated successfully',
            'goto' => route('bundle.index'),
        ], 200);
    }

    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:shop_bundles,id',
        ]);

        if ($validator->fails()) {
            Toastr::error($validator->errors()->first(), 'Error');
            return redirect()->back();
        }

        $bundle = ShopBundle::with(['files', 'videos'])->findOrFail($request->id);

        foreach ($bundle->files->merge($bundle->videos) as $file) {
            if ($file->file_path) {
                $this->deleteImage($file->file_path);
            }
            $file->delete();
        }

        $bundle->products()->detach();
        $bundle->delete();

        Toastr::success('Deleted successfully', 'Success');

        return redirect()->route('bundle.index');
    }

    public function destroyFile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:shop_bundle_files,id',
        ], [
            'id.required' => 'File Id is required.',
        ]);

        if ($validator->fails()) {
            Toastr::error($validator->errors()->first(), 'Error');
            return redirect()->back();
        }

        try {
            $bundleFile = ShopBundleFile::find($request->id);

            if (empty($bundleFile)) {
                Toastr::error('Record Not Found...', 'Error');
                return redirect()->back();
            }

            if ($bundleFile->file_path) {
                $this->deleteImage($bundleFile->file_path);
            }
            $bundleFile->delete();

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->back();
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function changeStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:shop_bundles,id',
            'status' => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first(),
            ], 400);
        }

        try {
            $bundle = ShopBundle::findOrFail($request->id);
            $bundle->status = ((string) $request->status === '1');
            $bundle->save();

            return response()->json([
                'success' => trans('common.Status has been changed'),
                'status' => $bundle->status ? 1 : 0,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function getAllData(Request $request)
    {
        $query = ShopBundle::query();

        return Datatables::of($query)
            ->addIndexColumn()
            ->editColumn('name', function ($query) {
                return $query->name;
            })
            ->addColumn('short_description', function ($query) {
                return \Illuminate\Support\Str::limit(strip_tags($query->short_description ?? ''), 60);
            })
            ->addColumn('price', function ($query) {
                return $query->price;
            })
            ->addColumn('total_amount', function ($query) {
                return $query->total_amount;
            })
            ->addColumn('status', function ($query) {
                return view('shop::partials._td_bundle_status', compact('query'));
            })
            ->addColumn('action', function ($query) {
                return view('shop::partials._td_bundle_action', compact('query'));
            })
            ->rawColumns(['name', 'short_description', 'price', 'total_amount', 'status', 'action'])
            ->make(true);
    }

    private function selectableProducts()
    {
        return ShopProduct::query()
            ->whereIn('type', [1, 2, 3, 4])
            ->where('status', '1')
            ->orderBy('type')
            ->orderBy('title')
            ->get(['id', 'title', 'type']);
    }

    private function makeValidator(Request $request, bool $isUpdate = false)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'component_1' => 'nullable|string|max:255',
            'component_2' => 'nullable|string|max:255',
            'component_3' => 'nullable|string|max:255',
            'component_4' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'tax_percent' => 'required|numeric|min:0|max:100',
            'discount_type' => 'nullable|in:fixed,percent',
            'discount' => 'nullable|numeric|min:0',
            'product_ids' => 'required|array|min:1',
            'product_ids.*' => 'exists:shop_products,id',
            'status' => 'nullable|in:0,1',
            'is_featured' => 'nullable|in:0,1',
            'bundle_video' => 'nullable|file|mimes:mp4,avi,mov,webm,mkv,flv,wmv,m4v|max:1024',
        ];

        if ($isUpdate) {
            $rules['id'] = 'required|exists:shop_bundles,id';
            $rules['bundle_images'] = 'nullable|array|min:1';
            $rules['bundle_images.*'] = 'file|mimes:jpeg,jpg,png|max:2048';
        } else {
            $rules['bundle_images'] = 'required|array|min:1';
            $rules['bundle_images.*'] = 'file|mimes:jpeg,jpg,png|max:2048';
        }

        if ($request->input('discount_type') === 'percent') {
            $rules['discount'] = 'nullable|numeric|min:0|max:100';
        }

        return Validator::make($request->all(), $rules, [
            'name.required' => 'The Name field is required.',
            'price.required' => 'The Price field is required.',
            'tax_percent.required' => 'The Tax Percent field is required.',
            'product_ids.required' => 'Please select at least one product.',
            'product_ids.min' => 'Please select at least one product.',
            'bundle_images.required' => 'Please upload at least one bundle image.',
            'bundle_images.min' => 'Please upload at least one bundle image.',
            'bundle_images.*.mimes' => 'Only JPEG and PNG images are allowed.',
            'bundle_images.*.max' => 'Each Bundle Image may not be greater than 2MB.',
            'bundle_video.mimes' => 'Only video files (mp4, avi, mov, webm, mkv, flv, wmv, m4v) are allowed.',
            'bundle_video.max' => 'Bundle Video may not be greater than 1MB.',
        ]);
    }

    private function calculateTotals(Request $request): array
    {
        $price = (float) $request->price;
        $discount = 0;

        if ($request->discount_type === 'fixed') {
            $discount = min((float) $request->discount, $price);
        } elseif ($request->discount_type === 'percent') {
            $discount = ($price * (float) $request->discount) / 100;
        }

        $taxableAmount = $price - $discount;
        $totalTax = ($taxableAmount * (float) $request->tax_percent) / 100;
        $totalAmount = $taxableAmount + $totalTax;

        return [
            'total_discount' => $discount,
            'total_tax' => $totalTax,
            'total_amount' => $totalAmount,
        ];
    }

    private function fillBundle(ShopBundle $bundle, Request $request, array $totals): void
    {
        $bundle->name = $request->name;
        $bundle->short_description = $request->short_description;
        $bundle->component_1 = $request->component_1;
        $bundle->component_2 = $request->component_2;
        $bundle->component_3 = $request->component_3;
        $bundle->component_4 = $request->component_4;
        $bundle->price = $request->price;
        $bundle->tax_percent = $request->tax_percent;
        $bundle->discount_type = $request->discount_type ?: null;
        $bundle->discount = $request->discount;
        $bundle->total_amount = $totals['total_amount'];
        $bundle->total_tax = $totals['total_tax'];
        $bundle->total_discount = $totals['total_discount'];
        $bundle->status = ((string) $request->input('status', '1') === '1');
        $bundle->is_featured = ((string) $request->input('is_featured', '0') === '1');
    }

    /**
     * Only one bundle should carry the Best Value badge.
     */
    private function syncFeaturedFlag(ShopBundle $bundle): void
    {
        if (!$bundle->is_featured) {
            return;
        }

        ShopBundle::query()
            ->where('id', '!=', $bundle->id)
            ->where('is_featured', 1)
            ->update(['is_featured' => 0]);
    }

    private function storeBundleImages(ShopBundle $bundle, Request $request): void
    {
        if (!$request->hasFile('bundle_images')) {
            return;
        }

        foreach ($request->file('bundle_images') as $image) {
            $path = $this->saveImage($image);

            ShopBundleFile::create([
                'bundle_id' => $bundle->id,
                'file_name' => $image->getClientOriginalName(),
                'file_path' => $path,
                'file_type' => $image->getClientOriginalExtension(),
                'is_primary' => false,
            ]);
        }
    }

    private function storeBundleVideo(ShopBundle $bundle, Request $request): void
    {
        if (!$request->hasFile('bundle_video')) {
            return;
        }

        $video = $request->file('bundle_video');
        $path = $this->saveFile($video);

        ShopBundleFile::create([
            'bundle_id' => $bundle->id,
            'file_name' => $video->getClientOriginalName(),
            'file_path' => $path,
            'file_type' => $video->getClientOriginalExtension(),
            'is_primary' => false,
        ]);
    }

    private function replaceBundleVideo(ShopBundle $bundle, Request $request): void
    {
        $existingVideos = ShopBundleFile::where('bundle_id', $bundle->id)
            ->whereIn('file_type', self::VIDEO_EXTENSIONS)
            ->get();

        foreach ($existingVideos as $existingVideo) {
            if ($existingVideo->file_path) {
                $this->deleteImage($existingVideo->file_path);
            }
            $existingVideo->delete();
        }

        $this->storeBundleVideo($bundle, $request);
    }
}

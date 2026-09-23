<?php

namespace Modules\FrontendManage\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\FileStore;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Modules\FrontendManage\Entities\ResourceTab;

class ResourceController extends Controller
{
    use FileStore;

    public function index()
    {
        try {
            $resources = ResourceTab::orderBy('category')
                ->orderByDesc('is_featured')
                ->orderBy('pos')
                ->orderByDesc('id')
                ->get();

            return view('frontendmanage::resource.index', compact('resources'));
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function create()
    {
        return view('frontendmanage::resource.add');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'short_description' => 'required|max:1000',
            'category' => 'required|in:' . ResourceTab::CATEGORY_STUDENT . ',' . ResourceTab::CATEGORY_CE,
            'file' => 'required|file|mimes:pdf|max:20480',
        ];
        $this->validate($request, $rules, validationMessage($rules));

        try {
            $resource = new ResourceTab();
            $resource->name = $request->name;
            $resource->short_description = $request->short_description;
            $resource->category = $request->category;
            $resource->file_path = static::saveFile($request->file('file'));
            $resource->is_featured = $request->boolean('is_featured');
            $resource->status = 1;
            $resource->pos = (ResourceTab::max('pos') ?? 0) + 1;
            $resource->save();

            $this->syncFeaturedFlag($resource);

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->route('frontend.resource_center.index');
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function edit($id)
    {
        try {
            $tab = ResourceTab::findOrFail($id);

            return view('frontendmanage::resource.add', compact('tab'));
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function update(Request $request)
    {
        $rules = [
            'id' => 'required|exists:resource_tabs,id',
            'name' => 'required|max:255',
            'short_description' => 'required|max:1000',
            'category' => 'required|in:' . ResourceTab::CATEGORY_STUDENT . ',' . ResourceTab::CATEGORY_CE,
            'file' => 'nullable|file|mimes:pdf|max:20480',
        ];
        $this->validate($request, $rules, validationMessage($rules));

        try {
            $resource = ResourceTab::findOrFail($request->id);
            $resource->name = $request->name;
            $resource->short_description = $request->short_description;
            $resource->category = $request->category;
            $resource->is_featured = $request->boolean('is_featured');

            if ($request->hasFile('file')) {
                $this->deleteStoredFile($resource->file_path);
                $resource->file_path = static::saveFile($request->file('file'));
            }

            $resource->save();

            $this->syncFeaturedFlag($resource);

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->route('frontend.resource_center.index');
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function destroy($id)
    {
        try {
            $resource = ResourceTab::findOrFail($id);
            $this->deleteStoredFile($resource->file_path);
            $resource->delete();

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->back();
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function changeTabSequence()
    {
        $payload = json_decode(file_get_contents('php://input'), true);
        $order = $payload['order'] ?? [];

        foreach ($order as $item) {
            ResourceTab::where('id', $item['id'])->update(['pos' => $item['new_position']]);
        }

        return response()->json(200);
    }

    private function syncFeaturedFlag(ResourceTab $resource): void
    {
        if (!$resource->is_featured) {
            return;
        }

        ResourceTab::where('category', $resource->category)
            ->where('id', '!=', $resource->id)
            ->update(['is_featured' => false]);
    }

    private function deleteStoredFile(?string $path): void
    {
        if (!$path) {
            return;
        }

        $absolutePath = $this->resolveFilePath($path);

        if ($absolutePath && File::exists($absolutePath)) {
            File::delete($absolutePath);
        }
    }

    private function resolveFilePath(?string $path): ?string
    {
        if (!$path) {
            return null;
        }

        $candidates = [
            storage_path('app/' . ltrim($path, '/')),
            public_path(ltrim($path, '/')),
            base_path(ltrim($path, '/')),
        ];

        foreach ($candidates as $candidate) {
            if (File::exists($candidate)) {
                return $candidate;
            }
        }

        return null;
    }
}

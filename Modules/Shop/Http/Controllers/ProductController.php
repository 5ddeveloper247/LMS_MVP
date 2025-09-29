<?php

namespace Modules\Shop\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Modules\Shop\Entities\ShopProduct;
use Modules\Shop\Entities\ShopProductFile;
use App\Traits\ImageStore;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    
     use ImageStore;

    public function index()
    {
        return view('shop::product.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('shop::product.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $rules = [
            'type'              => 'required|in:1,2', // 1=product, 2=book
            'title'             => 'required|string|max:255',
            'sub_title'         => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'description'       => 'nullable|string',
            'price'             => 'required|numeric|min:0',
            'tax_percent'       => 'required|numeric|min:0|max:100',
            'discount_type'     => 'nullable|in:fixed,percent',
            'inventory'         => 'required|numeric|min:1',
            // 'discount'          => [
            //                         'nullable',
            //                         'numeric',
            //                         'min:0',
            //                         Rule::when($request->discount_type === 'percent', ['max:100']),
            //                     ],
    
            // Product images (array of files)
            'product_images'      => 'required|array|min:1',
            'product_images.*'    => 'file|mimes:jpeg,jpg,png|max:2048', // 2MB per image
        ];
    
        $discountRules = ['nullable', 'numeric', 'min:0'];

        // if discount_type is percent, add max:100
        if ($request->input('discount_type') === 'percent') {
            $discountRules[] = 'max:100';
        }

        $rules['discount'] = $discountRules;

        // Extra validations if type is "book"
        if ($request->type == 2) {
            $rules = array_merge($rules, [
                'author'           => 'required|string|max:255',
                'publisher'        => 'required|string|max:255',
                'publication_date' => 'required|date',
                'book_pdf'         => 'required|mimes:pdf|max:20480', // 20MB max
            ]);
        }

        $messages = [
            'type.required'         => 'Please select a type (Product or Book).',
            'type.in'               => 'Invalid type selected.',
        
            'title.required'        => 'The Title field is required.',
            'title.max'             => 'The Title may not be greater than 255 characters.',
        
            'sub_title.required'    => 'The Sub Title field is required.',
            'sub_title.max'         => 'The Sub Title may not be greater than 255 characters.',
        
            'short_description.required' => 'The Short Description field is required.',
            'short_description.max'      => 'The Short Description may not be greater than 500 characters.',
        
            'price.required'        => 'The Price field is required.',
            'price.numeric'         => 'The Price must be a valid number.',
            'price.min'             => 'The Price must be at least 0.',
        
            'tax_percent.required'  => 'The Tax Percent field is required.',
            'tax_percent.numeric'   => 'The Tax Percent must be a number.',
            'tax_percent.max'       => 'The Tax Percent may not be greater than 100.',
            'tax_percent.min'       => 'The Tax Percent must be at least 0.',
        
            'discount_type.in'      => 'The Discount Type must be either fixed or percent.',
            'discount.numeric'      => 'The Discount must be a number.',
            'discount.min'          => 'The Discount must be at least 0.',
            'discount.max'          => 'When discount type is percent, the Discount must not be greater than 100.',
        
            'inventory.required'    => 'The Inventory field is required.',
            'inventory.numeric'     => 'The Inventory must be a valid number.',
            'inventory.min'         => 'The Inventory must be at least 1.',

            'product_images.required' => 'Please upload at least one product image.',
            'product_images.array'    => 'Product Images must be an array.',
            'product_images.min'      => 'Please upload at least one product image.',
            'product_images.*.file'   => 'Each Product Image must be a file.',
            'product_images.*.mimes'  => 'Only JPEG and PNG images are allowed.',
            'product_images.*.max'    => 'Each Product Image may not be greater than 2MB.',
        
            // Book-only fields
            'author.required'       => 'The Author field is required for books.',
            'publisher.required'    => 'The Publisher field is required for books.',
            'publication_date.required' => 'The Publication Date is required for books.',
            'publication_date.date' => 'The Publication Date must be a valid date.',
            'book_pdf.required'     => 'Please upload the Book PDF.',
            'book_pdf.mimes'        => 'Only PDF files are allowed.',
            'book_pdf.max'          => 'The Book PDF may not be greater than 20MB.',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message'   => $validator->errors()->first()
            ], 422);
        }
    
        $price     = $request->price;
        $discount  = 0;

        // Calculate discount
        if ($request->discount_type === 'fixed') {
            $discount = min($request->discount, $price); // avoid negative
        } elseif ($request->discount_type === 'percent') {
            $discount = ($price * $request->discount) / 100;
        }

        // Calculate tax on (price - discount)
        $taxableAmount = $price - $discount;
        $totalTax      = ($taxableAmount * $request->tax_percent) / 100;

        // Final total amount (exclusive of tax/discount)
        $totalAmount   = $taxableAmount + $totalTax;

        $product = new ShopProduct();
        $product->type      = $request->type;
        $product->title     = $request->title;
        $product->sub_title = $request->sub_title;
        $product->short_description = $request->short_description;
        $product->description   = $request->description;
        $product->price         = $request->price;
        $product->tax_percent   = $request->tax_percent;
        $product->discount_type     = $request->discount_type;
        $product->total_inventory   = $request->inventory;
        $product->discount          = $request->discount;
        $product->author            = $request->author;
        $product->publisher         = $request->publisher;
        $product->publication_date  = $request->publication_date;

        $product->total_amount      = $totalAmount; // calculated total amount exculsive of tax and discount
        $product->total_tax         = $totalTax;    // calculated total tax ammount on discounted total
        $product->total_discount    = $discount;    // calculated total discount amount on actual price

        // Upload Book PDF (if provided)
        if ($request->hasFile('book_pdf')) {
            $file = $this->saveFile($request->file('book_pdf'));
            // $data['book_pdf'] = $file;
            $product->book_pdf  = $file;
        }

        $product->save();

        // Handle Product Images (multiple files)
        if ($request->hasFile('product_images')) {
            foreach ($request->file('product_images') as $image) {
                $path = $this->saveImage($image);

                // Save each image/file in shop_product_files table
                ShopProductFile::create([
                    'product_id' => $product->id,
                    'file_name'  => $image->getClientOriginalName(),
                    'file_path'  => $path,
                    'file_type'  => $image->getClientOriginalExtension(), // jpg, png, pdf
                    'is_primary' => false,
                ]);
            }
        }

        return response()->json([
            'status' => 200,
            'message'   => 'Saved successfully',
            'goto'    => route('product.index')
        ], 200);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {

        return view('shop::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {   
        $product = ShopProduct::find($id);

        return view('shop::product.edit', get_defined_vars());
    }

   
    public function update(Request $request)
    {
        $rules = [
            'product_id'        => 'required|exists:shop_products,id',
            'type'              => 'required|in:1,2', // 1=product, 2=book
            'title'             => 'required|string|max:255',
            'sub_title'         => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'description'       => 'nullable|string',
            'price'             => 'required|numeric|min:0',
            'tax_percent'       => 'required|numeric|min:0|max:100',
            'discount_type'     => 'nullable|in:fixed,percent',
            'inventory'         => 'required|numeric|min:1',
            // 'discount'          => ['nullable', 'numeric', 'min:0',
            //                         Rule::when($request->discount_type === 'percent', ['max:100']),],
            // Product images (array of files)
            'product_images'      => 'nullable|array|min:1',
            'product_images.*'    => 'file|mimes:jpeg,jpg,png|max:2048', // 2MB per image
        ];
        
        $discountRules = ['nullable', 'numeric', 'min:0'];

        // if discount_type is percent, add max:100
        if ($request->input('discount_type') === 'percent') {
            $discountRules[] = 'max:100';
        }

        $rules['discount'] = $discountRules;

        // Extra validations if type is "book"
        if ($request->type == 2) {
            $rules = array_merge($rules, [
                'author'           => 'required|string|max:255',
                'publisher'        => 'required|string|max:255',
                'publication_date' => 'required|date',
                'book_pdf'         => 'nullable|mimes:pdf|max:20480', // 20MB max
            ]);
        }
        
        $messages = [
            'type.required'         => 'Please select a type (Product or Book).',
            'type.in'               => 'Invalid type selected.',
            'product_id.required'   => 'The Product Id is required.',
            'title.required'        => 'The Title field is required.',
            'title.max'             => 'The Title may not be greater than 255 characters.',
        
            'sub_title.required'    => 'The Sub Title field is required.',
            'sub_title.max'         => 'The Sub Title may not be greater than 255 characters.',
        
            'short_description.required' => 'The Short Description field is required.',
            'short_description.max'      => 'The Short Description may not be greater than 500 characters.',
        
            'price.required'        => 'The Price field is required.',
            'price.numeric'         => 'The Price must be a valid number.',
            'price.min'             => 'The Price must be at least 0.',
        
            'tax_percent.required'  => 'The Tax Percent field is required.',
            'tax_percent.numeric'   => 'The Tax Percent must be a number.',
            'tax_percent.max'       => 'The Tax Percent may not be greater than 100.',
            'tax_percent.min'       => 'The Tax Percent must be at least 0.',
        
            'discount_type.in'      => 'The Discount Type must be either fixed or percent.',
            'discount.numeric'      => 'The Discount must be a number.',
            'discount.min'          => 'The Discount must be at least 0.',
            'discount.max'          => 'When discount type is percent, the Discount must not be greater than 100.',

            'inventory.required'        => 'The Inventory field is required.',
            'inventory.numeric'         => 'The Inventory must be a valid number.',
            'inventory.min'             => 'The Inventory must be at least 1.',
        
            'product_images.required' => 'Please upload at least one product image.',
            'product_images.array'    => 'Product Images must be an array.',
            'product_images.min'      => 'Please upload at least one product image.',
            'product_images.*.file'   => 'Each Product Image must be a file.',
            'product_images.*.mimes'  => 'Only JPEG and PNG images are allowed.',
            'product_images.*.max'    => 'Each Product Image may not be greater than 2MB.',
        
            // Book-only fields
            'author.required'       => 'The Author field is required for books.',
            'publisher.required'    => 'The Publisher field is required for books.',
            'publication_date.required' => 'The Publication Date is required for books.',
            'publication_date.date' => 'The Publication Date must be a valid date.',
            'book_pdf.required'     => 'Please upload the Book PDF.',
            'book_pdf.mimes'        => 'Only PDF files are allowed.',
            'book_pdf.max'          => 'The Book PDF may not be greater than 20MB.',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message'   => $validator->errors()->first()
            ], 422);
        }

        
        $price     = $request->price;
        $discount  = 0;

        // Calculate discount
        if ($request->discount_type === 'fixed') {
            $discount = min($request->discount, $price); // avoid negative
        } elseif ($request->discount_type === 'percent') {
            $discount = ($price * $request->discount) / 100;
        }

        // Calculate tax on (price - discount)
        $taxableAmount = $price - $discount;
        $totalTax      = ($taxableAmount * $request->tax_percent) / 100;

        // Final total amount (exclusive of tax/discount)
        $totalAmount   = $price + $totalTax;

        $product            = ShopProduct::where('id', @$request->product_id)->first();
        // $product->type      = $request->type;
        $product->title     = $request->title;
        $product->sub_title = $request->sub_title;
        $product->short_description = $request->short_description;
        $product->description   = $request->description;
        $product->price         = $request->price;
        $product->tax_percent   = $request->tax_percent;
        $product->discount_type     = $request->discount_type;
        $product->discount          = $request->discount;
        $product->total_inventory   = $request->inventory;
        $product->author            = $request->author;
        $product->publisher         = $request->publisher;
        $product->publication_date  = $request->publication_date;

        $product->total_amount      = $totalAmount; // calculated total amount exculsive of tax and discount
        $product->total_tax         = $totalTax;    // calculated total tax ammount on discounted total
        $product->total_discount    = $discount;    // calculated total discount amount on actual price

        // Upload Book PDF (if provided)
        if ($request->hasFile('book_pdf')) {

            if($product->book_pdf != null){
                $this->deleteImage($product->book_pdf);
            }

            $file = $this->saveFile($request->file('book_pdf'));
            // $data['book_pdf'] = $file;
            $product->book_pdf  = $file;
        }

        $product->save();

        // Handle Product Images (multiple files)
        if ($request->hasFile('product_images')) {
            foreach ($request->file('product_images') as $image) {
                $path = $this->saveImage($image);

                // Save each image/file in shop_product_files table
                ShopProductFile::create([
                    'product_id' => $product->id,
                    'file_name'  => $image->getClientOriginalName(),
                    'file_path'  => $path,
                    'file_type'  => $image->getClientOriginalExtension(), // jpg, png, pdf
                    'is_primary' => false,
                ]);
            }
        }

        return response()->json([
            'status' => 200,
            'message'   => 'Updated successfully',
            'goto'    => route('product.index')
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        $rules = [
            'id' => 'required'
        ];

        $messages = [
            'id.required' => 'Product Id is required.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message'   => $validator->errors()->first()
            ], 422);
        }

        try {

            $product = ShopProduct::where('id', $request->id)->first();

            if(empty($product)){
                Toastr::success('Record Not Found...', 'Error');
                return redirect()->back();
            }

            if (!empty($product->book_pdf)) {
                $this->deleteImage($product->book_pdf);
            }

            if ($product->files && $product->files->count() > 0) {
                foreach ($product->files as $file) {
                    // Delete physical file
                    $this->deleteImage($file->file_path);
            
                    // Delete record from DB
                    $file->delete();
                }
            }

            $product->delete();
            
            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->back();
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function destroyFile(Request $request)
    {
        $rules = [
            'id' => 'required'
        ];

        $messages = [
            'id.required' => 'File Id is required.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message'   => $validator->errors()->first()
            ], 422);
        }

        try {
            
            $productFile = ShopProductFile::where('id', $request->id)->first();
            
            if(empty($productFile)){
                Toastr::success('Record Not Found...', 'Error');
                return redirect()->back();
            }

            if ($productFile->file_path) {
                $this->deleteImage($productFile->file_path);
                $productFile->delete();
            }

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->back();
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function getAllProductsData(Request $request)
    {
        
        $query = ShopProduct::query();
        $query->where('type', 1); // For Products
        // $query->with($with);

        return Datatables::of($query)
            ->addIndexColumn()
            ->editColumn('title', function ($query) {
                return $query->title;
            })
            ->editColumn('sub_title', function ($query) {
                return $query->sub_title;
            })
            ->addColumn('price', function ($query) {
                return $query->price;
            })
            ->addColumn('tax_percent', function ($query) {
                return $query->tax_percent;
            })
            ->addColumn('status', function ($query) {
                return view('shop::partials._td_status', compact('query'));
            })
            ->addColumn('action', function ($query) {
                return view('shop::partials._td_action', compact('query'));
            })
            ->rawColumns(['title', 'sub_title', 'price', 'tax_percent','status','action'])->make(true);
    }

    public function getAllBooksData(Request $request)
    {
        
        $query = ShopProduct::query();
        $query->where('type', 2); // For Books
        // $query->with($with);

        return Datatables::of($query)
            ->addIndexColumn()
            ->editColumn('title', function ($query) {
                return $query->title;
            })
            ->editColumn('sub_title', function ($query) {
                return $query->sub_title;
            })
            ->addColumn('price', function ($query) {
                return $query->price;
            })
            ->addColumn('tax_percent', function ($query) {
                return $query->tax_percent;
            })
            ->addColumn('status', function ($query) {
                return view('shop::partials._td_status', compact('query'));
            })
            ->addColumn('action', function ($query) {
                return view('shop::partials._td_action', compact('query'));
            })
            ->rawColumns(['title', 'sub_title', 'price', 'tax_percent','status','action'])->make(true);
    }
}

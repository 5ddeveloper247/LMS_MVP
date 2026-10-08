<?php

namespace Modules\FrontendManage\Http\Controllers;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\FrontendManage\Entities\FaqCategory;

class FaqCategoryController extends Controller
{
    public function store(Request $request)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        $rules = [
            'name' => 'required|max:255',
            'slug' => 'nullable|max:255|alpha_dash',
        ];
        $this->validate($request, $rules, validationMessage($rules));

        try {
            $total = FaqCategory::count();
            $category = new FaqCategory;
            $category->name = $request->name;
            $category->slug = $request->filled('slug')
                ? Str::slug($request->slug)
                : Str::slug($request->name);
            $category->eyebrow = $request->eyebrow;
            $category->section_title = $request->section_title;
            $category->order = $total + 1;
            $category->save();

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));

            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        $rules = [
            'id' => 'required|exists:faq_categories,id',
            'name' => 'required|max:255',
            'slug' => 'nullable|max:255|alpha_dash',
        ];
        $this->validate($request, $rules, validationMessage($rules));

        try {
            $category = FaqCategory::findOrFail($request->id);
            $category->name = $request->name;
            $category->slug = $request->filled('slug')
                ? Str::slug($request->slug)
                : Str::slug($request->name);
            $category->eyebrow = $request->eyebrow;
            $category->section_title = $request->section_title;
            $category->save();

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));

            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        try {
            FaqCategory::findOrFail($request->id)->delete();
            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));

            return redirect()->back();
        }
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Modules\FrontendManage\Entities\FaqCategory;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('maintenanceMode');
    }

    public function index()
    {
        $categories = FaqCategory::query()
            ->where('status', 1)
            ->orderByDesc('order')
            ->with(['faqs' => function ($query) {
                $query->where('status', 1)->orderByDesc('order');
            }])
            ->get()
            ->filter(function ($category) {
                return $category->faqs->isNotEmpty();
            })
            ->values();

        return view(theme('pages.faq'), compact('categories'));
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Modules\SystemSetting\Entities\Testimonial;

class SuccessStoriesPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('maintenanceMode');
    }

    public function index()
    {
        $testimonials = Cache::rememberForever('SuccessStoriesList_' . app()->getLocale() . SaasDomain(), function () {
            return Testimonial::select(
                'id',
                'body',
                'image',
                'author',
                'profession',
                'star',
                'program_type',
                'passing_year',
                'featured'
            )
                ->where('status', 1)
                ->latest()
                ->get();
        });

        $featured = $testimonials->firstWhere('featured', true);
        $gridStories = $testimonials
            ->when($featured, function ($collection) use ($featured) {
                return $collection->where('id', '!=', $featured->id);
            })
            ->values();

        $programTypes = Testimonial::PROGRAM_TYPES;

        return view(theme('pages.successStories'), compact('featured', 'gridStories', 'programTypes'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:255',
            'passing_year' => 'required|string|max:10',
            'program_type' => 'required|in:' . implode(',', array_keys(Testimonial::PROGRAM_TYPES)),
            'story' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->to(route('successStories') . '#share-story')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $locale = app()->getLocale() ?: 'en';
            $programLabel = Testimonial::PROGRAM_TYPES[$request->program_type] ?? $request->program_type;

            $testimonial = new Testimonial();
            $testimonial->setTranslation('body', $locale, $request->story);
            $testimonial->setTranslation('author', $locale, $request->name);
            $testimonial->setTranslation('profession', $locale, $programLabel);
            $testimonial->email = $request->email;
            $testimonial->passing_year = $request->passing_year;
            $testimonial->program_type = $request->program_type;
            $testimonial->source = Testimonial::SOURCE_OUTSIDE;
            $testimonial->featured = false;
            $testimonial->status = 0;
            $testimonial->star = 5;
            $testimonial->save();

            Toastr::success('Thank you! Your story was submitted and will appear after admin review.', 'Success');

            return redirect()->to(route('successStories') . '#share-story');
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }
}

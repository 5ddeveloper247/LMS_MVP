<?php

namespace Modules\FrontendManage\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\ImageStore;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Modules\CourseSetting\Entities\Course;
use Modules\FrontendManage\Entities\Slider;
use Modules\Payment\Entities\PaymentPlans;
use Modules\FrontendManage\Entities\FrontPage;

class SliderController extends Controller
{
    use ImageStore;

    public function index()
    {
        try {
            $sliders = Slider::all();
            $data = [];
            if (Settings('frontend_active_theme') == 'tvt') {
                $data['courses'] = Course::select('id', 'title')->where('status', 1)->get();
            }
            $pages=FrontPage::where('status',1)->latest()->get();
            return view('frontendmanage::sliders', $data, compact('sliders','pages'));
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }


    public function store(Request $request)
    {
        $rules = [
            'image' => 'required',
            'sub_title' => 'nullable|string|max:300'
        ];
        $this->validate($request, $rules, validationMessage($rules));

        try {
            $slider = new Slider();
            $slider->course_id = $request->course_id ?? '';
            $slider->name = $request->name ?? '';
            $slider->title = $request->title;
            $slider->sub_title = $request->sub_title;
            $slider->route = $request->route ?? null;
            $slider->page_id = $request->page ?? null;
            $slider->btn_title1 = $request->btn_title1;
            $slider->btn_link1 = $request->btn_link1;


            $slider->btn_title2 = $request->btn_title2;
            $slider->btn_link2 = $request->btn_link2;

            if ($request->has('image')) {
                $slider->image = $this->saveImage($request->image);
            }
                $slider->btn_type1 = 0;
            

                $slider->btn_type2 = 0;
            
            $slider->save();

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->route('frontend.sliders.index');
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }


    public function edit($id)
    {
        try {
            $sliders = Slider::all();
            $slider = Slider::findOrFail($id);
            $data = [];
            if (Settings('frontend_active_theme') == 'tvt') {
                $data['courses'] = Course::select('id', 'title')->where('status', 1)->get();
            }
            $pages=FrontPage::where('status',1)->latest()->get();
            return view('frontendmanage::sliders', $data, compact('sliders', 'slider','pages'));
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function update(Request $request)
    {
        
        $rules = [
            'sub_title' => 'nullable|string|max:300'
        ];
        $this->validate($request, $rules, validationMessage($rules));


        try {
            $slider = Slider::find($request->id);
            $slider->course_id = $request->course_id ?? '';
            $slider->name = $request->name ?? '';
            $slider->title = $request->title;
            $slider->page_id = $request->page ?? null;
            $slider->sub_title = $request->sub_title;
            $slider->btn_title1 = $request->btn_title1;
            $slider->btn_link1 = $request->btn_link1;

            if ($request->has('image')) {
                $slider->image = $this->saveImage($request->image);
            }
            $slider->save();
            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->route('frontend.sliders.index');
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function destroy($id)
    {
        try {
            Slider::destroy($id);
            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->back();
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function setting()
    {
        if (demoCheck()) {
            return redirect()->back();
        }
        try {
            $home_content = app('getHomeContent');
            $program_plans = PaymentPlans::where('type','program')->where('edate','>=',Carbon::today())->get();
            return view('frontendmanage::slider_setting', compact('home_content','program_plans'));
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function settingSubmit(Request $request)
    {
        // $request->validate([
        //     'slider_banner' => 'dimensions:width=450,height=656'
        // ]);
        if (hasDynamicPage()) {
            if ($request->slider_banner != null) {
                UpdateHomeContent('slider_banner', $this->saveImage($request->slider_banner));
            }

            UpdateHomeContent('slider_title', $request->slider_title ?? '');
            UpdateHomeContent('slider_text', $request->slider_text ?? '');
            UpdateHomeContent('show_menu_search_box', $request->show_menu_search_box == 1 ? 1 : 0);
            UpdateHomeContent('show_banner_search_box', $request->show_banner_search_box == 1 ? 1 : 0);
            // UpdateHomeContent('featured_programplan', $request->featured_programplan ?? 0);

        }

        UpdateGeneralSetting('slider_transition_time', $request->slider_transition_time ?? 5);
        Toastr::success(trans('common.Operation successful'), trans('common.Success'));
        return redirect()->back();
    }

    public function settingSubmit2(Request $request)
    {
        // $request->validate([
        //     'slider_banner' => 'dimensions:width=450,height=656'
        // ]);
        if (hasDynamicPage()) {
            if ($request->featured_programplan_bg != null) {
                UpdateHomeContent('featured_programplan_bg', $this->saveImage($request->featured_programplan_bg));
            }
            UpdateHomeContent('featured_programplan', $request->featured_programplan ?? 0);

        }
        Toastr::success(trans('common.Operation successful'), trans('common.Success'));
        return redirect()->back();
    }

    public function settingSubmit3(Request $request){
        if ($request->home_tile1_image != null) {
            UpdateHomeContent('home_tile1_image', $this->saveImage($request->home_tile1_image));
        }
        UpdateHomeContent('home_tile1_title', $request->home_tile1_title ?? '');
        UpdateHomeContent('home_tile1_text', $request->home_tile1_text ?? '');
        UpdateHomeContent('home_tile1_btntext', $request->home_tile1_btntext ?? '');
        UpdateHomeContent('home_tile1_btnlink', $request->home_tile1_btnlink ?? '');
        Toastr::success(trans('common.Operation successful'), trans('common.Success'));
        return redirect()->back();
    }
    public function settingSubmit4(Request $request){
        if ($request->home_tile2_image != null) {
            UpdateHomeContent('home_tile2_image', $this->saveImage($request->home_tile2_image));
        }
        UpdateHomeContent('home_tile2_title', $request->home_tile2_title ?? '');
        UpdateHomeContent('home_tile2_text', $request->home_tile2_text ?? '');
        UpdateHomeContent('home_tile2_btntext', $request->home_tile2_btntext ?? '');
        UpdateHomeContent('home_tile2_btnlink', $request->home_tile2_btnlink ?? '');
        Toastr::success(trans('common.Operation successful'), trans('common.Success'));
        return redirect()->back();
    }
    public function settingSubmit5(Request $request){
        if ($request->instructor_tile1_image != null) {
            UpdateHomeContent('instructor_tile1_image', $this->saveImage($request->instructor_tile1_image));
        }
        UpdateHomeContent('instructor_tile1_title', $request->instructor_tile1_title ?? '');
        UpdateHomeContent('instructor_tile1_text', $request->instructor_tile1_text ?? '');
        UpdateHomeContent('instructor_tile1_btntext', $request->instructor_tile1_btntext ?? '');
        UpdateHomeContent('instructor_tile1_btnlink', $request->instructor_tile1_btnlink ?? '');
        Toastr::success(trans('common.Operation successful'), trans('common.Success'));
        return redirect()->back();
    }

    public function settingSubmit6(Request $request){
        if ($request->instructor_tile2_image != null) {
            UpdateHomeContent('instructor_tile2_image', $this->saveImage($request->instructor_tile2_image));
        }
        UpdateHomeContent('instructor_tile2_title', $request->instructor_tile2_title ?? '');
        UpdateHomeContent('instructor_tile2_text', $request->instructor_tile2_text ?? '');
        UpdateHomeContent('instructor_tile2_btntext', $request->instructor_tile2_btntext ?? '');
        UpdateHomeContent('instructor_tile2_btnlink', $request->instructor_tile2_btnlink ?? '');
        Toastr::success(trans('common.Operation successful'), trans('common.Success'));
        return redirect()->back();
    }

    public function settingSubmitFlorida(Request $request)
    {
        // $request->validate([
        //     'slider_banner' => 'dimensions:width=450,height=656'
        // ]);
        if (hasDynamicPage()) {
            if ($request->florida_programplan_bg != null) {
                UpdateHomeContent('florida_programplan_bg', $this->saveImage($request->florida_programplan_bg));
            }
            UpdateHomeContent('florida_programplan', $request->florida_programplan ?? 0);

        }
        Toastr::success(trans('common.Operation successful'), trans('common.Success'));
        return redirect()->back();
    }
}

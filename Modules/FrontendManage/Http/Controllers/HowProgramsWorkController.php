<?php

namespace Modules\FrontendManage\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\ImageStore;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Modules\CourseSetting\Entities\Course;
use Modules\FrontendManage\Entities\Slider;
use Modules\FrontendManage\Entities\HowProgramsWork;

class HowProgramsWorkController extends Controller
{
    use ImageStore;

    public function index()
    {
        try {
            $sliders = HowProgramsWork::orderBy('seq_no','asc')->get();
            $data = [];
            return view('frontendmanage::how_programs_work.index', $data, compact('sliders'));
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }


    public function store(Request $request)
    {

        if (demoCheck()) {
            return redirect()->back();
        }
        $rules = [
            'title' => 'required|max:50',
            'image' => 'required',
            'text' => 'required|max:150'
        ];
        $this->validate($request, $rules, validationMessage($rules));

        try {
            $slider = new HowProgramsWork();
            $slider->title = $request->title;
            $slider->subtitle = $request->sub_title ?? '';
            $slider->text = $request->text;
            $slider->seq_no = $request->seq_no ?? 0;
            $slider->status = 1;
            if ($request->has('image')) {
                $slider->image = $this->saveImage($request->image);
            }
            $slider->save();

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->back();
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }


    public function edit($id)
    {
        try {
            $sliders = HowProgramsWork::orderBy('seq_no','asc')->get();
            $slider = HowProgramsWork::findOrFail($id);
            $data = [];
            return view('frontendmanage::how_programs_work.index', $data, compact('sliders', 'slider'));
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function update(Request $request)
    {
        $rules = [
            'title' => 'required|max:50',
            'image' => 'required',
            'text' => 'required|max:150'
        ];
        $this->validate($request, $rules, validationMessage($rules));
        if (demoCheck()) {
            return redirect()->back();
        }


        try {
            $slider = HowProgramsWork::find($request->id);
            $slider->title = $request->title;
            $slider->subtitle = $request->sub_title ?? '';
            $slider->text = $request->text ?? '';
            $slider->seq_no = $request->seq_no ?? 0;

            if ($request->has('image')) {
                $slider->image = $this->saveImage($request->image);
            }
            $slider->save();
            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->to(route('frontend.how_programs_work.index'));
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function destroy($id)
    {
        if (demoCheck()) {
            return redirect()->back();
        }
        try {
            HowProgramsWork::destroy($id);
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
            return view('frontendmanage::how_programs_work.settings', compact('home_content'));
        } catch (Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function settingSubmit(Request $request)
    {
        $rules = [
            'how_program_works_feature_title_1' => 'max:50',
            'how_program_works_feature_text_1' => 'max:150',
            'how_program_works_feature_title_2' => 'max:50',
            'how_program_works_feature_text_2' => 'max:150',
            'how_program_works_feature_title_3' => 'max:50',
            'how_program_works_feature_text_3' => 'max:150',
            'how_program_works_feature_title_4' => 'max:50',
            'how_program_works_feature_text_4' => 'max:150',
        ];
        $this->validate($request, $rules, validationMessage($rules));

        UpdateGeneralSetting('how_program_works_feature_title_1', $request->how_program_works_feature_title_1 ?? '');
        UpdateGeneralSetting('how_program_works_feature_text_1', $request->how_program_works_feature_text_1 ?? '');
        UpdateGeneralSetting('how_program_works_feature_title_2', $request->how_program_works_feature_title_2 ?? '');
        UpdateGeneralSetting('how_program_works_feature_text_2', $request->how_program_works_feature_text_2 ?? '');
        UpdateGeneralSetting('how_program_works_feature_title_3', $request->how_program_works_feature_title_3 ?? '');
        UpdateGeneralSetting('how_program_works_feature_text_3', $request->how_program_works_feature_text_3 ?? '');
        UpdateGeneralSetting('how_program_works_feature_title_4', $request->how_program_works_feature_title_4 ?? '');
        UpdateGeneralSetting('how_program_works_feature_text_4', $request->how_program_works_feature_text_4 ?? '');
        Toastr::success(trans('common.Operation successful'), trans('common.Success'));
        return redirect()->to(route('frontend.how_programs_work.index'));
    }
}

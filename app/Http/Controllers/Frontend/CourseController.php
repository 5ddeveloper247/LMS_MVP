<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\CourseSetting\Entities\Course;
use Modules\CourseSetting\Entities\CourseComment;
use Modules\CourseSetting\Entities\CourseEnrolled;
use Modules\FrontendManage\Entities\FrontPage;
use  Modules\Payment\Entities\PaymentPlans;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('maintenanceMode');
    }


    public function courses(Request $request)
    {

        try {
            if (hasDynamicPage()) {
                $row = FrontPage::where('slug', '/courses')->first();
                $details = dynamicContentAppend($row->details);
                return view('aorapagebuilder::pages.show', compact('row', 'details'));
            } else {

                return view(theme('pages.courses'), compact('request'));
            }
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function freeCourses(Request $request)
    {
        try {

            if (hasDynamicPage()) {
                $row = FrontPage::where('slug', 'free-course')->first();
                $details = dynamicContentAppend($row->details);
                return view('aorapagebuilder::pages.show', compact('row', 'details'));
            } else {
                return view(theme('pages.free_courses'), compact('request'));
            }
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }


    public function courseDetails($slug, Request $request)
    {
        try {
            // dd('test');
            $course = Course::with('enrollUsers', 'user', 'user.courses', 'user.courses.enrollUsers', 'user.courses.lessons', 'chapters.lessons', 'enrolls', 'lessons', 'reviews', 'chapters', 'activeReviews', 'children')
                ->where('slug', $slug)->first();

            if(!$course){
                abort(404);
            }

            $reqCourseType = $request->get('courseType') ?? 0;
            $childIds = Course::where('parent_id', $course['id'])->where('type',$reqCourseType)->get();
            
            $idArray = [];
            foreach ($childIds as $id) {
                //dd($id["id"]);
                $idArray[] = $id["id"];
            }
            $planCourseType = $reqCourseType == 6 ? 'prep_course_live' : 'full_course';
            $plan = PaymentPlans::where('parent_id', $course['id'])->get();
            $coursePlan = count($childIds) > 0 ? $childIds[0]->effectiveCoursePlan()
            ->first() : null;
            $cpID = $coursePlan->id ?? 0;
            // $futurePlan = $childIds[0]->effectiveCoursePlan[]
            $futurePlan = PaymentPlans:: whereIn('parent_id', $idArray)->where('id','<>',$cpID)
            ->where('sdate','>',date('Y-m-d'))->where('status',1)
            ->orderBy('sdate','ASC')
            ->first();
            // if($request->has('courseType') && in_array($request->get('courseType'),[4,6])){
            //     switch ($request->get('coursetype')) {
            //         case 6:
            //             $courseplanType = 'prep_course_live';
            //             break;
                    
            //         default:
            //             $courseplanType = 'full_course';
            //             break;
            //     }

            //     $coursePlan = $course->currentCoursePlan->first();
            // }

           // dd($coursePlan);


            // dd($courseParent[0]['sdate']);

            if($coursePlan){
              $duration =  round((strtotime($coursePlan['edate']) - strtotime($coursePlan['sdate'])) / 604800, 0);
            }
            //   dd($duration);

            // $coursePlans = Course::with('currentCoursePlan')->whereIn('parent_id', $idArray)->get();

            // dd($coursePlans);
            // $currentCoursePlan = Course::whereIn('parent_id', $idArray)->with('currentCoursePlan')->get();

            // $currentPlan = Course::whereIn('parent_id', $idArray)->with('currentPlan')->get();

            // $nextPlans = Course::whereIn('parent_id', $idArray)->with('nextPlans')->get();




            // dd($courseParent);
            // dd('zaid');
            if (!$course) {
                Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
                return redirect()->back();
            }

            if ($request->has('program_id')) {
                $isEnrolled = CourseEnrolled::where('program_id', $request->program_id)->where('user_id', Auth::id())
                ->whereHas('plan',function($q){
                    $q->where(function($q){
                    $q->where('sdate','<=',now())
                    ->where('edate','>=',now());
                    });
                    // ->orWhere('sdate','>',now());
                })
                ->count();
                if ($isEnrolled == 0 && \auth()->user()->role_id != 1) {
                    Toastr::error('Please purchase the program or wait for your Program Plan to start', trans('common.Failed'));
                    // Toastr::error(trans('common.Access Denied'), trans('common.Failed'));
                    return redirect()->back();
                }
                $enrollmentRecord = CourseEnrolled::where('program_id', $request->program_id)->where('user_id', Auth::id())
                ->whereHas('plan',function($q){
                    $q->where(function($q){
                    $q->where('sdate','<=',now())
                    ->where('edate','>=',now());
                    });
                    // ->orWhere('sdate','>',now());
                })->first();
            } else if ($request->has('courseType')) {
                $isEnrolled = CourseEnrolled::where('course_id', $course->id)->where('course_type', $request->courseType)->where('user_id', Auth::id())
                ->where(function($q){
                    $q->whereNotIn('course_type',[4,6])
                    ->orWhere(function($q){
                        $q->whereIn('course_type',[4,6])
                        ->whereHas('plan',function($q){
                            $q->where(function($q){
                            $q->where('sdate','<=',now())
                            ->where('edate','>=',now());
                            })
                            ->orWhere('sdate','>',now());
                        });
                    });
                })
                ->count();
                // dd($isEnrolled);
                $enrollmentRecord = CourseEnrolled::where('course_id', $course->id)->where('course_type', $request->courseType)->where('user_id', Auth::id())
                ->where(function($q){
                    $q->whereNotIn('course_type',[4,6])
                    ->orWhere(function($q){
                        $q->whereIn('course_type',[4,6])
                        ->whereHas('plan',function($q){
                            $q->where(function($q){
                            $q->where('sdate','<=',now())
                            ->where('edate','>=',now());
                            })
                            ->orWhere('sdate','>',now());
                        });
                    });
                })->first();
            } else {
                $isEnrolled = CourseEnrolled::where('course_id', $course->id)->where('user_id', Auth::id())
                ->whereHas('plan',function($q){
                    $q->where(function($q){
                    $q->where('sdate','<=',now())
                    ->where('edate','>=',now());
                    })
                    ->orWhere('sdate','>',now());
                })
                ->count();
                $enrollmentRecord = CourseEnrolled::where('course_id', $course->id)->where('user_id', Auth::id())
                ->whereHas('plan',function($q){
                    $q->where(function($q){
                    $q->where('sdate','<=',now())
                    ->where('edate','>=',now());
                    })
                    ->orWhere('sdate','>',now());
                })->first();
            }

            //            if (!isViewable($course)) {
            //                Toastr::error(trans('common.Access Denied'), trans('common.Failed'));
            //                return redirect()->back();
            //            }


            $data = '';
            if ($request->ajax()) {
                if ($request->type == "comment") {
                    $comments = CourseComment::where('course_id', $course->id)->with('replies', 'replies.user', 'user')->paginate(10);
                    foreach ($comments as $comment) {
                        $data .= view(theme('partials._single_comment'), ['comment' => $comment, 'isEnrolled' => true, 'course' => $course])->render();
                    }
                    return $data;
                }
            }

            if ($request->ajax()) {
                if ($request->type == "review") {
                    $cType = $request->has('courseType') ? $request->get('courseType') : null;
                    //$review_course_id = (count($course->children) && $request->has('courseType')) ? $course->children->where('type',$request->get('courseType'))->value('id') : $course->id;
                    $reviews = DB::table('course_reveiws')
                        ->select(
                            'course_reveiws.id',
                            'course_reveiws.star',
                            'course_reveiws.comment',
                            'course_reveiws.instructor_id',
                            'course_reveiws.created_at',
                            'users.id as userId',
                            'users.name as userName',
                        )
                        ->join('users', 'users.id', '=', 'course_reveiws.user_id')
                        ->where('course_reveiws.course_id', $course->id)
                        ->where('course_reveiws.courseType', $cType)->paginate(10);
                    foreach ($reviews as $review) {
                        $data .= view(theme('partials._single_review'), ['review' => $review, 'isEnrolled' => $isEnrolled, 'course' => $course])->render();
                    }
                    if (count($reviews) == 0) {
                        $data .= '';
                    }
                    return $data;
                }
            }


            $course->view = $course->view + 1;
            $course->save();

            if ($course->host == "VdoCipher") {
                $websiteController = new WebsiteController();
                $otp = $websiteController->getOTPForVdoCipher($course->trailer_link);
                $course->otp = $otp['otp'];
                $course->playbackInfo = $otp['playbackInfo'];
            }
            if ($course->type == 2 || $course->type == 3) {
                return \redirect()->to(courseDetailsUrl($course->id, $course->type, $course->slug));
            } else {
                if(isset($duration)){
                    return view(theme('pages.courseDetails'), compact('request', 'course', 'isEnrolled', 'enrollmentRecord', 'duration','coursePlan','futurePlan'));
                }
                else{
                    return view(theme('pages.courseDetails'), compact('request', 'course', 'isEnrolled', 'enrollmentRecord'));
                }
            }
        } catch (\Exception $e) {
            // dd($e);
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function offer(Request $request)
    {
        try {
            return view(theme('pages.offer'), compact('request'));
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }
}

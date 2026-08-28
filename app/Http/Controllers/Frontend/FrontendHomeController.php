<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Route;
use Modules\Blog\Entities\Blog;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as HttpRequest;
use Modules\CourseSetting\Entities\Course;
use Modules\CourseSetting\Entities\CourseComparison;
use Modules\Payment\Entities\PaymentPlans;
use Modules\FrontendManage\Entities\HeaderMenu;
use Modules\StudentSetting\Entities\Program;
use Modules\FrontendManage\Entities\FrontPage;
use Modules\CourseSetting\Entities\CourseReveiw;
use Modules\FrontendManage\Entities\ResourceTab;
use Modules\FrontendManage\Entities\HomePageFaq;
use Modules\SystemSetting\Entities\Testimonial;
use Modules\SystemSetting\Entities\SocialLink;


class FrontendHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('maintenanceMode');
    }

    public function index()
    {
        
        try {

            if (!\auth()->check()) {
                if (Settings('start_site') == 'loginpage') {

                    return redirect()->route('login');
                }
            }
            $check = FrontPage::select('slug', 'is_static')->where('homepage', 1)->first();
            if ($check && $check->slug != '/') {

                if ($check->is_static == 1) {
                    return redirect()->to($check->slug);
                } else {
                    return redirect()->route('frontPage', [$check->slug]);
                }
            }
            if (function_exists('SaasDomain')) {
                $domain = SaasDomain();
            } else {
                $domain = 'main';
            }
            if(session()->has('previous_url')){
                session()->forget('previous_url');
            }
            $blocks = Cache::rememberForever('homepage_block_positions' . $domain, function () {
                return DB::table('homepage_block_positions')->select(['id', 'block_name', 'order'])->orderBy('order', 'asc')->get();
            });
            $latest_programs = Program::where('status', 1)->where('featured',1)->has('effectiveProgramPlan')->with('effectiveProgramPlan')->latest()->take(1)->get();
            $latest_courses = Course::where('featured',1)
            ->has('parent')
            ->where(function($query){
                $query->whereNotIn('type',[4,6])
                    ->orHas('effectiveCoursePlan');
            })
            // ->where(function($query){
            //     $query->whereHas('parent', function ($q) {
            //         $q->where('featured', 1);
            //     })->orWhere('featured',1);
            // })
            ->with('parent','effectiveCoursePlan')->latest()->take(7)->get();
            $allPrograms = Program::where('status',1)->latest()->get();
            $allCourses = Course::whereNull('parent_id')->where('type','<>',3)->latest()->get();
            //dd($latest_courses);
            $latest_blogs = Blog::where('status', 1)->with('user')->latest()->limit(10)->get();
            $featured_blogs = Blog::where('status',1)->where('featured',1)->with('user')->latest()->limit(3)->get();
            $latest_course_reveiws = CourseReveiw::where('status', 1)->with('user')->latest()->limit(4)->get();
            $testimonials = Testimonial::where('status',1)->inRandomOrder()->get();
            $testimonials2 = Testimonial::where('status',1)->inRandomOrder()->get();

            $random_program = Program::where('status', 1)
                ->has('effectiveProgramPlan')
                ->with('effectiveProgramPlan')
                ->inRandomOrder()
                ->select(['id', 'programtitle', 'totalcost', 'icon', 'subtitle', 'discription'])
                ->first();
            $faqs = HomePageFaq::where('status', 1)->orderBy('order','desc')->take(10)->get();

            $home_content = app('getHomeContent');

            // Get course comparisons for the comparison table
            $comparisons = $this->getCourseComparisons();

            return view(theme('pages.index'), compact('random_program', 'blocks', 'latest_programs', 'latest_blogs', 'featured_blogs' , 'latest_course_reveiws', 'random_program', 'latest_courses','faqs','allPrograms','allCourses','testimonials', 'testimonials2','home_content', 'comparisons'));

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function shop(Request $request)
    {
        
        try {

            return view(theme('pages.shop'), compact('request'));

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function fetchBlogsByTag(HttpRequest $request){
       $rules = [
            'tag' => 'required',
        ];
        $this->validate($request, $rules, validationMessage($rules));
        switch ($request->tag) {
            case 'latest':
                # code...
                $tag = '%';
                break;
            
            default:
                # code...
                $tag = '%'.$request->tag.'%';
                break;
        }
        $blogs = Blog::where('status', 1)->with('user')
            ->where('tags','like',$tag)->latest()->limit(10)->get();
        return response()->json(['success' => true, 'data' => $blogs]);
    }

    public function getRandomProgram()
    {
        $random_program = Program::where('status', 1)
            ->has('currentProgramPlan')
            ->with('currentProgramPlan')
            ->inRandomOrder()
            ->select(['id', 'programtitle', 'totalcost', 'icon', 'subtitle', 'discription'])
            ->first();

        // $rand_program = Course::where('status', 1)
        // $rand_program = Program::where('status', 1)
        //     ->inRandomOrder()
        //     ->latest()->limit(4)->get();
        // ->toArray();
        // $rand_program = DB::table('programs')
        //     // ->orderBy('created_at', 'desc')
        //     ->inRandomOrder()
        //     ->limit(10)
        //     ->get()
        //     ->toArray();
        // dd($random_program);
        if($random_program){
        $program_desc = strip_tags($random_program->discription);
            return response()->json(
                [
                    'status' => true,
                    'program' =>

                    [
                        'id' => $random_program->id,
                        'programtitle' => $random_program->programtitle,
                        'totalcost' => $random_program->currentProgramPlan[0]->amount,
                        'icon' => $random_program->icon,
                        'subtitle' => $random_program->subtitle,
                        'discription' =>  strlen($program_desc) > 145 ? substr($program_desc, 0, 145) . "..." : $program_desc
                    ]
                ],
                200
            );
        }else{
            return response()->json(['status' => false, 'msg'=>'No Program Found']);
        }
        // dd($random_program);
        // return response()->json([
        //     'id' => $random_program->id,
        //     'programtitle' => $random_program->programtitle,
        //     'totalcost' => $random_program->totalcost,
        //     'icon' => $random_program->icon
        // ]);
    }
    public function resource()
    {
        $tabs = ResourceTab::where('status',1)->oldest()->get();
        $is_allow = false;
        //        $course_count = 2;
        $isEnrolled = false;


        //        program faqs
        $faqs = HomePageFaq::where('status', 1)->orderBy('order','desc')->take(10)->get();
        // $faqs = HomePageFaq::whereIn('id', json_decode($program_detail->faqs) ?? [])->orderBy('order', 'desc')->where('status', 1)->get();
        $socials = SocialLink::where('status',1)->orderBy('order','desc')->get();
        //        program course
        $courses = Course::whereNull('parent_id')->with('enrollUsers', 'user', 'user.courses', 'user.courses.enrollUsers', 'user.courses.lessons', 'chapters.lessons', 'enrolls', 'lessons', 'reviews', 'chapters', 'activeReviews')->take(3)->orderBy('created_at', 'DESC')->get();
        //      resent progrm
        $recent_program = Program::where('status', 1)->has('effectiveProgramPlan')->with('effectiveProgramPlan')->inRandomOrder()->take(1)->get();
        $recent_courses = Course::whereIn('type',[2,4,5,6,9])
                ->where('status', 1)->where(function($q){
                    $q->where('price', '!=', '0.00')
                    ->orHas('effectiveCoursePlan');
                })
            ->with('user', 'parent','effectiveCoursePlan','enrolls', 'comments', 'reviews', 'lessons', 'activeReviews', 'enrollUsers', 'class', 'cartUsers', 'quiz', 'quiz.assign', 'courseLevel')
            ->inRandomOrder()->take(2)->get();
            return view(theme('pages.resource'),get_defined_vars());
    }
    
    public function ourNursing(Request $request){
        $recent_program = Program::where('status', 1)->has('currentProgramPlan')->with('currentProgramPlan')->inRandomOrder()->take(3)->get();
        $programs = Program::orderBy('seq_no', 'asc')->where('status', 1);
        

        $programs = $programs->has('currentProgramPlan')->with(['currentProgramPlan'])->paginate(8);
        return view(theme('pages.Our-nursing'),get_defined_vars());
    }

    private function getCourseComparisons()
    {
        $currentDate = date('Y-m-d');
        $comparisons = CourseComparison::with(['course.category', 'course.user', 'program'])
            ->orderBy('course_id')
            ->orderBy('id')
            ->get();
            
        $comparisonData = [];

        foreach ($comparisons as $comparison) {
            // Get course data
            if ($comparison->course) {
                $course = $comparison->course;
                
                // Get duration and price using same logic as first tab
                $duration = null;
                $course_price = 0;
                
                // Check if course has children (type 4 or 6) and get plans from them
                $childCourses = Course::where('parent_id', $course->id)
                    ->whereIn('type', [4, 6])
                    ->get();
                
                $currentPlan = null;
                
                if ($childCourses->count() > 0) {
                    // Parent course - get plan from child courses
                    $childIds = $childCourses->pluck('id')->toArray();
                    $currentPlan = PaymentPlans::whereIn('parent_id', $childIds)
                        ->whereIn('type', ['full_course', 'prep_course_live'])
                        ->where('status', 1)
                        ->where(function ($q) use ($currentDate) {
                            $q->where(function($q2) use ($currentDate) {
                                $q2->where('sdate', '<=', $currentDate)
                                   ->where('edate', '>=', $currentDate);
                            })
                            ->orWhere('sdate', '>', $currentDate);
                        })
                        ->orderBy('sdate', 'asc')
                        ->first();
                } else {
                    // Child course - use currentCoursePlan relationship
                    $course->load('currentCoursePlan');
                    if (isset($course->currentCoursePlan[0])) {
                        $currentPlan = $course->currentCoursePlan[0];
                    }
                }
                
                if ($currentPlan) {
                    // Use current course plan
                    $startDate = strtotime($currentPlan->sdate);
                    $endDate = strtotime($currentPlan->edate);
                    $duration = round(($endDate - $startDate) / 604800, 1) . ' weeks';
                    $course_price = $currentPlan->amount;
                } else {
                    // Use price + tax
                    $course_price = $course->price + ($course->tax ?? 0);
                    $duration = $course->duration ? $course->duration . ' weeks' : 'N/A';
                }

                // Build detail URL like the first tab
                // Pattern: if course has children (parent course), use parent details with child type in URL and query param
                // Otherwise, use course's own details
                if ($childCourses->count() > 0) {
                    // Parent course - use parent's id and slug, but child's type for the URL pattern
                    // Pattern matches: courseDetailsUrl(parent->id, child->type, parent->slug) . '?courseType=' . child->type
                    $firstChildCourse = $childCourses->first();
                    $detailUrl = courseDetailsUrl($course->id, $firstChildCourse->type, $course->slug) . '?courseType=' . $firstChildCourse->type;
                } else {
                    // Course without children - use course's own details
                    $detailUrl = courseDetailsUrl($course->id, $course->type, $course->slug);
                }

                $comparisonData[] = [
                    'type' => 'course',
                    'type_label' => 'Course',
                    'id' => $course->id,
                    'course_id' => $course->id,
                    'title' => $course->title,
                    'course_code' => $course->course_code ?? '',
                    'duration' => $duration,
                    'format' => $this->getCourseFormat($course->type),
                    'price' => '$' . number_format($course_price, 0),
                    'detail_url' => $detailUrl,
                ];
            }

            // Get program data
            if ($comparison->program) {
                $program = $comparison->program;
                
                // Get current program plan
                $programPlan = PaymentPlans::where('parent_id', $program->id)
                    ->where('type', 'program')
                    ->where('status', 1)
                    ->where('sdate', '<=', $currentDate)
                    ->where('edate', '>=', $currentDate)
                    ->orderBy('sdate', 'asc')
                    ->first();

                $duration = null;
                $price = null;
                if ($programPlan) {
                    $startDate = strtotime($programPlan->sdate);
                    $endDate = strtotime($programPlan->edate);
                    $duration = round(($endDate - $startDate) / 604800, 1) . ' weeks';
                    $price = '$' . number_format($programPlan->amount, 0);
                }

                $detailUrl = route('programs.detail', ['id' => $program->id]);

                $comparisonData[] = [
                    'type' => 'program',
                    'type_label' => 'Program',
                    'id' => $program->id,
                    'course_id' => $comparison->course_id,
                    'title' => $program->programtitle,
                    'course_code' => '',
                    'duration' => $duration ?? 'N/A',
                    'format' => 'Program',
                    'price' => $price ?? 'N/A',
                    'detail_url' => $detailUrl,
                ];
            }
        }

        return $comparisonData;
    }

    private function getCourseFormat($type)
    {
        $formats = [
            1 => 'Course',
            4 => 'Full Course',
            5 => 'Prep-Course (On-Demand)',
            6 => 'Prep-Course (Live)',
        ];

        return $formats[$type] ?? 'Course';
    }
}


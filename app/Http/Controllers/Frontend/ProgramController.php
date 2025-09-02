<?php


namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Modules\StudentSetting\Entities\Program;
use Modules\FrontendManage\Entities\HomePageFaq;
use Modules\CourseSetting\Entities\Course;
use Modules\SystemSetting\Entities\SocialLink;
use Modules\FrontendManage\Entities\HowProgramsWork;

class ProgramController extends Controller
{
    public function __construct()
    {
        $this->middleware('maintenanceMode');
    }

    public function programs(Request $request)
    {

        $recent_program = Program::where('status', 1)->has('effectiveProgramPlan')->with('effectiveProgramPlan')->inRandomOrder()->take(3)->get();
        $programs = Program::orderBy('seq_no', 'asc')->where('status', 1);
        if ($request->has('filter')) {
            if (!empty($request->input('program_title'))) {
                $programs = $programs->where('programtitle', 'Like', '%' . $request->input('program_title') . '%');
            }
            if (!empty($request->input('program_price_max'))  && $request->input('program_price_max') != 0) {
                $programs = $programs->has('currentRequestPriceFilter');
            }
            if (!empty($request->input('program_duration_max'))  && $request->input('program_duration_max') != 0) {
                $programs = $programs->whereExists(function ($subquery) use ($request) {
                    $subquery->select(DB::raw(1))
                        ->from('payment_plans')
                        ->whereColumn('programs.id', 'payment_plans.parent_id')
                        ->where('type', 'program')
                        ->where('status', 1)
                        ->where(function ($q) {
                            $q->where('sdate', '<=', now())->where('edate', '>=', now());
                            $q->orWhere('sdate', '>', now());
                        })
                        ->whereBetween(
                            DB::raw('CEIL(DATEDIFF(LEAST(edate, NOW()), GREATEST(sdate, NOW())) / 7)'),
                            [$request->input('program_duration_min', 0), $request->input('program_duration_max', 0)]
                        );
                    //                        ->whereColumn('payment_plans.lms_id', 'programs.lms_id');
                });
            }
        }
        $how_programs_work = HowProgramsWork::where('status',1)->limit(4)->orderBy('seq_no')->get();
        $programs = $programs->has('effectiveProgramPlan')->with(['effectiveProgramPlan'])->paginate(8);

        return view(theme('pages.programs'), get_defined_vars());
    }
    public function floridaPrograms(){
        $recent_program = Program::where('status', 1)->has('effectiveProgramPlan')->with('effectiveProgramPlan')
        ->inRandomOrder()->take(4)
        ->get()->toArray();
        return view(theme('pages.florida_program'),get_defined_vars());
    }
    public function programsDetail(Request $request, $id)
    {

        $program_detail = Program::where('id', $id)->with(['programPlans.programPalnDetail', 'currentPlan', 'nextPlans', 'effectiveProgramPlan' => function ($q) {
            $q->with(['initialProgramPalnDetail', 'programPalnDetail']);
        }])->first();

        if(!$program_detail){
            abort(404);
        }

        // $next_plan = Program::where('id', $id)->with('programPlans')->first();
        //        program enroll check
        $is_allow = false;
        //        $course_count = 2;
        $isEnrolled = false;
        // dd($program_detail->isLoginUserEnrolled);
        // if (isset($program_detail->effectiveProgramPlan[0])) {
            if (Auth::check() && $program_detail->isLoginUserEnrolled) {
                // dd(now());
                $enrolledStudent = $program_detail->totalEnrolls()->where('user_id',auth()->user()->id)
                ->whereHas('plan',function($q){
                    $q->where(function($q){
                    $q->where('sdate','<=',now())
                    ->where('edate','>=',now());
                    })
                    ->orWhere('sdate','>',now());
                })->get();
                // ->get();
                // dd($enrolledStudent);

                if(count($enrolledStudent)>0){
                // if($purchasedplan->sdate < date('Y-m-d') && $purchasedplan->endate > date('Y-m-d') ){

                    $is_allow = true;
                // }
                //                $course_count = 6;
                $isEnrolled = true;
                }
            }
        // }
        $socials = SocialLink::where('status',1)->orderBy('order','desc')->get();

        //        program faqs
        $faqs = HomePageFaq::whereIn('id', json_decode($program_detail->faqs) ?? [])->orderBy('order', 'desc')->where('status', 1)->get();

        //        program course
        $courses = Course::whereIn('id', json_decode($program_detail->allcourses) ?? [])->with('enrollUsers', 'user', 'user.courses', 'user.courses.enrollUsers', 'user.courses.lessons', 'chapters.lessons', 'enrolls', 'lessons', 'reviews', 'chapters', 'activeReviews')->orderBy('created_at', 'DESC')->get();
        //      resent progrm
        $recent_program = Program::where('status', 1)->has('effectiveProgramPlan')->with('effectiveProgramPlan')->inRandomOrder()->take(3)->get();
        // dd(get_defined_vars());
        return view(theme('pages.programs-detail'), get_defined_vars());
    }
}

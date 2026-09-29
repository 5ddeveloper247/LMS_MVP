<?php

namespace App\View\Components;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;
use Modules\ContinuingEducation\Entities\CeCourse;
use Modules\ContinuingEducation\Entities\CeCourseReview;
use Modules\ContinuingEducation\Services\CeCatalogService;
use Modules\CourseSetting\Entities\Course;
use Modules\CourseSetting\Entities\CourseReveiw;
use Modules\VirtualClass\Entities\VirtualClass;
use Modules\CourseSetting\Entities\CourseLevel;
use Modules\CourseSetting\Entities\TimeTableList;
use Modules\Payment\Entities\Cart;
use Modules\Payment\Entities\PaymentPlans;
use Modules\StudentSetting\Entities\BookmarkCourse;
use Modules\SystemSetting\Entities\SocialLink;

class CourseDeatilsPageSection extends Component
{
    public $request, $course, $isEnrolled, $enrollmentRecord, $ceCourse;

    public function __construct($request, $course, $isEnrolled, $enrollmentRecord, $ceCourse = null)
    {
        $this->request = $request;
        $this->course = $course;
        $this->isEnrolled = $isEnrolled;
        $this->enrollmentRecord = $enrollmentRecord;
        $this->ceCourse = $ceCourse;
    }



    public function render()
    {
        // $duration = $this->duration;
        $courseType = $this->request->get('courseType') ?? 0;
        $this->course->loadMissing([
            'children' => fn ($q) => $q->where('status', 1),
        ]);
        $effectiveCourseType = (int) $courseType;
        if (!$effectiveCourseType) {
            foreach ($this->course->children as $child) {
                if (in_array((int) $child->type, [5, 6, 4], true)) {
                    $effectiveCourseType = (int) $child->type;
                    break;
                }
            }
        }

        $related = Course::where('category_id', $this->course->category_id)->with('activeReviews', 'enrollUsers', 'cartUsers', 'lessons')
            ->where('id', '!=', $this->course->id)->with('lessons')->take(2)->get();

        $userRating = userRating($this->course->user_id);
        $courseRating = courseRating($this->course->id, $effectiveCourseType ?: null);
        $course_exercises = DB::table('course_exercises')
            ->select('file', 'fileName', 'lock')->where('course_id', $this->course->id)->get();
        $courseReviewsQuery = DB::table('course_reveiws')->select('user_id')->where('course_id', $this->course->id);
        if ($effectiveCourseType) {
            $courseReviewsQuery->where('courseType', $effectiveCourseType);
        }
        $course_reviews = $courseReviewsQuery->get();
        $course_enrolls = DB::table('course_enrolleds')->select('user_id')->where('course_id', $this->course->id)->get();

        $bookmarked = BookmarkCourse::where('user_id', Auth::id())->where('course_id', $this->course->id)->count();
        if ($bookmarked == 0) {
            $isBookmarked = false;
        } else {
            $isBookmarked = true;
        }
        $is_cart = 0;
        //        if (Auth::check()) {
        //            $cart = Cart::where('user_id', Auth::id());
        //            if ($this->request->has('courseType')) {
        //                $cart = $cart->where('course_type', $this->request->courseType);
        //            }
        //            $cart = $cart->where('course_id', $this->course->id)->first();
        //            if ($cart) {
        //                $is_cart = 1;
        //            }
        //        } else {
        //            $sessonCartList = session()->get('cart');
        //            if (!empty($sessonCartList)) {
        //                foreach ($sessonCartList as $item) {
        //                    if ($item['course_id'] == $this->course->id) {
        //                        $is_cart = 1;
        //                    }
        //                }
        //            }
        //        }


        //        if ($this->course->price == 0) {
        //            $isFree = true;
        //        } else {
        $isFree = false;
        //        }


        $reviewer_user_ids = [];
        foreach ($course_reviews as $key => $review) {
            $reviewer_user_ids[] = $review->user_id;
        }

        $course_enrolled_std = [];
        foreach ($course_enrolls as $key => $enroll) {
            $course_enrolled_std[] = $enroll->user_id;
        }


        $today = Carbon::now()->toDateString();
        $showDrip = Settings('show_drip') ?? 0;
        $all = $this->course->lessons;
        $lessons = [];
        if ($this->course->drip == 1) {
            if ($showDrip == 1) {
                foreach ($all as $key => $data) {
                    $show = false;
                    $unlock_date = $data->unlock_date;
                    $unlock_days = $data->unlock_days;

                    if (!empty($unlock_days) || !empty($unlock_date)) {

                        if (!empty($unlock_date)) {
                            if (strtotime($unlock_date) == strtotime($today)) {
                                $show = true;
                            }
                        }
                        if (!empty($unlock_days)) {
                            if (Auth::check()) {
                                $enrolled = DB::table('course_enrolleds')->where('user_id', Auth::user()->id)->where('course_id', $this->course->id)->where('status', 1)->first();
                                if (!empty($enrolled)) {
                                    $unlock = Carbon::parse($enrolled->created_at);
                                    $unlock->addDays($data->unlock_days);
                                    $unlock = $unlock->toDateString();

                                    if (strtotime($unlock) <= strtotime($today)) {
                                        $show = true;
                                    }
                                }
                            }
                        }

                        if ($show) {
                            $lessons[] = $data;
                        }
                    } else {
                        $lessons[] = $data;
                    }
                }
            } else {
                $lessons = $all;
            }
        } else {
            $lessons = $all;
        }

        $total = count($lessons);
        $levels = CourseLevel::select('id', 'title')->where('status', 1)->get();
        $Classes = Course::with('class')->whereHas('class', function ($q) {
          $q->where(function($q) {
            $q->where('course_id', $this->course->id)->where('host','Zoom')->has('zoomMeetings');
          })
          ->orWhere(function($q){
            $q->where('course_id', $this->course->id)->where('host','Team')->has('teamMeetings');

          });
          if (Auth::check() && $this->enrollmentRecord){
            $q->where('plan_id',$this->enrollmentRecord->plan_id);
          }
        })->where('scope', 1)->get();
        $courseCategoryId = $this->course->category_id ?? 0;
        $time_tables = TimeTableList::where('time_table_id', $this->course->time_table_id)->groupBy('week')->orderBy('week')->get();

        $program_plan = PaymentPlans::where('parent_id', $this->request->program_id)->where('type', 'program')->first();

        $this->course->loadMissing([
            'category',
            'user',
            'chapters.lessons.quiz',
            'children' => fn ($q) => $q->where('status', 1),
        ]);

        $categoryName = $this->course->category
            ? $this->translatableText($this->course->category->name)
            : '';
        $courseImage = !empty($this->course->thumbnail)
            ? getCourseImage($this->course->thumbnail)
            : (!empty($this->course->image) ? getCourseImage($this->course->image) : null);
        $courseExcerpt = QuizPageSection::excerpt($this->course->about, 220);
        $typeBadges = QuizPageSection::listingTypeBadges($this->course);
        $purchaseOptions = $this->buildPurchaseOptions();
        $headerPurchase = collect($purchaseOptions)->firstWhere('type', 5) ?? ($purchaseOptions[0] ?? null);
        $sidebarPurchases = collect($purchaseOptions)
            ->filter(fn ($option) => !$headerPurchase || $option['type'] !== $headerPurchase['type'])
            ->values()
            ->all();

        $instructorCourses = $this->course->user_id
            ? $this->filterSellableParents(
                Course::where('user_id', $this->course->user_id)
                    ->where('type', 1)
                    ->where('status', 1)
                    ->where('id', '!=', $this->course->id)
                    ->with(['category', 'children' => fn ($q) => $q->where('status', 1)])
                    ->latest()
                    ->take(6)
                    ->get()
            )->take(4)
            : collect();

        $relatedCourses = $this->loadRelatedCourses($courseCategoryId);

        $detailReviewsQuery = CourseReveiw::where('course_id', $this->course->id)
            ->where('status', 1);
        if ($effectiveCourseType) {
            $detailReviewsQuery->where('courseType', $effectiveCourseType);
        }
        $detailReviews = (clone $detailReviewsQuery)
            ->with('user')
            ->orderByDesc('id')
            ->take(4)
            ->get();

        $reviewStars = (clone $detailReviewsQuery)->pluck('star');

        $detailReviewStats = [
            'total' => $reviewStars->count(),
            'rating' => $reviewStars->count() ? number_format($reviewStars->avg(), 1) : 0,
        ];

        $recent_courses = $relatedCourses;
        $socials = SocialLink::where('status',1)->orderBy('order','desc')->get();

        $isCeDetailPage = $this->ceCourse instanceof CeCourse;
        $ceCatalog = null;
        $ceRelatedCourses = collect();
        $ceInstructorCourses = collect();

        if ($isCeDetailPage) {
            $ceCatalog = app(CeCatalogService::class);
            $ceCourse = $this->ceCourse;

            $categoryName = trim((string) ($ceCourse->compliance_topic ?? ''))
                ?: $ceCatalog->courseTypeLabel($ceCourse);
            $courseExcerpt = QuizPageSection::excerpt($ceCourse->about, 220);
            $typeBadges = [[
                'label' => $ceCatalog->courseTypeLabel($ceCourse),
                'class' => 'pc-badge-ondemand',
            ]];

            $headerPurchase = $this->buildCePurchaseOption($ceCourse, $ceCatalog);
            $purchaseOptions = [$headerPurchase];
            $sidebarPurchases = [];

            $detailReviewsQuery = CeCourseReview::query()
                ->where('ce_course_id', $ceCourse->id)
                ->where('status', 1);
            $detailReviews = (clone $detailReviewsQuery)
                ->with('user')
                ->orderByDesc('id')
                ->take(4)
                ->get();
            $reviewStars = (clone $detailReviewsQuery)->pluck('star');
            $detailReviewStats = [
                'total' => $reviewStars->count(),
                'rating' => $reviewStars->count() ? number_format($reviewStars->avg(), 1) : 0,
            ];
            $reviewer_user_ids = (clone $detailReviewsQuery)->pluck('user_id')->all();

            $ceRelatedCourses = $ceCatalog->relatedCourses($ceCourse);
            $relatedCourses = collect();

            if ($ceCourse->user_id) {
                $ceInstructorCourses = CeCourse::query()
                    ->published()
                    ->forLms()
                    ->where('user_id', $ceCourse->user_id)
                    ->where('id', '!=', $ceCourse->id)
                    ->orderBy('title')
                    ->take(4)
                    ->get();
            }

            $instructorCourses = collect();
        }

        return view(theme('components.course-details-page-section'), get_defined_vars());
    }

    private function buildCePurchaseOption(CeCourse $ceCourse, CeCatalogService $ceCatalog): array
    {
        $amount = floatval($ceCourse->discount_price ?? $ceCourse->price ?? 0);
        $hoursLabel = $ceCatalog->contactHoursLabel($ceCourse);

        return [
            'type' => 0,
            'label' => 'Continuing Education',
            'title' => 'Individual CE Course',
            'badge' => null,
            'buy_label' => 'Buy Now',
            'includes' => array_values(array_filter([
                $hoursLabel ? $hoursLabel . ' contact hours' : null,
                'Florida Board of Nursing approved',
                'Instant online access',
                'Certificate upon completion',
            ])),
            'price_label' => $amount > 0 ? getPriceFormat($amount) : null,
            'can_purchase' => $amount > 0,
            'cart_url' => $amount > 0 ? $ceCatalog->cartUrl($ceCourse) : '#',
            'buy_url' => $amount > 0 ? $ceCatalog->buyNowUrl($ceCourse) : '#',
            'sub_note' => 'Self-paced online',
            'cohort_start' => null,
            'duration_weeks' => null,
            'plan' => null,
            'bundle_url' => $ceCatalog->bundleUrl($ceCourse),
            'bundle_label' => $ceCatalog->bundleLabel($ceCourse),
        ];
    }

    private function buildPurchaseOptions(): array
    {
        $options = [];

        foreach ($this->course->children as $child) {
            $type = (int) $child->type;

            if (!in_array($type, [4, 5, 6], true)) {
                continue;
            }

            $option = $this->mapPurchaseOption($child, $type);

            if ($option) {
                $options[] = $option;
            }
        }

        usort($options, fn ($a, $b) => array_search($a['type'], [5, 6, 4], true) <=> array_search($b['type'], [5, 6, 4], true));

        return $options;
    }

    private function mapPurchaseOption(Course $child, int $type): ?array
    {
        $configs = [
            5 => [
                'label' => 'Self-Study',
                'title' => 'On-Demand (Self-Study)',
                'badge' => null,
                'buy_label' => 'Buy Now',
                'includes' => [
                    'Self-paced video lessons',
                    'Practice questions & rationales',
                    'Downloadable study resources',
                    'Learn on your schedule',
                ],
            ],
            6 => [
                'label' => 'Live Instructor',
                'title' => 'Prep-Course (Live)',
                'badge' => 'Live Instructor',
                'buy_label' => 'Enroll Now',
                'includes' => [
                    'Live instructor-led sessions',
                    'Q&A and guided review',
                    'Session recordings included',
                    'Structured cohort schedule',
                ],
            ],
            4 => [
                'label' => 'Full Course',
                'title' => 'Full Course (Instructor-Led)',
                'badge' => 'Full Course',
                'buy_label' => 'Enroll Now',
                'includes' => [
                    'Complete instructor-led program',
                    'Live classes and guided review',
                    'Full curriculum access',
                    'Cohort-based learning',
                ],
            ],
        ];

        if (!isset($configs[$type])) {
            return null;
        }

        $config = $configs[$type];
        $plan = null;
        $priceLabel = null;
        $canPurchase = false;
        $planQuery = '';
        $cohortStart = null;
        $durationWeeks = null;
        $subNote = null;

        if ($type === 5) {
            $amount = floatval($child->price) + floatval($child->tax ?? 0);
            if ($amount > 0) {
                $priceLabel = getPriceFormat($amount);
                $canPurchase = true;
            }
            $subNote = 'Self-paced access';
        } else {
            $plan = $child->effectiveCoursePlan()->first();
            if ($plan) {
                $priceLabel = getPriceFormat($plan->amount);
                $canPurchase = true;
                $planQuery = '&plan_id=' . $plan->id;
                $cohortStart = date('d M Y', strtotime($plan->sdate));
                $durationWeeks = round((strtotime($plan->edate) - strtotime($plan->sdate)) / 604800, 1);
                $subNote = 'Starts ' . $cohortStart;
            } else {
                $subNote = 'Plan coming soon';
            }
        }

        $parentId = $this->course->id;
        $typeQuery = '?courseType=' . $type . $planQuery;

        return [
            'type' => $type,
            'child' => $child,
            'label' => $config['label'],
            'title' => $config['title'],
            'badge' => $config['badge'],
            'buy_label' => $config['buy_label'],
            'includes' => $config['includes'],
            'price_label' => $priceLabel,
            'can_purchase' => $canPurchase,
            'cart_url' => route('addToCartQuiz', [$parentId]) . $typeQuery,
            'buy_url' => route('buyNowQuiz', [$parentId]) . $typeQuery,
            'sub_note' => $subNote,
            'cohort_start' => $cohortStart,
            'duration_weeks' => $durationWeeks,
            'plan' => $plan,
        ];
    }

    private function translatableText($value): string
    {
        if (is_array($value)) {
            $locale = app()->getLocale();

            return (string) ($value[$locale] ?? reset($value) ?? '');
        }

        return (string) $value;
    }

    private function filterSellableParents($courses)
    {
        return collect($courses)->filter(function (Course $course) {
            foreach ($course->children as $child) {
                if (QuizPageSection::resolveChildListingPrice($child) !== null) {
                    return true;
                }
            }

            return false;
        })->values();
    }

    private function loadRelatedCourses(int $courseCategoryId)
    {
        $baseQuery = fn () => Course::where('type', 1)
            ->where('status', 1)
            ->where('id', '!=', $this->course->id)
            ->with(['category', 'children' => fn ($q) => $q->where('status', 1)]);

        if ($courseCategoryId) {
            $related = $this->filterSellableParents(
                $baseQuery()->where('category_id', $courseCategoryId)->latest()->take(6)->get()
            );

            if ($related->isNotEmpty()) {
                return $related->take(3);
            }
        }

        return $this->filterSellableParents(
            $baseQuery()->latest()->take(6)->get()
        )->take(3);
    }
}

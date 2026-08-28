<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ImageStore;
use App\Traits\SendMail;
use App\Traits\SendSMS;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
require_once base_path('vendor/fpdf/fpdf/src/Fpdf/Fpdf.php');
use Fpdf\Fpdf;
use Modules\Coupons\Entities\Coupon;
use Modules\CourseSetting\Entities\Category;
use Modules\CourseSetting\Entities\Course;
use Modules\CourseSetting\Entities\CourseEnrolled;
use Modules\OrgInstructorPolicy\Entities\OrgPolicyCategory;
use Modules\SystemSetting\Entities\EmailSetting;

class CourseController extends Controller
{
    use ImageStore, SendSMS, SendMail;


    public function ajaxGetSubCategoryList(Request $request)
    {
        $subcategories = Category::where('parent_id', '=', $request->id)->get();
        return response()->json([$subcategories]);
    }


    public function ajaxGetCourseList(Request $request)
    {
        $category_id = $request->category_id;
        $subcategory_id = $request->subcategory_id;
        if (Auth::user()->role_id == 1) {
            $subcategories = Course::select('id', 'title')->where('category_id', $category_id)->where('subcategory_id', $subcategory_id)->get();
        } else {
            $subcategories = Course::select('id', 'title')->where('category_id', $category_id)->where('subcategory_id', $subcategory_id)->where('user_id', Auth::user()->id)->get();
        }

        return response()->json([$subcategories]);
    }


    public function category(Request $request)
    {
        try {
            $query = Category::query();
            if (isModuleActive('OrgInstructorPolicy') && \auth()->user()->role_id != 1) {
                $assign = OrgPolicyCategory::where('policy_id', \auth()->user()->policy_id)->pluck('category_id')->toArray();
                $query->whereIn('id', $assign);
            }
            $categories = $query->with('parent')->orderBy('position_order', 'asc')->get();
            $max_id = Category::max('position_order') + 1;

            return view('backend.categories.index', compact('categories', 'max_id'));
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function category_delete($id)
    {
        if (demoCheck()) {
            return redirect()->back();
        }
        try {
            $category = Category::where('id', $id)->first();
            $related_SubCat = $category->subcategories()->count();
            $related_ActSubCat = $category->activeSubcategories()->count();
            $related_courses = $category->courses()->count();

            if ($related_SubCat > 0 || $related_ActSubCat > 0 || $related_courses > 0) {
                Toastr::error('Category has ' . $this->checkCategoryRelation($related_SubCat, $related_ActSubCat, $related_courses) . ' Please First Delete those and then Delete Category', 'Error');
                return redirect()->back();
            }

            $category->delete();

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->back();
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function checkCategoryRelation($related_SubCat = '', $related_ActSubCat = '', $related_courses = '')
    {
        return (!empty($related_SubCat) ? 'Sub-Categories, ' : '') . (!empty($related_ActSubCat) ? 'Active Sub-Categories, ' : '') . (!empty($related_courses) ? 'Courses, ' : '');
    }

    public function category_edit($id)
    {
        try {
            $edit = Category::find($id);
            $query = Category::orderBy('position_order', 'ASC');
            if (isModuleActive('OrgInstructorPolicy')) {
                $user = Auth::user();
                if ($user->role_id == 2) {
                    $assign = OrgPolicyCategory::where('policy_id', \auth()->user()->policy_id)->pluck('category_id')->toArray();
                    $query->whereIn('id', $assign);
                }
            }
            $categories = $query->with('parent')->orderBy('position_order', 'asc')->get();
            $max_id = Category::max('position_order') + 1;
            return view('backend.categories.index', compact('categories', 'edit', 'max_id'));
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function category_store(Request $request)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        $code = auth()->user()->language_code;

        $rules = [
            'name.' . $code => 'required|max:255',
            'photo' => 'mimes:jpeg,jpg,png,gif,svg|max:10000',
            'thumbnail' => 'mimes:jpeg,jpg,png,gif,svg|max:10000'
        ];

        $this->validate($request, $rules, validationMessage($rules));


        try {
            // $url1 = $this->saveImage($request->photo);
            // $url1 = !empty($url1) ? $url1 : 'public/demo/category/thumb/1.png';

            // $url2 = $this->saveImage($request->thumbnail);
            // $url2 = !empty($url2) ? $url2 : 'public/demo/category/thumb/1.png';

            $url1 = null;
            $url1 = null;

            $url2 = null;
            $url2 = null;

            DB::beginTransaction();

            $check_position = Category::where('position_order', $request->position_order)->first();

            if ($check_position != '') {
                $old_categories = Category::where('position_order', '>=', $request->position_order)->get();

                foreach ($old_categories as $old_category) {
                    $old_category->position_order = $old_category->position_order + 1;
                    $old_category->save();
                }
            }


            $store = new Category;

            foreach ($request->name as $key => $name) {
                $store->setTranslation('name', $key, $name);
            }
            foreach ($request->description as $key => $description) {
                $store->setTranslation('description', $key, $description);
            }
            $store->status = $request->status;
            if (!empty($request->parent)) {
                $store->parent_id = $request->parent;
            } else {
                $store->parent_id = null;
            }
            $store->position_order = $request->position_order;
            if (@$url1) {
                $store->image = $url1;
            }
            if (@$url2) {
                $store->thumbnail = $url2;
            }
            $store->save();


            if (isModuleActive('OrgInstructorPolicy')) {
                if (!empty(auth()->user()->policy_id)) {
                    OrgPolicyCategory::create([
                        'category_id' => $store->id,
                        'policy_id' => \auth()->user()->policy_id,
                        'status' => 1
                    ]);
                }
            }
            DB::commit();
            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->back();
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }

    public function category_status_update(Request $request)
    {
        if (demoCheck()) {
            return redirect()->back();
        }
        try {
            $store = Category::find($request->id);
            $store->status = $request->status;
            $store->save();
            return response()->json([
                'message' => 'success'
            ], 200);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['error' => $e->getMessage()]);
        }
    }


    public function category_update(Request $request)
    {
        if (demoCheck()) {
            return redirect()->back();
        }
        $code = auth()->user()->language_code;

        $rules = [
            'name.' . $code => 'required|max:255',
        ];
        $this->validate($request, $rules, validationMessage($rules));


        $is_exist = Category::where('name', $request->name)->where('id', '!=', $request->id)->first();
        if ($is_exist) {
            Toastr::error('This Name has been Already taken', 'Failed');
            return redirect()->back();
        }


        try {

            $check_position = Category::where('position_order', $request->position_order)->first();

            if ($check_position != '') {
                $old_categories = Category::where('position_order', '>=', $request->position_order)->get();

                foreach ($old_categories as $old_category) {
                    $old_category->position_order = $old_category->position_order + 1;
                    $old_category->save();
                }
            }

            $store = Category::find($request->id);
            foreach ($request->name as $key => $name) {
                $store->setTranslation('name', $key, $name);
            }
            foreach ($request->description as $key => $description) {
                $store->setTranslation('description', $key, $description);
            }
            $store->status = $request->status;
            $store->url = $request->url;
            $store->title = $request->title;
            $store->show_home = $request->show_home;
            $store->position_order = $request->position_order;
            if ($request->photo) {
                $store->image = $this->saveImage($request->photo);
            }
            if ($request->thumbnail) {
                $store->thumbnail = $this->saveImage($request->thumbnail);
            }


            if (!empty($request->parent)) {
                $store->parent_id = $request->parent;
            } else {
                $store->parent_id = null;
            }
            $results = $store->save();
            if ($results) {
                Toastr::success(trans('common.Operation successful'), trans('common.Success'));
                return redirect()->route('course.category');
            } else {
                Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
                return redirect()->back();
            }
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
        }
    }


    public function coupon(Request $request)
    {
        try {
            $coupons = Coupon::all();
            return view('backend.courses.coupons', compact('coupons'));
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
            return redirect()->back();
        }
    }

    public function generateCertificate($enroll_id){
        $enrolled = CourseEnrolled::find($enroll_id);
        if($enrolled){
            $enrolled->certificate_access = 1;
            // $enrolled->save();
            $title = $enrolled->course_id == null ? $enrolled->program->programtitle : $enrolled->course->title;
            $type = $enrolled->course_id == null ? 'program' : 'course';
        $shortCodes = [
                'course' => $title,
                'type' => $type,
                'student_name' => $enrolled->user->name,
            ];
        send_email($enrolled->user, 'certificate_generated', $shortCodes);

        // Send authority letter email with PDF attachment
        $this->send_email_authority($enrolled);

        Toastr::success(trans('Certificate has been generated.'), trans('common.Success'));
                return redirect()->back();
        }
        else{
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
                return redirect()->back();
        }
        
    }

    /**
     * Send authority letter email with filled PDF attachment
     * 
     * @param CourseEnrolled $enrolled
     * @return void
     */
    private function send_email_authority($enrolled)
    {
        try {
            // Get student and program/course details
            $student = $enrolled->user;
            
            if (!$student) {
                \Log::error('Student not found for enrollment ID: ' . $enrolled->id);
                return;
            }
            
            $program = $enrolled->program;
            $course = $enrolled->course;
            
            // Determine if it's a program or course
            $isProgram = $enrolled->course_id == null;
            
            if ($isProgram && !$program) {
                \Log::error('Program not found for enrollment ID: ' . $enrolled->id);
                return;
            }
            
            if (!$isProgram && !$course) {
                \Log::error('Course not found for enrollment ID: ' . $enrolled->id);
                return;
            }
            
            $programOrCourseName = $isProgram ? ($program ? $program->programtitle : 'N/A') : ($course ? $course->title : 'N/A');
            $programOrCourseType = $isProgram ? 'Program' : 'Course';
            
            // Get enrollment date
            $enrollmentDate = $enrolled->created_at ? $enrolled->created_at->format('F d, Y') : date('F d, Y');
            
            // Check if authority letter template exists (Page 1)
            $templatePath = public_path('certificate/authority-letter.pdf');
            if (!file_exists($templatePath)) {
                \Log::error('Authority letter template not found: ' . $templatePath);
                return;
            }

            // Check if student certificate template exists (Page 2)
            $studentCertPath = public_path('certificate/student-certificate.pdf');
            if (!file_exists($studentCertPath)) {
                \Log::error('Student certificate template not found: ' . $studentCertPath);
                return;
            }

            // Convert PDF pages to Images using ImageMagick
            $tempDir = storage_path('app/temp');
            if (!file_exists($tempDir)) {
                mkdir($tempDir, 0777, true);
            }
            
            $tempImagePathPage1 = storage_path('app/temp/authority_page1_' . time() . '.png');
            $tempImagePathPage2 = storage_path('app/temp/student_cert_' . time() . '.png');

            // Convert Page 1 from authority-letter.pdf
            if (extension_loaded('imagick')) {
                try {
                    $imagick1 = new \Imagick();
                    $imagick1->setResolution(300, 300);
                    $imagick1->readImage($templatePath . '[0]'); // First page of authority letter
                    $imagick1->setImageFormat('png');
                    $imagick1->writeImage($tempImagePathPage1);
                    $imagick1->clear();
                    $imagick1->destroy();
                } catch (\Exception $e) {
                    \Log::error('Imagick conversion failed for page 1: ' . $e->getMessage());
                    $command1 = "convert -density 300 \"{$templatePath}[0]\" \"{$tempImagePathPage1}\" 2>&1";
                    exec($command1, $output1, $returnVar1);
                    if ($returnVar1 !== 0 || !file_exists($tempImagePathPage1)) {
                        \Log::error('PDF to image conversion failed for page 1: ' . implode(', ', $output1));
                        return;
                    }
                }
            } else {
                $command1 = "convert -density 300 \"{$templatePath}[0]\" \"{$tempImagePathPage1}\" 2>&1";
                exec($command1, $output1, $returnVar1);
                if ($returnVar1 !== 0 || !file_exists($tempImagePathPage1)) {
                    \Log::error('ImageMagick not available for PDF conversion');
                    return;
                }
            }

            // Convert student-certificate.pdf (Page 2)
            if (extension_loaded('imagick')) {
                try {
                    $imagick2 = new \Imagick();
                    $imagick2->setResolution(300, 300);
                    $imagick2->readImage($studentCertPath . '[0]'); // First page of student certificate
                    $imagick2->setImageFormat('png');
                    $imagick2->writeImage($tempImagePathPage2);
                    $imagick2->clear();
                    $imagick2->destroy();
                } catch (\Exception $e) {
                    \Log::error('Imagick conversion failed for page 2: ' . $e->getMessage());
                    $command2 = "convert -density 300 \"{$studentCertPath}[0]\" \"{$tempImagePathPage2}\" 2>&1";
                    exec($command2, $output2, $returnVar2);
                    if ($returnVar2 !== 0 || !file_exists($tempImagePathPage2)) {
                        \Log::error('PDF to image conversion failed for page 2: ' . implode(', ', $output2));
                        return;
                    }
                }
            } else {
                $command2 = "convert -density 300 \"{$studentCertPath}[0]\" \"{$tempImagePathPage2}\" 2>&1";
                exec($command2, $output2, $returnVar2);
                if ($returnVar2 !== 0 || !file_exists($tempImagePathPage2)) {
                    \Log::error('ImageMagick not available for PDF conversion');
                    return;
                }
            }

            // Load both pages to get dimensions
            $imgPage1 = Image::make($tempImagePathPage1);
            $imgPage2 = Image::make($tempImagePathPage2);
            
            // Get actual image dimensions
            $width1 = $imgPage1->width();
            $height1 = $imgPage1->height();
            $width2 = $imgPage2->width();
            $height2 = $imgPage2->height();
            
            // Page 2 (student certificate) uses landscape orientation
            // Use Page 2 dimensions for the certificate page
            $certWidth = $width2;
            $certHeight = $height2;
            
            // Get certificate record for certificate ID and dates
            $websiteController = new \App\Http\Controllers\Frontend\WebsiteController();
            $certificate_record = $isProgram ? $websiteController->getProgramCertificateRecord($program->id) : $websiteController->getCertificateRecord($course->id);
            
            // Prepare data
            $studentName = $student->name;
            $certificateDate = $certificate_record && $certificate_record->created_at ? $certificate_record->created_at->format('F d, Y') : date('F d, Y');
            
            // Get start and end dates from certificate record or enrollment
            $startDate = '';
            $endDate = '';
            if ($certificate_record) {
                if ($certificate_record->start_date) {
                    $startDate = \Carbon\Carbon::parse($certificate_record->start_date)->format('m/d/Y');
                }
                if ($certificate_record->end_date) {
                    $endDate = \Carbon\Carbon::parse($certificate_record->end_date)->format('m/d/Y');
                }
            }
            if (empty($startDate) && $enrolled->created_at) {
                $startDate = $enrolled->created_at->format('m/d/Y');
            }
            if (empty($endDate)) {
                $endDate = date('m/d/Y');
            }
            
            // Format date range for display
            $dateRange = $startDate . ' – ' . $endDate;
            
            // ========== ADD TEXT TO PAGE 1 (Authority Letter) ==========
            $gdImagePage1 = $imgPage1->getCore();
            
            // Colors for Page 1
            $blackPage1 = imagecolorallocate($gdImagePage1, 0, 0, 0);
            $darkGrayPage1 = imagecolorallocate($gdImagePage1, 60, 60, 60);
            
            // Font path for Page 1
            $fontPathPage1 = public_path('vendor/spondonit/fonts/poppins/Poppins-Regular.ttf');
            if (!file_exists($fontPathPage1)) {
                $fontPathPage1 = public_path('fonts/nunito.ttf');
            }
            
            // Font sizes for Page 1
            $dpi = 300;
            $ptToPx = $dpi / 72;
            $page1FontSize = 8.5 * $ptToPx; // Regular size for letter text
            $page1SmallFontSize = 8.5 * $ptToPx; // Smaller for dates/ID
            
            // Helper function to add text to Page 1
            $addTextPage1 = function($text, $x, $y, $fontSize, $color) use ($gdImagePage1, $fontPathPage1) {
                imagettftext($gdImagePage1, $fontSize, 0, $x, $y, $color, $fontPathPage1, $text);
            };
            
            // Add Student Name after "Completion Letter for" (around 35-40% height)
            $studentNameX = 1520; // Left margin
            $studentNameY = 731; // After "Completion Letter for"
            $addTextPage1($studentName, $studentNameX, $studentNameY, $page1FontSize, $blackPage1);
            
            // Add Certificate ID (if available) - place it near student name or in a suitable location
            if ($certificate_record && $certificate_record->certificate_id) {
                $certIdText = 'Applicant ID: ' . $certificate_record->certificate_id;
                $certIdX = 365;
                $certIdY = 795; // Below student name
                $addTextPage1($certIdText, $certIdX, $certIdY, $page1SmallFontSize, $darkGrayPage1);
            }

            // Add Student Name
            $studentNameX = 520; // Left margin
            $studentNameY = 858; // After "Completion Letter for"
            $addTextPage1('Mr./Ms. ' . $studentName, $studentNameX, $studentNameY, $page1FontSize, $blackPage1);
            
            // Add Program Name - 
            $programNameX = 300;
            $programNameY = 913; 
            $addTextPage1($programOrCourseName, $programNameX, $programNameY, $page1FontSize, $blackPage1);
            
            // Add Date Range after "Campus since" (around 50-55% height)
            $dateX = 1560;
            $dateY = 968;
            $addTextPage1($dateRange, $dateX, $dateY, $page1SmallFontSize, $darkGrayPage1);

            // Add Student Name
            $studentNameX = 412; // Left margin
            $studentNameY = 1150; // top
            $addTextPage1('Mr./Ms. ' . $studentName, $studentNameX, $studentNameY, $page1FontSize, $blackPage1);

            // Add Student Name
            $studentNameX = 930; // Left margin
            $studentNameY = 1382; // top            
            $addTextPage1('Mr./Ms. ' . $studentName, $studentNameX, $studentNameY, $page1FontSize, $blackPage1);

            // Add Student Name
            $studentNameX = 170; // Left margin
            $studentNameY = 1030; // top \
            $addTextPage1($studentName, $studentNameX, $studentNameY, $page1FontSize, $blackPage1);

            // Add Student Name
            $studentNameX = 170; // Left margin
            $studentNameY = 1550; // top
            $addTextPage1($studentName, $studentNameX, $studentNameY, $page1FontSize, $blackPage1);
            
            // Update Page 1 image
            $imgPage1->setCore($gdImagePage1);
            $imgPage1->save($tempImagePathPage1);
            
            // ========== ADD TEXT TO PAGE 2 (Student Certificate) ==========
            // Get GD image for Page 2 to add text (same as StudentController)
            $gdImage = $imgPage2->getCore();
            
            // Colors - Same as StudentController
            $orange = imagecolorallocate($gdImage, 255, 140, 0);
            $darkOrange = imagecolorallocate($gdImage, 200, 100, 0);
            $black = imagecolorallocate($gdImage, 0, 0, 0);
            $darkGray = imagecolorallocate($gdImage, 60, 60, 60);
            $gray = imagecolorallocate($gdImage, 100, 100, 100);
            
            // Font file path - Same as StudentController
            $fontPath = public_path('vendor/spondonit/fonts/poppins/Poppins-SemiBold.ttf');
            if (!file_exists($fontPath)) {
                $fontPath = public_path('vendor/spondonit/fonts/poppins/Poppins-Medium.ttf');
                if (!file_exists($fontPath)) {
                    $fontPath = public_path('vendor/spondonit/fonts/poppins/Poppins-Regular.ttf');
                    if (!file_exists($fontPath)) {
                        $fontPath = public_path('fonts/nunito.ttf');
                    }
                }
            }
            
            // Bold font for headings
            $boldFontPath = public_path('vendor/spondonit/fonts/poppins/Poppins-SemiBold.ttf');
            if (!file_exists($boldFontPath)) {
                $boldFontPath = $fontPath;
            }
            
            // Font sizes - Same as StudentController
            $dpi = 300;
            $ptToPx = $dpi / 72;
            
            // Student Name - Same as StudentController
            $nameFontSize = 12 * $ptToPx;
            $nameY = $certHeight * 0.42;
            
            // Course/Program Name - Same as StudentController
            $courseFontSize = 6 * $ptToPx;
            $courseY = $certHeight * 0.63;
            
            // Date - Same as StudentController
            $dateFontSize = 4 * $ptToPx;
            $dateY = $certHeight * 0.72;
            
            // Certificate ID - Same as StudentController
            $certIdFontSize = 4 * $ptToPx;
            $certIdY = $certHeight * 1.00;
            
            // Helper function to center text using TTF with optional stroke - Same as StudentController
            $centerTextTTF = function($text, $x, $y, $fontSize, $fontPath, $color, $strokeColor = null, $strokeWidth = 0) use ($gdImage) {
                $bbox = imagettfbbox($fontSize, 0, $fontPath, $text);
                $textWidth = abs($bbox[4] - $bbox[0]);
                $x = $x - ($textWidth / 2);
                
                if ($strokeColor !== null && $strokeWidth > 0) {
                    for ($i = -$strokeWidth; $i <= $strokeWidth; $i++) {
                        for ($j = -$strokeWidth; $j <= $strokeWidth; $j++) {
                            if ($i != 0 || $j != 0) {
                                imagettftext($gdImage, $fontSize, 0, $x + $i, $y + $j, $strokeColor, $fontPath, $text);
                            }
                        }
                    }
                }
                
                imagettftext($gdImage, $fontSize, 0, $x, $y, $color, $fontPath, $text);
            };
            
            // Add Student Name - Same as StudentController
            $centerTextTTF($studentName, $certWidth / 2, $nameY, $nameFontSize, $boldFontPath, $darkGray, $darkGray, 1);
            
            // Add Course/Program Name - Same as StudentController
            $centerTextTTF($programOrCourseName, $certWidth / 2, $courseY, $courseFontSize, $fontPath, $darkGray, null, 0);
            
            // Add Date - Same as StudentController
            $centerTextTTF($certificateDate, 922, $dateY + 74, $dateFontSize, $fontPath, $darkGray, null, 0);
            
            // Add Certificate ID if available - Same as StudentController
            if ($certificate_record && $certificate_record->certificate_id) {
                $centerTextTTF('Certificate ID: ' . $certificate_record->certificate_id, 922, $certIdY - 100, $certIdFontSize, $fontPath, $gray, null, 0);
            }
            
            // Update Page 2 image
            $imgPage2->setCore($gdImage);
            $imgPage2->save($tempImagePathPage2);

            // Convert both images back to PDF with 2 pages
            // Page 1: Portrait orientation
            $page1Width = $width1 * 0.264583;
            $page1Height = $height1 * 0.264583;
            
            // Page 2: Landscape orientation (student certificate)
            $page2Width = $certWidth * 0.264583;
            $page2Height = $certHeight * 0.264583;
            
            // Create PDF - start with Page 1 dimensions
            $pdf = new Fpdf('P', 'mm', [$page1Width, $page1Height]);
            
            // Set margins to 0 to use full page
            $pdf->SetMargins(0, 0, 0);
            $pdf->SetAutoPageBreak(false);
            
            // Add Page 1 (authority letter - portrait) - use full page dimensions
            $pdf->AddPage();
            $pdf->Image($tempImagePathPage1, 0, 0, $page1Width, $page1Height, 'PNG');
            
            // Add Page 2 (student certificate - landscape) - use landscape dimensions
            // Change to landscape for this page
            $pdf->AddPage('L', [$page2Width, $page2Height]);
            $pdf->Image($tempImagePathPage2, 0, 0, $page2Width, $page2Height, 'PNG');
            
            // Save filled PDF
            $filledPdfPath = storage_path('app/temp/authority_filled_' . time() . '.pdf');
            $pdf->Output('F', $filledPdfPath);
            
            // Clean up temp images
            if (file_exists($tempImagePathPage1)) {
                unlink($tempImagePathPage1);
            }
            if (file_exists($tempImagePathPage2)) {
                unlink($tempImagePathPage2);
            }

            // Get email configuration
            $emailSetting = EmailSetting::where('active_status', 1)->first();
            
            // Get recipient email - check env first, then settings, then default
            $toEmail = env('AUTHORITY_LETTER_EMAIL');
            if (empty($toEmail) && $emailSetting) {
                $toEmail = $emailSetting->from_email; // Fallback to system email
            }
            if (empty($toEmail)) {
                $toEmail = config('mail.from.address', 'admin@example.com');
            }
        
            $fromEmail = $emailSetting ? $emailSetting->from_email : config('mail.from.address');
            $fromName = $emailSetting ? $emailSetting->from_name : config('mail.from.name');

            // Verify PDF file exists before sending
            if (!file_exists($filledPdfPath)) {
                \Log::error('Filled PDF not found: ' . $filledPdfPath);
                return;
            }

            // Send email with PDF attachment
            try {
                Mail::send('partials.email', [
                    'body' => "Dear Sir/Madam,<br><br>
                    Please find attached the authority letter for the following student:<br><br>
                    <strong>Student Name:</strong> {$student->name}<br>
                    <strong>Email:</strong> {$student->email}<br>
                    <strong>{$programOrCourseType}:</strong> {$programOrCourseName}<br>
                    <strong>Enrollment Date:</strong> {$enrollmentDate}<br><br>
                    Best regards,<br>
                    " . ($fromName ?? 'System')
                ], function ($message) use ($toEmail, $fromEmail, $fromName, $filledPdfPath, $student, $programOrCourseName) {
                    $message->from($fromEmail, $fromName);
                    $message->to($toEmail);
                    $message->subject('Authority Letter - ' . $student->name . ' - ' . $programOrCourseName);
                    $message->attach($filledPdfPath, [
                        'as' => 'authority-letter.pdf',
                        'mime' => 'application/pdf',
                    ]);
                });
                
                Log::info('Authority letter email sent successfully', [
                    'to' => $toEmail,
                    'from' => $fromEmail,
                    'file' => $filledPdfPath,
                    'student' => $student->name
                ]);
            } catch (\Exception $mailException) {
                \Log::error('Email sending failed: ' . $mailException->getMessage(), [
                    'to' => $toEmail,
                    'from' => $fromEmail,
                    'file' => $filledPdfPath,
                    'trace' => $mailException->getTraceAsString()
                ]);
            }

            // Clean up filled PDF after sending (commented for debugging)
            if (file_exists($filledPdfPath)) {
                unlink($filledPdfPath);
            }

        } catch (\Exception $e) {
            \Log::error('Authority letter email error: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
        }
    }
}

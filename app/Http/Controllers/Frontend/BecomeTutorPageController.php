<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Jobs\SendGeneralEmail;
use App\Traits\ImageStore;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 * Isolated controller for the public Become a Tutor page.
 * Same workflow as old Tutor register: inactive user + instructor related tables.
 */
class BecomeTutorPageController extends Controller
{
    use ImageStore;

    public function __construct()
    {
        $this->middleware('maintenanceMode');
    }

    public function index()
    {
        return view(theme('pages.become-a-tutor'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|max:191|unique:users,email',
            'phone' => 'required|string|max:100',
            'location' => 'required|string|max:255',
            'nursing_credential' => 'required|string|max:100',
            'years_experience' => 'required|string|max:50',
            'specialties' => 'nullable|array',
            'specialties.*' => 'string|max:150',
            'taught_before' => 'required|string|max:150',
            'why_teach' => 'nullable|string|max:5000',
            'availability' => 'nullable|array',
            'availability.*' => 'string|max:100',
            'upload_resume' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        ], [
            'email.unique' => 'An account with this email already exists.',
            'upload_resume.mimes' => 'Resume must be a PDF or Word document.',
            'upload_resume.max' => 'Resume may not be greater than 10MB.',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->to(route('becomeATutor') . '#apply')
                ->withErrors($validator)
                ->withInput();
        }

        $specialties = $request->input('specialties', []);
        $availability = $request->input('availability', []);
        $fullName = trim($request->first_name . ' ' . $request->last_name);

        // NOT NULL placeholders (same tables as old flow; new form does not collect these)
        $positionId = DB::table('instructor_positions')->orderBy('id')->value('id') ?? 1;
        $hearId = DB::table('instructor_hears')->orderBy('id')->value('id') ?? 1;

        try {
            DB::beginTransaction();

            $user = new User();
            $user->name = $fullName;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->location;
            $user->about = $request->why_teach;
            $user->role_id = 2; // Instructor — show in admin Instructors list (not Individual Tutors)
            $user->status = 0;  // inactive until admin sets password
            $user->password = null;
            $user->language_id = Settings('language_id') ?? 19;
            $user->language_name = Settings('language_name') ?? 'English';
            $user->language_code = Settings('language_code') ?? 'en';
            $user->language_rtl = Settings('language_rtl') ?? '0';
            $user->country = Settings('country_id');
            $user->lms_id = 1;
            $user->referral = generateUniqueId();
            $user->username = null;
            $user->save();

            $resumePath = null;
            if ($request->hasFile('upload_resume')) {
                $resumePath = self::saveFile($request->file('upload_resume'));
            }

            DB::table('become_instructors_form_data')->insert([
                'user_id' => $user->id,
                'instructor_position_id' => $positionId,
                'instructor_hear_id' => $hearId,
                'start_date' => null,
                'created_at' => Carbon::now(),
                'lms_id' => 1,
            ]);

            DB::table('instructors_personal_info')->insert([
                'user_id' => $user->id,
                'first_name' => $request->first_name,
                'middle_name' => null,
                'last_name' => $request->last_name,
                'gender' => null,
                'date_of_birth' => null,
                'email' => $request->email,
                'phone' => $request->phone,
                'cell' => null,
                'work' => null,
                'address' => $request->location,
                'nursing_credential' => $request->nursing_credential,
                'years_experience' => $request->years_experience,
                'specialties' => !empty($specialties) ? json_encode(array_values($specialties)) : null,
                'taught_before' => $request->taught_before,
                'availability' => !empty($availability) ? json_encode(array_values($availability)) : null,
                'created_at' => Carbon::now(),
                'lms_id' => 1,
            ]);

            DB::table('instructors_school_info')->insert([
                'user_id' => $user->id,
                'high_school' => null,
                'school_years_attended' => null,
                'school_year_graduate' => null,
                'school_degree' => null,
                'college' => null,
                'email' => null,
                'college_graduate' => null,
                'trade_school' => null,
                'trade_degree' => null,
                'trade_years_attended' => null,
                'trade_year_graduate' => null,
                'created_at' => Carbon::now(),
                'lms_id' => 1,
            ]);

            DB::table('instructors_teaching_experience')->insert([
                'user_id' => $user->id,
                'current_position' => null,
                'phone' => null,
                'employee_name' => null,
                'date_employer_start' => null,
                'date_employer_end' => null,
                'supervisor_name' => null,
                'upload_resume' => $resumePath,
                'cover' => null,
                'address' => null,
                'created_at' => Carbon::now(),
                'lms_id' => 1,
            ]);

            DB::commit();

            try {
                SendGeneralEmail::dispatch($user, 'New_Student_Reg', [
                    'time' => Carbon::now()->format('d-M-Y, g:i A'),
                    'name' => $fullName,
                    'type' => 'instructor',
                ]);
            } catch (\Throwable $e) {
                // Do not fail the application if mail/queue fails
            }

            Toastr::success(
                'Application submitted successfully. You will be able to login after admin sets up your password.',
                'Success'
            );

            return redirect()
                ->to(route('becomeATutor') . '#apply')
                ->with('become_tutor_success', true);
        } catch (\Throwable $e) {
            DB::rollBack();
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));

            return redirect()
                ->to(route('becomeATutor') . '#apply')
                ->withInput();
        }
    }
}

<?php

namespace Modules\CeProfessional\Services;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\CeProfessional\Entities\CeProfessional;
use Modules\CeProfessional\Repositories\CeProfessionalRepositoryInterface;

class CeRegistrationService
{
    protected $userRepository;

    protected $ceProfessionalRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        CeProfessionalRepositoryInterface $ceProfessionalRepository
    ) {
        $this->userRepository = $userRepository;
        $this->ceProfessionalRepository = $ceProfessionalRepository;
    }

    /**
     * Create users + ce_professionals rows for a new CE Professional signup.
     */
    public function register(array $data): CeProfessional
    {
        return DB::transaction(function () use ($data) {
            $user = $this->userRepository->create($this->buildUserPayload($data));

            $profile = $this->ceProfessionalRepository->create(
                $this->buildProfilePayload($user->id, $data)
            );

            Auth::login($user);

            return $profile;
        });
    }

    protected function buildUserPayload(array $data): array
    {
        return [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => null,
            'zip' => null,
            'role_id' => config('ceprofessional.role_id', 10),
            'dob' => null,
            'gender' => null,
            'student_type' => null,
            'studying_for' => null,
            'student_journey' => null,
            'job_title' => null,
            'identification_number' => null,
            'company' => null,
            'password' => Hash::make($data['password']),
            'language_id' => Settings('language_id') ?? '19',
            'language_name' => Settings('language_name') ?? 'English',
            'language_code' => Settings('language_code') ?? 'en',
            'language_rtl' => Settings('language_rtl') ?? '0',
            'country' => Settings('country_id'),
            'enroll_date' => null,
            'preregister_date' => date('Y-m-d'),
            'username' => null,
            'address' => null,
            'status' => 1,
            'register_source' => config('ceprofessional.register_source', 'ce_portal'),
            'enrolled' => 'No',
            'is_lms_signup' => null,
            'institute_name' => null,
            'domain' => null,
            'level' => '',
            'is_shopping_user' => false,
        ];
    }

    protected function buildProfilePayload(int $userId, array $data): array
    {
        $payload = [
            'user_id' => $userId,
            'fl_license_number' => $data['fl_license_number'],
            'license_type' => $data['license_type'],
            'consent_license_accurate' => true,
            'consent_ce_broker_reporting' => true,
            'consent_marketing_email' => ! empty($data['consent_marketing_email']),
        ];

        if ($data['license_type'] === 'aprn') {
            $payload['aprn_nationally_certified'] = ($data['aprn_nationally_certified'] ?? '') === 'yes';
            $payload['aprn_autonomous'] = ($data['aprn_autonomous'] ?? '') === 'yes';
        }

        return $payload;
    }
}

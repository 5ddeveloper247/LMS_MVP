<?php

namespace Modules\CeProfessional\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\CeProfessional\Http\Requests\CeRegistrationRequest;
use Modules\CeProfessional\Services\CeRegistrationService;

class CeRegistrationController extends Controller
{
    protected $ceRegistrationService;

    public function __construct(CeRegistrationService $ceRegistrationService)
    {
        $this->ceRegistrationService = $ceRegistrationService;
    }

    /**
     * CE Professional signup — redirects to dashboard after login.
     */
    public function register(CeRegistrationRequest $request)
    {
        if ($request->filled('redirect_to')) {
            $path = normalizeInternalRedirectPath((string) $request->input('redirect_to'));
            if (isCeCartRedirectUrl($path)) {
                rememberCeCartRedirectUrl($path);
            }
        }

        $this->ceRegistrationService->register($request->validated());

        if ($redirectTo = pullPendingCeCartRedirectUrl()) {
            return redirect()->to($redirectTo);
        }

        return redirect()->route('cePortal');
    }
}

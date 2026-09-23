<?php

namespace Modules\CeProfessional\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
     * CE Professional signup — success page until dashboard is live.
     */
    public function register(CeRegistrationRequest $request)
    {
        $this->ceRegistrationService->register($request->validated());

        return view('ceprofessional::registration.coming-soon', [
            'name' => trim($request->input('name', '')),
        ]);
    }

    /**
     * Logged-in CE Professional landing (dashboard coming soon).
     */
    public function portal()
    {
        $user = Auth::user();
        if ((int) $user->role_id !== (int) config('ceprofessional.role_id', 10)) {
            abort(403);
        }

        return view('ceprofessional::registration.coming-soon', [
            'name' => $user->name,
        ]);
    }
}

<?php

namespace Modules\CeProfessional\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\ImageStore;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\CeProfessional\Http\Requests\CeProfileUpdateRequest;
use Modules\CeProfessional\Repositories\CeProfessionalRepositoryInterface;

class CeProfileController extends Controller
{
    use ImageStore;

    protected $ceProfessionalRepository;

    public function __construct(CeProfessionalRepositoryInterface $ceProfessionalRepository)
    {
        $this->ceProfessionalRepository = $ceProfessionalRepository;
    }

    public function show()
    {
        $user = Auth::user();
        $profile = $this->ceProfessionalRepository->findByUserId((int) $user->id);
        $licenseTypes = config('ceprofessional.license_types', []);

        return view('ceprofessional::profile.index', compact('user', 'profile', 'licenseTypes'));
    }

    public function update(CeProfileUpdateRequest $request)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        try {
            $user = Auth::user();
            $phone = $request->filled('phone') ? $request->phone : null;

            $user->update([
                'name' => $request->name,
                'phone' => $phone,
            ]);

            $this->ceProfessionalRepository->updateByUserId((int) $user->id, [
                'consent_marketing_email' => $request->boolean('consent_marketing_email'),
            ]);

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return redirect()->route('cePortal.profile');
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));

            return redirect()->back()->withInput();
        }
    }

    public function uploadPhoto(Request $request)
    {
        try {
            $user = Auth::user();

            if (! $request->hasFile('file')) {
                return $this->uploadResponse(422, 'error', '#', 'File not uploaded. Please try again.');
            }

            $user->image = $this->saveImage($request->file('file'));
            $user->save();

            return $this->uploadResponse(200, 'success', asset($user->image), 'Image uploaded successfully.');
        } catch (\Throwable $th) {
            return $this->uploadResponse(422, 'error', '#', 'File not uploaded. Please try again.');
        }
    }

    protected function uploadResponse(int $status, string $state, string $path, string $message)
    {
        return response()->json([
            'status' => $status,
            'state' => $state,
            'path' => $path,
            'message' => $message,
        ]);
    }
}

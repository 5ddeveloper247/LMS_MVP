<?php

namespace Modules\ContinuingEducation\Http\Controllers;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use InvalidArgumentException;
use Modules\ContinuingEducation\Http\Requests\StoreCeLicenseRequest;
use Modules\ContinuingEducation\Http\Requests\UpdateCeLicenseRequest;
use Modules\ContinuingEducation\Services\CeLicenseService;

class CeLicenseController extends Controller
{
    public function __construct(
        protected CeLicenseService $licenseService
    ) {}

    public function index()
    {
        try {
            $licenses = $this->licenseService->listForAdmin();
            $cardStyles = config('continuingeducation.license_card_styles', []);
            $featuredCount = $this->licenseService->featuredCount();
            $maxFeatured = CeLicenseService::MAX_FEATURED;

            return view('continuingeducation::licenses.index', compact(
                'licenses',
                'cardStyles',
                'featuredCount',
                'maxFeatured'
            ));
        } catch (\Exception $e) {
            report($e);
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));

            return redirect()->route('dashboard');
        }
    }

    public function create()
    {
        $cardStyles = config('continuingeducation.license_card_styles', []);
        $featuredCount = $this->licenseService->featuredCount();
        $maxFeatured = CeLicenseService::MAX_FEATURED;

        return view('continuingeducation::licenses.create', compact(
            'cardStyles',
            'featuredCount',
            'maxFeatured'
        ));
    }

    public function store(StoreCeLicenseRequest $request)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        try {
            $this->licenseService->create($request->toPayload());
            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return redirect()->route('continuing-education.licenses.index');
        } catch (InvalidArgumentException $e) {
            Toastr::error($e->getMessage(), trans('common.Failed'));

            return redirect()->back()->withInput();
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));

            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $license = $this->licenseService->findForLms((int) $id);
        $cardStyles = config('continuingeducation.license_card_styles', []);
        $featuredCount = $this->licenseService->featuredCount($license->id);
        $maxFeatured = CeLicenseService::MAX_FEATURED;

        return view('continuingeducation::licenses.edit', compact(
            'license',
            'cardStyles',
            'featuredCount',
            'maxFeatured'
        ));
    }

    public function update(UpdateCeLicenseRequest $request, $id)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        try {
            $license = $this->licenseService->findForLms((int) $id);
            $this->licenseService->update($license, $request->toPayload());
            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return redirect()->route('continuing-education.licenses.index');
        } catch (InvalidArgumentException $e) {
            Toastr::error($e->getMessage(), trans('common.Failed'));

            return redirect()->back()->withInput();
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));

            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        try {
            $license = $this->licenseService->findForLms((int) $id);
            $this->licenseService->delete($license);
            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return redirect()->route('continuing-education.licenses.index');
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));

            return redirect()->back();
        }
    }

    public function status($id)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        try {
            $license = $this->licenseService->findForLms((int) $id);
            $this->licenseService->toggleStatus($license);
            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return redirect()->route('continuing-education.licenses.index');
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));

            return redirect()->back();
        }
    }
}

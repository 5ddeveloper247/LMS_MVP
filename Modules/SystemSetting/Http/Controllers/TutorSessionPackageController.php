<?php

namespace Modules\SystemSetting\Http\Controllers;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Modules\SystemSetting\Entities\TutorSessionPackage;

class TutorSessionPackageController extends Controller
{
    public function index()
    {
        try {
            $packages = TutorSessionPackage::query()
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get();

            return view('systemsetting::tutor_session_packages.index', compact('packages'));
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
            return redirect()->back();
        }
    }

    public function create()
    {
        return view('systemsetting::tutor_session_packages.create');
    }

    public function store(Request $request)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        $data = $this->validated($request);

        if (!empty($data['is_featured']) && !$this->canFeature()) {
            Toastr::error('You can feature a maximum of 3 session packages.', trans('common.Failed'));
            return redirect()->back()->withInput();
        }

        try {
            if (!empty($data['popular'])) {
                TutorSessionPackage::query()->update(['popular' => 0]);
            }

            TutorSessionPackage::create($data);

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->route('tutorSessionPackages.index');
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $package = TutorSessionPackage::findOrFail($id);

        return view('systemsetting::tutor_session_packages.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        $package = TutorSessionPackage::findOrFail($id);
        $data = $this->validated($request);

        if (!empty($data['is_featured']) && !$package->is_featured && !$this->canFeature()) {
            Toastr::error('You can feature a maximum of 3 session packages.', trans('common.Failed'));
            return redirect()->back()->withInput();
        }

        try {
            if (!empty($data['popular'])) {
                TutorSessionPackage::query()
                    ->where('id', '!=', $package->id)
                    ->update(['popular' => 0]);
            }

            $package->update($data);

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->route('tutorSessionPackages.index');
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
            $package = TutorSessionPackage::findOrFail($id);
            $package->delete();

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->route('tutorSessionPackages.index');
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
            $package = TutorSessionPackage::findOrFail($id);
            $package->status = $package->status ? 0 : 1;
            $package->save();

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));
            return redirect()->route('tutorSessionPackages.index');
        } catch (\Exception $e) {
            Toastr::error(trans('common.Operation failed'), trans('common.Failed'));
            return redirect()->back();
        }
    }

    private function canFeature(): bool
    {
        return TutorSessionPackage::where('is_featured', 1)->count() < TutorSessionPackage::maxFeatured();
    }

    private function validated(Request $request): array
    {
        $validated = $request->validate([
            'heading' => 'required|string|max:100',
            'name' => 'required|string|max:150',
            'description' => 'nullable|string',
            'price_note' => 'nullable|string|max:255',
            'line_1' => 'nullable|string|max:255',
            'line_2' => 'nullable|string|max:255',
            'line_3' => 'nullable|string|max:255',
            'line_4' => 'nullable|string|max:255',
            'line_5' => 'nullable|string|max:255',
            'sessions_count' => 'required|integer|min:1|max:100',
            'price' => 'required|numeric|min:0',
            'sort_order' => 'nullable|integer|min:0',
            'is_featured' => 'nullable',
            'popular' => 'nullable',
            'status' => 'nullable',
        ]);

        $validated['is_featured'] = $request->boolean('is_featured') ? 1 : 0;
        $validated['popular'] = $request->boolean('popular') ? 1 : 0;
        $validated['status'] = $request->boolean('status') ? 1 : 0;
        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);

        return $validated;
    }
}

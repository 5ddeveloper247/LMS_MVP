<?php

namespace Modules\Certification\Http\Controllers;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rule;
use Modules\Certification\Entities\CertificationOffering;
use Modules\Certification\Entities\CertificationOfferingSession;

class CertificationOfferingSessionController extends Controller
{
    public function index(int $offeringId)
    {
        if (! Schema::hasTable('certification_offering_sessions')) {
            Toastr::error('Session table is missing. Run migration or live SQL.', 'Error');

            return redirect()->route('certificationOfferings.index');
        }

        $offering = CertificationOffering::with(['options:id,certification_offering_id,title'])
            ->findOrFail($offeringId);

        $sessions = CertificationOfferingSession::query()
            ->where('certification_offering_id', $offering->id)
            ->with('option:id,title')
            ->orderBy('starts_at')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('certification::sessions.index', compact('offering', 'sessions'));
    }

    public function create(int $offeringId)
    {
        $offering = CertificationOffering::with(['options:id,certification_offering_id,title,sort_order'])
            ->findOrFail($offeringId);

        return view('certification::sessions.create', compact('offering'));
    }

    public function store(Request $request, int $offeringId)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        $offering = CertificationOffering::findOrFail($offeringId);
        $data = $this->validatedSession($request, $offering);

        try {
            CertificationOfferingSession::create($data);
            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return redirect()->route('certificationOfferingSessions.index', $offering->id);
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());

            return redirect()->back()->withInput();
        }
    }

    public function edit(int $offeringId, int $sessionId)
    {
        $offering = CertificationOffering::with(['options:id,certification_offering_id,title,sort_order'])
            ->findOrFail($offeringId);

        $session = CertificationOfferingSession::query()
            ->where('certification_offering_id', $offering->id)
            ->findOrFail($sessionId);

        return view('certification::sessions.edit', compact('offering', 'session'));
    }

    public function update(Request $request, int $offeringId, int $sessionId)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        $offering = CertificationOffering::findOrFail($offeringId);
        $session = CertificationOfferingSession::query()
            ->where('certification_offering_id', $offering->id)
            ->findOrFail($sessionId);

        $data = $this->validatedSession($request, $offering, $session->id);

        try {
            $session->update($data);
            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return redirect()->route('certificationOfferingSessions.index', $offering->id);
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());

            return redirect()->back()->withInput();
        }
    }

    public function destroy(int $offeringId, int $sessionId)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        try {
            $session = CertificationOfferingSession::query()
                ->where('certification_offering_id', $offeringId)
                ->findOrFail($sessionId);
            $session->delete();

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return redirect()->route('certificationOfferingSessions.index', $offeringId);
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());

            return redirect()->back();
        }
    }

    public function status(int $offeringId, int $sessionId)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        try {
            $session = CertificationOfferingSession::query()
                ->where('certification_offering_id', $offeringId)
                ->findOrFail($sessionId);
            $session->status = (int) $session->status === 1 ? 0 : 1;
            $session->save();

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return redirect()->route('certificationOfferingSessions.index', $offeringId);
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());

            return redirect()->back();
        }
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedSession(Request $request, CertificationOffering $offering, ?int $ignoreId = null): array
    {
        $optionRule = Rule::exists('certification_offering_options', 'id')
            ->where('certification_offering_id', $offering->id);

        $validated = $request->validate([
            'starts_at' => 'required|date',
            'ends_at' => 'nullable|date|after_or_equal:starts_at',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'certification_offering_option_id' => ['nullable', 'integer', $optionRule],
            'capacity' => 'nullable|integer|min:1|max:9999',
            'sort_order' => 'nullable|integer|min:0|max:9999',
            'status' => 'nullable|in:0,1',
        ]);

        $startsAt = Carbon::parse($validated['starts_at']);
        $endsAt = ! empty($validated['ends_at']) ? Carbon::parse($validated['ends_at']) : null;

        $title = trim((string) ($validated['title'] ?? ''));
        if ($title === '') {
            $title = $startsAt->format('l, F j, Y');
        }

        $subtitle = trim((string) ($validated['subtitle'] ?? ''));
        if ($subtitle === '' && $endsAt) {
            $subtitle = $startsAt->format('g:i A').' – '.$endsAt->format('g:i A');
        } elseif ($subtitle === '') {
            $subtitle = $startsAt->format('g:i A');
        }

        return [
            'certification_offering_id' => $offering->id,
            'certification_offering_option_id' => $validated['certification_offering_option_id'] ?? null,
            'starts_at' => $startsAt,
            'ends_at' => $endsAt,
            'title' => $title,
            'subtitle' => $subtitle,
            'location' => $validated['location'] ?? null,
            'capacity' => $validated['capacity'] ?? null,
            'sort_order' => (int) ($validated['sort_order'] ?? 0),
            'status' => (int) ($validated['status'] ?? 1),
        ];
    }
}

<?php

namespace Modules\Certification\Http\Controllers;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Modules\Certification\Entities\CertificationCategory;
use Modules\Certification\Entities\CertificationGroup;
use Modules\Certification\Entities\CertificationOffering;
use Modules\Certification\Entities\CertificationOfferingOption;

class CertificationOfferingController extends Controller
{
    public function index()
    {
        if (! Schema::hasTable('certification_offerings')) {
            Toastr::error('Certification tables are missing. Run migration or live SQL.', 'Error');

            return view('certification::offerings.index', ['offerings' => collect()]);
        }

        $columns = [
            'id', 'name', 'slug', 'certification_group_id', 'certification_category_id', 'delivery_mode',
            'duration_summary', 'status', 'sort_order',
        ];

        if (! Schema::hasColumn('certification_offerings', 'certification_category_id')) {
            $columns = array_values(array_diff($columns, ['certification_category_id']));
        }

        $with = [
            'deliveryParts',
            'group:id,name',
            'options:id,certification_offering_id,title,price,sort_order',
        ];
        if (Schema::hasTable('certification_categories')) {
            $with[] = 'category:id,name,slug';
        }

        $offerings = CertificationOffering::query()
            ->select($columns)
            ->with($with)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('certification::offerings.index', compact('offerings'));
    }

    public function create()
    {
        $groups = $this->activeGroups();
        $categories = $this->activeCategories();

        return view('certification::offerings.create', compact('groups', 'categories'));
    }

    public function store(Request $request)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        $data = $this->validated($request);

        try {
            DB::transaction(function () use ($data, $request) {
                $offering = CertificationOffering::create($this->offeringAttributes($data));

                $this->syncDeliveryParts($offering, $request);
                $this->syncOptions($offering, $request);
            });

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return redirect()->route('certificationOfferings.index');
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent(), true);
            Toastr::error($e->getMessage(), trans('common.Error'));

            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $offering = CertificationOffering::with(['deliveryParts', 'options'])->findOrFail($id);
        $groups = $this->activeGroups();
        $categories = $this->activeCategories();

        return view('certification::offerings.edit', compact('offering', 'groups', 'categories'));
    }

    public function update(Request $request, $id)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        $offering = CertificationOffering::findOrFail($id);
        $data = $this->validated($request, $offering->id);

        try {
            DB::transaction(function () use ($offering, $data, $request) {
                $offering->update($this->offeringAttributes($data));

                $this->syncDeliveryParts($offering, $request);
                $this->syncOptions($offering, $request);
            });

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return redirect()->route('certificationOfferings.index');
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent(), true);
            Toastr::error($e->getMessage(), trans('common.Error'));

            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        try {
            CertificationOffering::findOrFail($id)->delete();

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return redirect()->route('certificationOfferings.index');
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());

            return redirect()->back();
        }
    }

    public function status($id)
    {
        if (demoCheck()) {
            return redirect()->back();
        }

        try {
            $offering = CertificationOffering::findOrFail($id);
            $offering->status = (int) $offering->status === 1 ? 0 : 1;
            $offering->save();

            Toastr::success(trans('common.Operation successful'), trans('common.Success'));

            return redirect()->route('certificationOfferings.index');
        } catch (\Exception $e) {
            GettingError($e->getMessage(), url()->current(), request()->ip(), request()->userAgent());

            return redirect()->back();
        }
    }

    private function validated(Request $request, ?int $ignoreId = null): array
    {
        $slugRule = Rule::unique('certification_offerings', 'slug');
        if ($ignoreId) {
            $slugRule->ignore($ignoreId);
        }

        $rules = [
            'name' => 'required|string|max:255',
            'slug' => ['nullable', 'string', 'max:255', 'alpha_dash', $slugRule],
            'certification_group_id' => Schema::hasTable('certification_groups')
                ? 'nullable|exists:certification_groups,id'
                : 'nullable',
            'certification_category_id' => Schema::hasTable('certification_categories')
                ? 'nullable|exists:certification_categories,id'
                : 'nullable',
            'short_description' => 'nullable|string|max:5000',
            'outcomes' => 'nullable|string',
            'requirements' => 'nullable|string',
            'format_label' => 'nullable|string|max:255',
            'ce_hours' => 'nullable|numeric|min:0|max:999.99',
            'ce_note' => 'nullable|string|max:255',
            'content' => 'required|string',
            'delivery_mode' => 'required|in:in_person,online,hybrid',
            'duration_summary' => 'nullable|string|max:150',
            'status' => 'nullable|in:0,1',
            'sort_order' => 'nullable|integer|min:0',
        ];

        if (Schema::hasTable('certification_offering_options')) {
            $rules['options'] = 'required|array|min:1';
            $rules['options.*.title'] = 'required|string|max:100';
            $rules['options.*.subtitle'] = 'nullable|string|max:255';
            $rules['options.*.price'] = 'required|numeric|min:0';
            $rules['options.*.product_code'] = 'nullable|string|max:100';
            $rules['options.*.sort_order'] = 'nullable|integer|min:0';
            $rules['options.*.id'] = 'nullable|integer';
        }

        $mode = $request->input('delivery_mode');

        if (in_array($mode, ['in_person', 'hybrid'], true)) {
            $rules['in_person_duration'] = 'required|string|max:100';
            $rules['in_person_session_label'] = 'nullable|string|max:255';
            $rules['in_person_notes'] = 'nullable|string';
        }

        if (in_array($mode, ['online', 'hybrid'], true)) {
            $rules['online_duration'] = 'required|string|max:100';
            $rules['online_session_label'] = 'nullable|string|max:255';
            $rules['online_notes'] = 'nullable|string';
        }

        $validated = $request->validate($rules, validationMessage($rules));

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        return $validated;
    }

    private function syncDeliveryParts(CertificationOffering $offering, Request $request): void
    {
        if (! Schema::hasTable('certification_offering_delivery_parts')) {
            return;
        }

        $offering->deliveryParts()->delete();

        $mode = $offering->delivery_mode;
        $parts = [];

        if (in_array($mode, ['online', 'hybrid'], true)) {
            $parts[] = [
                'part_type' => 'online',
                'duration' => $request->input('online_duration'),
                'session_label' => $request->input('online_session_label'),
                'notes' => $request->input('online_notes'),
                'sort_order' => 0,
            ];
        }

        if (in_array($mode, ['in_person', 'hybrid'], true)) {
            $parts[] = [
                'part_type' => 'in_person',
                'duration' => $request->input('in_person_duration'),
                'session_label' => $request->input('in_person_session_label'),
                'notes' => $request->input('in_person_notes'),
                'sort_order' => in_array($mode, ['hybrid'], true) ? 1 : 0,
            ];
        }

        foreach ($parts as $part) {
            $offering->deliveryParts()->create($part);
        }
    }

    private function offeringAttributes(array $data): array
    {
        $attrs = [
            'name' => $data['name'],
            'slug' => $data['slug'],
            'short_description' => $data['short_description'] ?? null,
            'format_label' => $data['format_label'] ?? null,
            'ce_hours' => isset($data['ce_hours']) && $data['ce_hours'] !== '' ? $data['ce_hours'] : null,
            'ce_note' => $data['ce_note'] ?? null,
            'content' => $data['content'],
            'delivery_mode' => $data['delivery_mode'],
            'duration_summary' => $data['duration_summary'] ?? null,
            'status' => (int) ($data['status'] ?? 1),
            'sort_order' => (int) ($data['sort_order'] ?? 0),
        ];

        if (Schema::hasColumn('certification_offerings', 'outcomes')) {
            $attrs['outcomes'] = $data['outcomes'] ?? null;
        }
        if (Schema::hasColumn('certification_offerings', 'requirements')) {
            $attrs['requirements'] = $data['requirements'] ?? null;
        }
        if (Schema::hasColumn('certification_offerings', 'certification_group_id')) {
            $attrs['certification_group_id'] = $this->nullableForeignId($data['certification_group_id'] ?? null);
        }
        if (Schema::hasColumn('certification_offerings', 'certification_category_id')) {
            $attrs['certification_category_id'] = $this->nullableForeignId($data['certification_category_id'] ?? null);
        }

        return $attrs;
    }

    private function syncOptions(CertificationOffering $offering, Request $request): void
    {
        if (! Schema::hasTable('certification_offering_options')) {
            return;
        }

        $rows = $request->input('options', []);
        $keptIds = [];
        $index = 0;

        foreach ($rows as $row) {
            if (empty($row['title']) && ($row['price'] ?? '') === '') {
                continue;
            }

            $payload = [
                'title' => $row['title'],
                'subtitle' => $row['subtitle'] ?? null,
                'price' => $row['price'],
                'product_code' => $row['product_code'] ?? null,
                'sort_order' => isset($row['sort_order']) ? (int) $row['sort_order'] : $index,
            ];

            $optionId = isset($row['id']) && $row['id'] !== '' ? (int) $row['id'] : null;
            if ($optionId) {
                $option = $offering->options()->whereKey($optionId)->first();
                if ($option) {
                    $option->update($payload);
                    $keptIds[] = $option->id;
                    $index++;

                    continue;
                }
            }

            $created = $offering->options()->create($payload);
            $keptIds[] = $created->id;
            $index++;
        }

        $staleOptions = $offering->options()
            ->when($keptIds !== [], fn ($query) => $query->whereNotIn('id', $keptIds))
            ->get();

        foreach ($staleOptions as $option) {
            if (! $this->optionCanBeDeleted($option)) {
                continue;
            }

            $option->delete();
        }
    }

    private function optionCanBeDeleted(CertificationOfferingOption $option): bool
    {
        if (Schema::hasTable('certification_enrollments')) {
            if (DB::table('certification_enrollments')
                ->where('certification_offering_option_id', $option->id)
                ->exists()) {
                return false;
            }
        }

        if (Schema::hasTable('carts') && Schema::hasColumn('carts', 'certification_offering_option_id')) {
            if (DB::table('carts')
                ->where('certification_offering_option_id', $option->id)
                ->exists()) {
                return false;
            }
        }

        return true;
    }

    private function nullableForeignId($value): ?int
    {
        if ($value === null || $value === '') {
            return null;
        }

        return (int) $value;
    }

    private function activeGroups()
    {
        if (! Schema::hasTable('certification_groups')) {
            return collect();
        }

        return CertificationGroup::active()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get(['id', 'name']);
    }

    private function activeCategories()
    {
        if (! Schema::hasTable('certification_categories')) {
            return collect();
        }

        return CertificationCategory::active()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get(['id', 'name', 'slug']);
    }
}

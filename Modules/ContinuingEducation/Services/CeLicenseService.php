<?php

namespace Modules\ContinuingEducation\Services;

use InvalidArgumentException;
use Modules\ContinuingEducation\Entities\CeLicenseType;

class CeLicenseService
{
    public const MAX_FEATURED = 2;

    public function listForAdmin()
    {
        return CeLicenseType::query()
            ->forLms()
            ->orderByRaw('COALESCE(seq_no, 999999) ASC')
            ->orderBy('name')
            ->get();
    }

    public function listPublished()
    {
        return CeLicenseType::query()
            ->published()
            ->featured()
            ->forLms()
            ->orderByRaw('COALESCE(seq_no, 999999) ASC')
            ->orderBy('name')
            ->limit(self::MAX_FEATURED)
            ->get();
    }

    public function findPublishedByCardStyle(string $cardStyle): ?CeLicenseType
    {
        return CeLicenseType::query()
            ->published()
            ->forLms()
            ->where('card_style', $cardStyle)
            ->orderByRaw('COALESCE(seq_no, 999999) ASC')
            ->first();
    }

    public function featuredCount(?int $exceptId = null, ?int $lmsId = null): int
    {
        $query = CeLicenseType::query()
            ->forLms($lmsId)
            ->where('featured', true);

        if ($exceptId) {
            $query->where('id', '!=', $exceptId);
        }

        return $query->count();
    }

    public function findForLms(int $id): CeLicenseType
    {
        return CeLicenseType::query()->forLms()->findOrFail($id);
    }

    public function create(array $payload): CeLicenseType
    {
        $license = new CeLicenseType();
        $license->lms_id = $this->lmsId();
        $this->applyPayload($license, $payload);
        $this->assertFeaturedLimit($license, (bool) $license->featured);
        $license->save();

        return $license;
    }

    public function update(CeLicenseType $license, array $payload): CeLicenseType
    {
        $this->applyPayload($license, $payload);
        $this->assertFeaturedLimit($license, (bool) $license->featured);
        $license->save();

        return $license;
    }

    public function delete(CeLicenseType $license): void
    {
        $license->delete();
    }

    public function toggleStatus(CeLicenseType $license): CeLicenseType
    {
        $license->status = ! $license->status;
        $license->publish = $license->status;
        $license->save();

        return $license;
    }

    protected function applyPayload(CeLicenseType $license, array $payload): void
    {
        $license->fill([
            'name' => $payload['name'],
            'subtitle' => $payload['subtitle'] ?? null,
            'description' => $payload['description'] ?? null,
            'component_1' => $payload['component_1'],
            'component_2' => $payload['component_2'],
            'component_3' => $payload['component_3'],
            'card_style' => $payload['card_style'] ?? 'teal',
            'button_label' => $payload['button_label'] ?? null,
            'button_url' => $this->storedButtonUrlForStyle($payload['card_style'] ?? 'teal'),
            'anchor_id' => $this->anchorIdForStyle($payload['card_style'] ?? 'teal'),
            'seq_no' => $payload['seq_no'] ?? null,
            'status' => (bool) ($payload['status'] ?? true),
            'publish' => (bool) ($payload['publish'] ?? true),
            'featured' => (bool) ($payload['featured'] ?? false),
        ]);
    }

    protected function assertFeaturedLimit(CeLicenseType $license, bool $wantsFeatured): void
    {
        if (! $wantsFeatured) {
            return;
        }

        if ($this->featuredCount($license->exists ? $license->id : null, $license->lms_id) >= self::MAX_FEATURED) {
            throw new InvalidArgumentException(
                'Only ' . self::MAX_FEATURED . ' license types can be featured on the Continuing Education page at a time.'
            );
        }
    }

    protected function lmsId(): int
    {
        return isModuleActive('LmsSaas') ? (int) app('institute')->id : 1;
    }

    protected function storedButtonUrlForStyle(string $cardStyle): string
    {
        $routeName = config(
            'continuingeducation.license_detail_routes.' . $cardStyle,
            'continuingEducationRnLpn'
        );

        return 'route:' . $routeName;
    }

    protected function anchorIdForStyle(string $cardStyle): string
    {
        return config(
            'continuingeducation.license_anchor_ids.' . $cardStyle,
            'rn-lpn-packages'
        );
    }
}

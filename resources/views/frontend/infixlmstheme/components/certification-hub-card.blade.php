@php
    /** @var \Modules\Certification\Entities\CertificationOffering $offering */
    $catalogService = $catalogService ?? app(\Modules\Certification\Services\CertificationCatalogService::class);
    $wide = $wide ?? false;
    $mark = $catalogService->pillLabel($offering);
    $credVariant = trim($catalogService->cardCredVariant($offering));
    $priceBoxes = $catalogService->hubPriceBoxes($offering);
    $singlePrice = count($priceBoxes) === 1;
    $badge = $catalogService->approvalBadgeText($offering);
    $duration = $catalogService->hubDurationLabel($offering);
    $format = $catalogService->hubFormatLabel($offering);
    $anchorId = $catalogService->offeringAnchorId($offering);
@endphp
<article class="cert-card{{ $wide ? ' wide' : '' }}" id="{{ $anchorId }}" aria-labelledby="{{ $anchorId }}-title">
  <div class="cred {{ $credVariant }}">
    <div class="cred-top">
      @include(theme('components.certification-cred-issuer'))
      <span class="cred-cat">{{ $catalogService->cardCategoryLabel($offering) }}</span>
    </div>
    <p class="cred-mark">{{ $mark }}</p>
    <p class="cred-name">{{ $offering->name }}</p>
    <div class="cred-strip">
      <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>{{ $duration }}</span>
      <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>{{ $format }}</span>
    </div>
  </div>
  <div class="cert-body">
    @if ($badge)
      <span class="badge-approved"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>{{ $badge }}</span>
    @endif
    <h3 class="sr-only" id="{{ $anchorId }}-title">{{ $mark }}</h3>
    <p class="desc">{{ $offering->short_description ?: \Illuminate\Support\Str::limit(strip_tags($offering->content ?? ''), 320) }}</p>
    @if (count($priceBoxes))
      <div class="cert-price{{ $singlePrice ? ' single' : '' }}">
        @foreach ($priceBoxes as $box)
          <div class="price-box{{ $box['is_renewal'] ? ' renew' : '' }}">
            <span class="lbl">{{ $box['label'] }}</span>
            <span class="amt">{{ $box['amount'] }}</span>
            @if (! empty($box['note']))
              <span class="note">{{ $box['note'] }}</span>
            @endif
          </div>
        @endforeach
      </div>
    @endif
    <div class="cert-actions">
      <a href="{{ route('certifications.enroll', $catalogService->routeSlug($offering)) }}" class="btn-enroll" aria-label="Enroll now in {{ $mark }}">Enroll Now</a>
      <a href="{{ route('certifications.show', $catalogService->routeSlug($offering)) }}" class="link-details" aria-label="View {{ $mark }} course details">Course Details</a>
    </div>
  </div>
</article>

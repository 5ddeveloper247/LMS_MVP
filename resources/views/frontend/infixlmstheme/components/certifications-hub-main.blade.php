@php
    $catalogService = app(\Modules\Certification\Services\CertificationCatalogService::class);
    $groupBlocks = $groupBlocks ?? [];
    $jumpItems = $jumpItems ?? collect();
    $heroOfferings = $heroOfferings ?? collect();
    $glanceOfferings = $glanceOfferings ?? collect();
    $totalCount = $totalCount ?? 0;
    $firstSectionId = $firstSectionId ?? 'life-support';
    $heroCredClasses = ['cred--warm c1', 'cred--mid c2', 'cred--light c3'];
    $courseCountLabel = $totalCount === 1 ? '1 certification course' : $totalCount.' certification courses';
@endphp
<div class="breadcrumb">
  <div class="breadcrumb-inner">
    <a href="{{ url('/') }}">Home</a>
    <span class="breadcrumb-sep">›</span>
    <a href="{{ url('/courses') }}">Courses</a>
    <span class="breadcrumb-sep">›</span>
    Certifications
  </div>
</div>

<main id="main">

<section class="hero">
  <div class="hero-grid">
    <div class="hero-copy">
      <span class="hero-eyebrow">Clinical Certifications</span>
      <h1>Get certified. <em>Stay ready for the moment it counts.</em></h1>
      <p class="hero-sub">Life support, IV therapy, HEDIS, and AHA skills sessions for nurses, nursing students, and everyday responders. Initial and renewal options, with hands-on training in Lakeland, FL.</p>
      <div class="hero-actions">
        <a href="#{{ $firstSectionId }}" class="btn-primary">Browse Certifications</a>
        <a href="#group-training" class="btn-ghost-light">Train a Group</a>
      </div>
      <div class="hero-meta">
        <span class="hero-meta-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>{{ $courseCountLabel }}</span>
        <span class="hero-meta-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>Initial &amp; renewal pricing</span>
        <span class="hero-meta-item"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>Lakeland, FL</span>
      </div>
    </div>

    @if ($heroOfferings->isNotEmpty())
      <div class="hero-cards" aria-hidden="true">
        @foreach ($heroOfferings as $index => $offering)
          @php
            $mark = $catalogService->pillLabel($offering);
            $extraClass = $heroCredClasses[$index] ?? '';
            $credVariant = trim($catalogService->cardCredVariant($offering).' '.$extraClass);
          @endphp
          <div class="cred {{ $credVariant }}">
            <div class="cred-top">
              @include(theme('components.certification-cred-issuer'))
              <span class="cred-cat">{{ $catalogService->cardCategoryLabel($offering) }}</span>
            </div>
            <p class="cred-mark">{{ $mark }}</p>
            <p class="cred-name">{{ $offering->name }}</p>
            <div class="cred-strip">
              <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>{{ $catalogService->hubDurationLabel($offering) }}</span>
              <span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>{{ $catalogService->hubFormatLabel($offering) }}</span>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</section>

@if ($jumpItems->isNotEmpty())
<nav class="jump-nav" aria-label="Jump to a certification">
  <div class="jump-inner">
    <span class="jump-label">Jump to:</span>
    @foreach ($jumpItems as $item)
      <a class="jump-chip" href="{{ $item['anchor'] }}">{{ $item['label'] }}</a>
    @endforeach
  </div>
</nav>
@endif

@forelse ($groupBlocks as $block)
  @php
    $presentation = $block['presentation'];
    $offerings = $block['offerings'];
    $layout = $presentation['layout'] ?? 'grid';
  @endphp
  <section class="{{ $presentation['section_class'] }}" id="{{ $presentation['section_id'] }}" aria-labelledby="{{ $presentation['section_id'] }}-title">
    <div class="container">
      <div class="group-head">
        <div>
          <span class="eyebrow">{{ $presentation['eyebrow'] }}</span>
          <h2 id="{{ $presentation['section_id'] }}-title">{!! $presentation['title_html'] !!}</h2>
        </div>
        @if (! empty($presentation['intro']))
          <p>{!! $presentation['intro'] !!}</p>
        @endif
      </div>

      @if ($layout === 'skills')
        <div class="skills-wrap">
          @foreach ($offerings as $offering)
            @include(theme('components.certification-hub-card'), ['offering' => $offering, 'catalogService' => $catalogService])
          @endforeach
          <div>
            <h3 class="path-title">How blended learning works</h3>
            <p class="path-intro">The Skills Check is not a full course. It is the in-person assessment that completes an AHA blended learning course you started online.</p>
            <ol class="path">
              <li><h4>Complete the online portion</h4><p>Finish the HeartCode® online course for ACLS, BLS, or PALS through the American Heart Association.</p></li>
              <li><h4>Book your skills session</h4><p>Enroll in a Skills Check and bring proof that you completed the online portion.</p></li>
              <li><h4>Demonstrate proficiency</h4><p>Show technical proficiency in a live, in-person skills assessment to earn your official course completion card.</p></li>
            </ol>
          </div>
        </div>
      @elseif ($layout === 'stack')
        <div class="cert-stack">
          @foreach ($offerings as $offering)
            @include(theme('components.certification-hub-card'), ['offering' => $offering, 'wide' => true, 'catalogService' => $catalogService])
          @endforeach
        </div>
      @else
        <div class="cert-grid">
          @foreach ($offerings as $offering)
            @include(theme('components.certification-hub-card'), ['offering' => $offering, 'catalogService' => $catalogService])
          @endforeach
        </div>
      @endif
    </div>
  </section>
@empty
  <section class="course-group" id="life-support">
    <div class="container">
      <p class="desc">No certifications are published yet. Add offerings in the admin catalog and set them to active.</p>
    </div>
  </section>
@endforelse

@if ($glanceOfferings->isNotEmpty())
<section class="glance" aria-labelledby="glance-title">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">Compare</span>
      <h2 id="glance-title">Every certification <em>at a glance</em></h2>
      <p>Course length, format, and pricing side by side.</p>
    </div>
    <div class="table-wrap" tabindex="0" role="region" aria-label="Certification comparison table">
      <table class="glance-table">
        <thead>
          <tr><th scope="col">Course</th><th scope="col">Length</th><th scope="col">Format</th><th scope="col">Initial</th><th scope="col">Renewal</th><th scope="col"><span class="sr-only">Details</span></th></tr>
        </thead>
        <tbody>
          @foreach ($glanceOfferings as $offering)
            @php
              $mark = $catalogService->pillLabel($offering);
              $pricing = $catalogService->glancePricing($offering);
              $subtitle = $offering->short_description ? \Illuminate\Support\Str::limit(strip_tags($offering->short_description), 80) : $offering->name;
            @endphp
            <tr>
              <td class="course">{{ $mark }}<span>{{ $subtitle }}</span></td>
              <td>{{ $catalogService->hubDurationLabel($offering) }}</td>
              <td>{{ $catalogService->hubFormatLabel($offering) }}</td>
              @if ($pricing['mode'] === 'dual')
                <td class="price">{{ $pricing['initial'] }}</td>
                <td class="price">{{ $pricing['renewal'] }}</td>
              @else
                <td class="price" colspan="2">{{ $pricing['combined'] ?? '—' }}</td>
              @endif
              <td><a href="{{ route('certifications.show', $catalogService->routeSlug($offering)) }}">View Details</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>
@endif

<section class="group-band" id="group-training" aria-labelledby="group-title">
  <div class="container">
    <div class="group-card">
      <div>
        <h2 id="group-title">Certifying a whole team? <em>We can schedule that.</em></h2>
        <p>Facilities, clinics, and nursing programs can book group sessions for any certification on this page. Tell us the course, how many people, and your timeline, and our team will put together a plan and a quote.</p>
        <a href="contact.html" class="btn-primary">Request a Group Quote</a>
      </div>
      <ul class="group-list">
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>BLS and ACLS for nursing staff and critical care teams</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>PALS for pediatric and emergency units</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>CPR &amp; First Aid for non-clinical staff and community groups</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>HEDIS training for quality and abstraction teams</li>
      </ul>
    </div>
  </div>
</section>

<section class="faq" aria-labelledby="faq-title">
  <div class="container">
    <div class="section-header">
      <span class="eyebrow">Questions</span>
      <h2 id="faq-title">Before you <em>enroll</em></h2>
    </div>
    <div class="faq-list">
      <details>
        <summary>Should I choose Initial or Renewal?</summary>
        <p>Choose Renewal if you hold a current, unexpired card for the same course. Choose Initial if this is your first time taking the course or your card has expired. Not sure? Call <a href="tel:8632508764">(863) 250-8764</a> and our team will help you pick.</p>
      </details>
      <details>
        <summary>Do I need a Skills Check if I take ACLS, BLS, or PALS here?</summary>
        <p>No. The Skills Check is only for providers who completed the online HeartCode® portion of an AHA blended learning course and still need the in-person skills assessment to earn their card.</p>
      </details>
      <details>
        <summary>Who is the IV Therapy course for?</summary>
        <p>The IV Therapy course is built for licensed nurses who want to strengthen their infusion skills. It is offered in a hybrid format that combines online learning with in-person training.</p>
      </details>
      <details>
        <summary>What is the difference between HEDIS Live and Self-Study?</summary>
        <p>HEDIS Live is instructor-led and includes the live interactive simulation lab. HEDIS Self-Study lets you work through the material on your own schedule.</p>
      </details>
      <details>
        <summary>Can my employer pay, or can I enroll a group?</summary>
        <p>Yes. Add your employer on the enrollment form, or <a href="contact.html">request a group quote</a>, and our team will follow up with options.</p>
      </details>
      <details>
        <summary>Do these courses count toward NCLEX coaching or FL BON remediation?</summary>
        <p>No. Certification courses are standalone trainings. For NCLEX preparation, see <a href="nclex-coaching.html">NCLEX Success Coaching</a>. For state-mandated remediation, see our <a href="remediation.html">FL BON Remediation Program</a>.</p>
      </details>
    </div>
  </div>
</section>

<section class="notice-section">
  <div class="container">
    <div class="notice-card">
      <h4>Important Notice</h4>
      <p>Certification courses are standalone training programs. They are not part of our NCLEX coaching programs and do not fulfill Florida Board of Nursing remediation requirements. For NCLEX preparation, see our <a href="nclex-coaching.html">NCLEX Success Coaching Program</a>. For FL BON remediation, see our <a href="remediation.html">FL BON Remediation Program</a>. Session availability may depend on minimum enrollment.</p>
    </div>
  </div>
</section>

<section class="final-cta">
  <div class="final-cta-inner">
    <h2>Ready to get <em>certified?</em></h2>
    <p>Pick your course and reserve a seat, or speak with our team about which certification your role or employer requires.</p>
    <div class="final-cta-actions">
      <a href="#{{ $firstSectionId }}" class="btn-primary">Browse Certifications</a>
      <a href="contact.html" class="btn-ghost-light">Speak With Our Team</a>
    </div>
  </div>
</section>

</main>

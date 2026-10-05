@php
    /** @var \Modules\ContinuingEducation\Entities\CeBundle $bundle */
    /** @var \Modules\ContinuingEducation\Services\CeCatalogService $ceCatalog */
    $electiveHoursAllowed = (float) ($electiveHoursAllowed ?? $bundle->elective_hours_allowed ?? 0);
    $mandatoryCourses = $mandatoryCourses ?? collect();
    $lockedElectiveCourses = $lockedElectiveCourses ?? collect();
    $optionalElectiveCourses = $optionalElectiveCourses ?? ($electiveCourses ?? collect());
    $lockedElectiveHours = (float) ($lockedElectiveHours ?? $lockedElectiveCourses->sum('contact_hours'));
    $hourSummary = $hourSummary ?? null;
    $backUrl = $backUrl ?? route('continuingEducation');
    $portalMode = (bool) ($portalMode ?? false);
    $portalPurchase = $portalPurchase ?? null;
    $portalRemainingElectiveHours = (float) ($portalRemainingElectiveHours ?? 0);
    $portalEnrolledElectiveHours = (float) ($portalEnrolledElectiveHours ?? 0);
    $enrolledUserElectiveItems = $enrolledUserElectiveItems ?? collect();
    $formAction = $portalMode && $portalPurchase
        ? route('cePortal.bundles.electives', $portalPurchase->id)
        : route('ce.cart.buyNowBundle', ['id' => $bundle->id]);
    $dashboardBackUrl = $portalMode
        ? route('cePortal.courses', ['view' => 'bundles'])
        : $backUrl;
    $oldElectives = collect(old('elective_course_ids', []))->map(function ($id) {
        return (int) $id;
    })->all();
    $remainingHint = max(0, $electiveHoursAllowed - $lockedElectiveHours);
    if ($portalMode) {
        $remainingHint = $portalRemainingElectiveHours;
    }
@endphp

<div id="mxp-ce-bundle" class="mxp-ce-bundle">
<style>
.mxp-ce-bundle{
  --ce-teal-mid:#1A8A6F;--ce-teal-deep:#0F6E56;--ce-teal-darkest:#0A4D3C;
  --ce-terracotta:#C65D3A;--ce-terracotta-deep:#A84B2D;
  --ce-cream:#F5EDE0;--ce-cream-warm:#EFE3D0;
  --ce-charcoal:#2B2B2B;--ce-charcoal-soft:#4A4A4A;
  --ce-white:#FFFFFF;--ce-gray-line:#E8DFD0;--ce-green:#2D9B4E;
  --ce-serif:'Playfair Display',Georgia,serif;
  --ce-sans:'Montserrat',system-ui,sans-serif;
  --ce-shadow-sm:0 2px 8px rgba(10,77,60,.06);
  --ce-shadow-md:0 8px 24px rgba(10,77,60,.10);
  font-family:var(--ce-sans);color:var(--ce-charcoal);background:var(--ce-cream);line-height:1.6;-webkit-font-smoothing:antialiased;
}
.mxp-ce-bundle *{box-sizing:border-box}
.mxp-ce-bundle h1,.mxp-ce-bundle h2,.mxp-ce-bundle h3{font-family:var(--ce-serif);font-weight:700;line-height:1.2;color:var(--ce-teal-darkest)}
.mxp-ce-bundle .ce-container{max-width:1120px;margin:0 auto;padding:0 24px}
.mxp-ce-bundle .ce-breadcrumb{background:var(--ce-cream-warm);padding:14px 32px;border-bottom:1px solid var(--ce-gray-line)}
.mxp-ce-bundle .ce-breadcrumb-inner{max-width:1120px;margin:0 auto;font-size:13px;color:var(--ce-charcoal-soft)}
.mxp-ce-bundle .ce-breadcrumb-inner a{color:var(--ce-teal-mid);text-decoration:none;font-weight:500}
.mxp-ce-bundle .ce-breadcrumb-inner span{margin:0 8px;opacity:.5}
.mxp-ce-bundle .ce-hero{background:linear-gradient(135deg,var(--ce-teal-darkest) 0%,var(--ce-teal-deep) 70%,var(--ce-teal-mid) 100%);color:var(--ce-white);padding:56px 32px}
.mxp-ce-bundle .ce-hero-inner{max-width:1120px;margin:0 auto;display:grid;grid-template-columns:1.4fr .9fr;gap:36px;align-items:start}
.mxp-ce-bundle .ce-hero-eyebrow{display:inline-block;font-size:11px;font-weight:600;letter-spacing:2px;text-transform:uppercase;color:var(--ce-cream);border:1px solid rgba(245,237,224,.35);border-radius:30px;padding:5px 14px;margin-bottom:16px}
.mxp-ce-bundle .ce-hero h1{color:var(--ce-white)!important;font-size:clamp(30px,4vw,44px);margin:0 0 10px}
.mxp-ce-bundle .ce-hero-sub{color:rgba(245,237,224,.88);font-size:16px;margin:0 0 18px;max-width:560px}
.mxp-ce-bundle .ce-hours-pills{display:flex;flex-wrap:wrap;gap:10px}
.mxp-ce-bundle .ce-hours-pill{background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.18);border-radius:999px;padding:8px 14px;font-size:12px;color:var(--ce-cream)}
.mxp-ce-bundle .ce-hours-pill strong{color:var(--ce-white);font-size:14px;margin-right:4px}
.mxp-ce-bundle .ce-hero-buy{background:var(--ce-white);border-radius:18px;padding:28px;color:var(--ce-charcoal);box-shadow:0 18px 40px rgba(0,0,0,.2)}
.mxp-ce-bundle .ce-hero-buy-price{font-family:var(--ce-serif);font-size:40px;font-weight:700;color:var(--ce-terracotta);line-height:1;margin:0 0 6px}
.mxp-ce-bundle .ce-hero-buy-note{font-size:13px;color:var(--ce-charcoal-soft);margin:0 0 18px}
.mxp-ce-bundle .ce-hero-buy-summary{font-size:13px;background:var(--ce-cream);border-radius:10px;padding:12px 14px;margin-bottom:16px;color:var(--ce-charcoal-soft)}
.mxp-ce-bundle .ce-hero-buy-summary span{display:block;margin:2px 0}
.mxp-ce-bundle .ce-section{padding:56px 32px}
.mxp-ce-bundle .ce-section.alt{background:var(--ce-white)}
.mxp-ce-bundle .ce-section-header{margin-bottom:28px}
.mxp-ce-bundle .ce-section-eyebrow{display:inline-block;font-size:12px;font-weight:600;letter-spacing:2.5px;text-transform:uppercase;color:var(--ce-terracotta);margin-bottom:10px}
.mxp-ce-bundle .ce-section-header h2{font-size:clamp(24px,3vw,34px);margin:0 0 8px}
.mxp-ce-bundle .ce-section-header p{margin:0;color:var(--ce-charcoal-soft);font-size:15px}
.mxp-ce-bundle .ce-course-list{display:flex;flex-direction:column;gap:14px}
.mxp-ce-bundle .ce-course-row{display:grid;grid-template-columns:auto 1fr auto;gap:16px;align-items:center;background:var(--ce-white);border:1px solid var(--ce-gray-line);border-radius:14px;padding:16px 18px}
.mxp-ce-bundle .ce-section.alt .ce-course-row{background:var(--ce-cream)}
.mxp-ce-bundle .ce-course-check{width:22px;height:22px;accent-color:var(--ce-teal-darkest)}
.mxp-ce-bundle .ce-course-locked{width:36px;height:36px;border-radius:50%;background:var(--ce-teal-darkest);color:var(--ce-white);display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700}
.mxp-ce-bundle .ce-course-main h3{font-family:var(--ce-sans);font-size:15px;font-weight:600;margin:0 0 4px;color:var(--ce-teal-darkest)}
.mxp-ce-bundle .ce-course-main p{margin:0;font-size:13px;color:var(--ce-charcoal-soft)}
.mxp-ce-bundle .ce-course-side{text-align:right;min-width:110px}
.mxp-ce-bundle .ce-course-hours{font-size:12px;font-weight:600;letter-spacing:.5px;text-transform:uppercase;color:var(--ce-teal-mid);margin-bottom:8px}
.mxp-ce-bundle .ce-course-link{display:inline-block;font-size:12px;font-weight:600;color:var(--ce-terracotta);text-decoration:none}
.mxp-ce-bundle .ce-course-link:hover{text-decoration:underline}
.mxp-ce-bundle .ce-empty{padding:20px;border:1px dashed var(--ce-gray-line);border-radius:12px;color:var(--ce-charcoal-soft);text-align:center}
.mxp-ce-bundle .ce-sticky-bar{position:sticky;bottom:0;background:rgba(255,255,255,.96);border-top:1px solid var(--ce-gray-line);padding:16px 32px;backdrop-filter:blur(8px);z-index:5}
.mxp-ce-bundle .ce-sticky-inner{max-width:1120px;margin:0 auto;display:flex;gap:20px;align-items:center;justify-content:space-between;flex-wrap:wrap}
.mxp-ce-bundle .ce-sticky-meta{font-size:14px;color:var(--ce-charcoal-soft)}
.mxp-ce-bundle .ce-sticky-meta strong{color:var(--ce-teal-darkest)}
.mxp-ce-bundle .ce-sticky-error{color:var(--ce-terracotta);font-size:13px;margin-top:4px}
.mxp-ce-bundle .ce-btn-cart{display:inline-block;background:var(--ce-terracotta);color:var(--ce-white)!important;border:2px solid var(--ce-terracotta);border-radius:8px;padding:14px 22px;font-size:14px;font-weight:600;text-decoration:none;cursor:pointer;font-family:var(--ce-sans)}
.mxp-ce-bundle .ce-btn-cart:hover{background:var(--ce-terracotta-deep);border-color:var(--ce-terracotta-deep)}
.mxp-ce-bundle .ce-btn-cart:disabled{opacity:.55;cursor:not-allowed}
.mxp-ce-bundle .ce-course-row.is-selected{border-color:var(--ce-teal-mid);box-shadow:var(--ce-shadow-sm)}
@media (max-width:900px){
  .mxp-ce-bundle .ce-hero-inner{grid-template-columns:1fr}
  .mxp-ce-bundle .ce-course-row{grid-template-columns:auto 1fr;gap:12px}
  .mxp-ce-bundle .ce-course-side{grid-column:2;text-align:left;min-width:0}
}
</style>

<div class="ce-breadcrumb">
    <div class="ce-breadcrumb-inner">
        <a href="{{ url('/') }}">Home</a><span>&rsaquo;</span>
        <a href="{{ route('continuingEducation') }}">Continuing Education</a><span>&rsaquo;</span>
        <a href="{{ $portalMode ? route('cePortal.courses', ['view' => 'bundles']) : $backUrl }}">
            {{ $portalMode ? 'My Bundles' : 'Packages' }}
        </a><span>&rsaquo;</span>
        {{ $bundle->name }}
    </div>
</div>

<header class="ce-hero">
    <div class="ce-hero-inner">
        <div>
            <span class="ce-hero-eyebrow">{{ $bundle->license_type_label }} Bundle</span>
            <h1>{{ $bundle->name }}</h1>
            @if ($bundle->subtitle)
                <p class="ce-hero-sub">{{ $bundle->subtitle }}</p>
            @endif
            @if ($hourSummary)
                <div class="ce-hours-pills">
                    <div class="ce-hours-pill"><strong>{{ $hourSummary['total'] }}</strong> total hours</div>
                    <div class="ce-hours-pill"><strong>{{ $hourSummary['mandatory'] }}</strong> mandatory</div>
                    <div class="ce-hours-pill"><strong>{{ $hourSummary['elective'] }}</strong> elective allowed</div>
                </div>
            @endif
        </div>
        <aside class="ce-hero-buy">
            @if ($portalMode)
                <p class="ce-hero-buy-price" style="font-size:28px;color:var(--ce-teal-darkest);">Your package</p>
                <p class="ce-hero-buy-note">Manage mandatory and elective courses for this bundle from your CE portal.</p>
                <div class="ce-hero-buy-summary">
                    <span>{{ $mandatoryCourses->count() }} mandatory course{{ $mandatoryCourses->count() === 1 ? '' : 's' }} in your package</span>
                    @if ($electiveHoursAllowed > 0)
                        <span>Elective progress: <strong>{{ rtrim(rtrim(number_format($portalEnrolledElectiveHours, 1, '.', ''), '0'), '.') }}h</strong> / {{ rtrim(rtrim(number_format($electiveHoursAllowed, 1, '.', ''), '0'), '.') }}h</span>
                        @if ($portalRemainingElectiveHours > 0)
                            <span>{{ rtrim(rtrim(number_format($portalRemainingElectiveHours, 1, '.', ''), '0'), '.') }}h still available to choose</span>
                        @endif
                    @endif
                </div>
                <a href="{{ $dashboardBackUrl }}" class="ce-btn-cart" style="width:100%;text-align:center;box-sizing:border-box;display:block;">
                    ← Back to Dashboard
                </a>
            @else
                <p class="ce-hero-buy-price">{{ $bundle->formatted_price }}</p>
                <p class="ce-hero-buy-note">{!! $bundle->price_note !!}</p>
                <div class="ce-hero-buy-summary">
                    <span>{{ $mandatoryCourses->count() }} mandatory course{{ $mandatoryCourses->count() === 1 ? '' : 's' }} included</span>
                    @if ($lockedElectiveCourses->count() > 0)
                        <span>{{ $lockedElectiveCourses->count() }} admin elective{{ $lockedElectiveCourses->count() === 1 ? '' : 's' }} included (locked)</span>
                    @endif
                    <span id="ce_bundle_hero_elective_summary">
                        Extra electives are optional now — you can finish selecting after purchase.
                    </span>
                </div>
                <button type="submit" form="ce_bundle_buy_form" class="ce-btn-cart" style="width:100%;text-align:center;box-sizing:border-box">
                    Add Bundle to Cart →
                </button>
            @endif
        </aside>
    </div>
</header>

<form method="POST" action="{{ $formAction }}" id="ce_bundle_buy_form">
    @csrf

    <section class="ce-section alt">
        <div class="ce-container">
            <div class="ce-section-header">
                <span class="ce-section-eyebrow">Included</span>
                <h2>Mandatory Courses</h2>
                <p>These courses are included with this bundle and will be added automatically.</p>
            </div>
            <div class="ce-course-list">
                @forelse ($mandatoryCourses as $course)
                    <div class="ce-course-row">
                        <div class="ce-course-locked" title="Included">✓</div>
                        <div class="ce-course-main">
                            <h3>{{ $course->title }}</h3>
                            <p>{{ $ceCatalog->summary($course, 140) }}</p>
                        </div>
                        <div class="ce-course-side">
                            <div class="ce-course-hours">{{ $ceCatalog->contactHoursCardValue($course) }} {{ $ceCatalog->contactHoursCardUnit($course) }}</div>
                            @if ($course->slug)
                                <a class="ce-course-link" href="{{ $ceCatalog->catalogUrl($course) }}" target="_blank" rel="noopener">View details</a>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="ce-empty">Mandatory courses are being updated for this bundle.</div>
                @endforelse
            </div>
        </div>
    </section>

    @if ($lockedElectiveCourses->isNotEmpty() || ($portalMode && $enrolledUserElectiveItems->isNotEmpty()))
        <section class="ce-section">
            <div class="ce-container">
                <div class="ce-section-header">
                    <span class="ce-section-eyebrow">Pre-selected</span>
                    <h2>Included Elective Courses</h2>
                    <p>
                        @if ($portalMode)
                            Admin-included and electives you have already added to this package.
                        @else
                            These electives were set by the admin for this bundle. They are included and cannot be changed.
                        @endif
                    </p>
                </div>
                <div class="ce-course-list">
                    @foreach ($lockedElectiveCourses as $course)
                        <div class="ce-course-row">
                            <div class="ce-course-locked" title="Locked">✓</div>
                            <div class="ce-course-main">
                                <h3>{{ $course->title }}</h3>
                                <p>{{ $ceCatalog->summary($course, 140) }}</p>
                            </div>
                            <div class="ce-course-side">
                                <div class="ce-course-hours">{{ $ceCatalog->contactHoursCardValue($course) }} {{ $ceCatalog->contactHoursCardUnit($course) }}</div>
                                @if ($course->slug)
                                    <a class="ce-course-link" href="{{ $ceCatalog->catalogUrl($course) }}" target="_blank" rel="noopener">View details</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    @if ($portalMode)
                        @foreach ($enrolledUserElectiveItems as $item)
                            <div class="ce-course-row">
                                <div class="ce-course-locked" title="Included">✓</div>
                                <div class="ce-course-main">
                                    <h3>{{ $item->course_title }}</h3>
                                    <p>Already in your package</p>
                                </div>
                                <div class="ce-course-side">
                                    <div class="ce-course-hours">{{ rtrim(rtrim(number_format((float) $item->contact_hours, 1, '.', ''), '0'), '.') }} Hours</div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    @endif

    <section class="ce-section {{ $lockedElectiveCourses->isNotEmpty() || ($portalMode && $enrolledUserElectiveItems->isNotEmpty()) ? 'alt' : '' }}" id="ce-bundle-electives">
        <div class="ce-container">
            <div class="ce-section-header">
                <span class="ce-section-eyebrow">Your Choice</span>
                <h2>Optional Elective Courses</h2>
                <p>
                    @if ($portalMode)
                        Select additional electives up to your remaining hours. New choices appear under My Courses.
                    @else
                        You can select electives now, or buy the bundle and finish choosing later in your CE portal.
                    @endif
                    @if ($electiveHoursAllowed > 0)
                        Target elective hours for this bundle:
                        <strong>{{ rtrim(rtrim(number_format($electiveHoursAllowed, 1, '.', ''), '0'), '.') }}h</strong>
                        @if ($lockedElectiveHours > 0)
                            ({{ rtrim(rtrim(number_format($lockedElectiveHours, 1, '.', ''), '0'), '.') }}h already included).
                        @endif
                    @endif
                </p>
            </div>
            <div class="ce-course-list" id="ce_bundle_elective_list">
                @forelse ($optionalElectiveCourses as $course)
                    @php
                        $hours = (float) ($course->contact_hours ?? 0);
                        $checked = in_array((int) $course->id, $oldElectives, true);
                    @endphp
                    <label class="ce-course-row {{ $checked ? 'is-selected' : '' }}" data-hours="{{ $hours }}">
                        <input class="ce-course-check" type="checkbox" name="elective_course_ids[]"
                            value="{{ $course->id }}" {{ $checked ? 'checked' : '' }}>
                        <div class="ce-course-main">
                            <h3>{{ $course->title }}</h3>
                            <p>{{ $ceCatalog->summary($course, 140) }}</p>
                        </div>
                        <div class="ce-course-side">
                            <div class="ce-course-hours">{{ $ceCatalog->contactHoursCardValue($course) }} {{ $ceCatalog->contactHoursCardUnit($course) }}</div>
                            @if ($course->slug)
                                <a class="ce-course-link" href="{{ $ceCatalog->catalogUrl($course) }}" target="_blank" rel="noopener" onclick="event.stopPropagation()">View details</a>
                            @endif
                        </div>
                    </label>
                @empty
                    <div class="ce-empty">
                        @if ($lockedElectiveCourses->isNotEmpty())
                            Additional elective options will appear here when available.
                        @else
                            Elective courses are being updated. You can still buy this bundle and choose electives later.
                        @endif
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <div class="ce-sticky-bar">
        <div class="ce-sticky-inner">
            <div class="ce-sticky-meta">
                <div>
                    Extra electives selected:
                    <strong id="ce_bundle_selected_hours">0</strong>h
                    @if ($electiveHoursAllowed > 0)
                        · included electives:
                        <strong>{{ rtrim(rtrim(number_format($lockedElectiveHours, 1, '.', ''), '0'), '.') }}</strong>h
                        · target:
                        <strong>{{ rtrim(rtrim(number_format($electiveHoursAllowed, 1, '.', ''), '0'), '.') }}</strong>h
                    @endif
                </div>
                <div id="ce_bundle_elective_msg" style="margin-top:4px;font-size:13px;color:#4A4A4A;">
                    Selecting all elective hours now is optional.
                </div>
            </div>
            @if ($portalMode)
                @if ($optionalElectiveCourses->isNotEmpty())
                    <button type="submit" class="ce-btn-cart" id="ce_bundle_add_cart_btn">
                        Add Selected Electives →
                    </button>
                @endif
                <a href="{{ $dashboardBackUrl }}" class="ce-btn-cart" style="background:var(--ce-teal-darkest);border-color:var(--ce-teal-darkest);margin-left:8px;">
                    Back to Dashboard
                </a>
            @else
                <button type="submit" class="ce-btn-cart" id="ce_bundle_add_cart_btn">
                    Add Bundle to Cart →
                </button>
            @endif
        </div>
    </div>
</form>
</div>

<script>
(function () {
    var allowed = {{ json_encode($electiveHoursAllowed) }};
    var lockedHours = {{ json_encode($portalMode ? $portalEnrolledElectiveHours : $lockedElectiveHours) }};
    var portalMode = {{ json_encode($portalMode) }};
    var form = document.getElementById('ce_bundle_buy_form');
    if (!form) return;

    var hoursEl = document.getElementById('ce_bundle_selected_hours');
    var msgEl = document.getElementById('ce_bundle_elective_msg');
    var checks = form.querySelectorAll('.ce-course-check');

    function formatHours(value) {
        var n = Math.round((value + Number.EPSILON) * 10) / 10;
        return String(n).replace(/\.0$/, '');
    }

    function selectedHours() {
        var total = 0;
        checks.forEach(function (input) {
            var row = input.closest('[data-hours]');
            if (input.checked && row) {
                total += parseFloat(row.getAttribute('data-hours')) || 0;
                row.classList.add('is-selected');
            } else if (row) {
                row.classList.remove('is-selected');
            }
        });
        return total;
    }

    function refresh() {
        var extra = selectedHours();
        var combined = lockedHours + extra;
        if (hoursEl) hoursEl.textContent = formatHours(extra);

        if (!msgEl) return;

        if (allowed > 0 && combined + 0.001 < allowed) {
            msgEl.textContent = portalMode
                ? formatHours(Math.max(0, allowed - combined)) + 'h elective hours still available for this bundle.'
                : 'You can add more now, or finish the remaining '
                    + formatHours(Math.max(0, allowed - combined))
                    + 'h after purchase.';
        } else if (allowed > 0) {
            msgEl.textContent = 'Elective hours target met for this bundle.';
        } else {
            msgEl.textContent = portalMode ? 'No additional elective hours required.' : 'Selecting electives now is optional.';
        }
    }

    checks.forEach(function (input) {
        input.addEventListener('change', refresh);
    });

    refresh();
})();
</script>

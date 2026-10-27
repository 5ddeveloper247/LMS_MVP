@php
    $session = $session ?? null;
    $offering = $offering ?? null;
    $formAction = $session
        ? route('certificationOfferingSessions.update', [$offering->id, $session->id])
        : route('certificationOfferingSessions.store', $offering->id);
    $startsValue = old('starts_at', $session?->starts_at?->format('Y-m-d\TH:i') ?? '');
    $endsValue = old('ends_at', $session?->ends_at?->format('Y-m-d\TH:i') ?? '');
    $selectedOptionId = (string) old('certification_offering_option_id', optional($session)->certification_offering_option_id ?? '');
    $selectedStatus = (string) old('status', optional($session)->status ?? 1);
@endphp

<form action="{{ $formAction }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Class starts') }} <span class="text-danger">*</span></label>
                <input class="primary_input_field" name="starts_at" type="datetime-local"
                    value="{{ $startsValue }}" required>
                <small class="text-muted">{{ __('When students should arrive (your local time).') }}</small>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Class ends') }}</label>
                <input class="primary_input_field" name="ends_at" type="datetime-local"
                    value="{{ $endsValue }}">
                <small class="text-muted">{{ __('Optional. Must be after the start time.') }}</small>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Title on enroll page') }}</label>
                <input class="primary_input_field" name="title" type="text"
                    value="{{ old('title', optional($session)->title ?? '') }}"
                    placeholder="{{ __('e.g. Thursday, November 5, 2026') }}">
                <small class="text-muted">{{ __('Leave blank to auto-generate from the start date.') }}</small>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Subtitle on enroll page') }}</label>
                <input class="primary_input_field" name="subtitle" type="text"
                    value="{{ old('subtitle', optional($session)->subtitle ?? '') }}"
                    placeholder="{{ __('e.g. 9:00 AM – 5:00 PM') }}">
                <small class="text-muted">{{ __('Leave blank to auto-generate from start/end times.') }}</small>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Applies to pricing option') }}</label>
                <select class="primary_input_field" name="certification_offering_option_id">
                    <option value="">{{ __('All options (Initial, Renewal, etc.)') }}</option>
                    @foreach ($offering->options as $opt)
                        <option value="{{ $opt->id }}"
                            {{ $selectedOptionId === (string) $opt->id ? 'selected' : '' }}>
                            {{ $opt->title }}
                        </option>
                    @endforeach
                </select>
                <small class="text-muted">{{ __('Use when only one price option needs this date (e.g. live class, not self-study).') }}</small>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Location') }}</label>
                <input class="primary_input_field" name="location" type="text"
                    value="{{ old('location', optional($session)->location ?? '501 S. Florida Avenue, Lakeland, FL 33801') }}">
            </div>
        </div>

        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Seat capacity') }}</label>
                <input class="primary_input_field" name="capacity" type="number" min="1"
                    value="{{ old('capacity', optional($session)->capacity ?? '') }}"
                    placeholder="{{ __('Unlimited') }}">
            </div>
        </div>
        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Sort order') }}</label>
                <input class="primary_input_field" name="sort_order" type="number" min="0"
                    value="{{ old('sort_order', optional($session)->sort_order ?? 0) }}">
                <small class="text-muted">{{ __('Lower numbers appear first when dates match.') }}</small>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Status') }}</label>
                <select class="primary_input_field" name="status">
                    <option value="1" {{ $selectedStatus === '1' ? 'selected' : '' }}>{{ __('Active') }}</option>
                    <option value="0" {{ $selectedStatus === '0' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                </select>
                <small class="text-muted">{{ __('Only active dates show on the public enroll page.') }}</small>
            </div>
        </div>
    </div>

    <div class="d-flex flex-wrap pt_20">
        <button type="submit" class="primary-btn fix-gr-bg mr-10">
            <i class="ti-check"></i> {{ __('common.Save') }}
        </button>
        <a href="{{ route('certificationOfferingSessions.index', $offering->id) }}" class="primary-btn tr-bg">{{ __('common.Cancel') }}</a>
    </div>
</form>

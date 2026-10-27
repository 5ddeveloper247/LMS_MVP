@php
    $session = $session ?? null;
    $offering = $offering ?? null;
    $formAction = $session
        ? route('certificationOfferingSessions.update', [$offering->id, $session->id])
        : route('certificationOfferingSessions.store', $offering->id);
    $startsValue = old('starts_at', $session?->starts_at?->format('Y-m-d\TH:i') ?? '');
    $endsValue = old('ends_at', $session?->ends_at?->format('Y-m-d\TH:i') ?? '');
@endphp

<form action="{{ $formAction }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Starts at') }} <span class="text-danger">*</span></label>
                <input class="primary_input_field" name="starts_at" type="datetime-local"
                    value="{{ $startsValue }}" required>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Ends at') }}</label>
                <input class="primary_input_field" name="ends_at" type="datetime-local"
                    value="{{ $endsValue }}">
            </div>
        </div>

        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Display title') }}</label>
                <input class="primary_input_field" name="title" type="text"
                    value="{{ old('title', optional($session)->title ?? '') }}"
                    placeholder="{{ __('Auto from start date if empty') }}">
            </div>
        </div>
        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Display subtitle') }}</label>
                <input class="primary_input_field" name="subtitle" type="text"
                    value="{{ old('subtitle', optional($session)->subtitle ?? '') }}"
                    placeholder="{{ __('Auto from times if empty') }}">
            </div>
        </div>

        <div class="col-xl-6">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Pricing option') }}</label>
                <select class="primary_input_field" name="certification_offering_option_id">
                    <option value="">{{ __('All options that need a session') }}</option>
                    @foreach ($offering->options as $opt)
                        <option value="{{ $opt->id }}"
                            @selected((string) old('certification_offering_option_id', optional($session)->certification_offering_option_id ?? '') === (string) $opt->id)>
                            {{ $opt->title }}
                        </option>
                    @endforeach
                </select>
                <small class="text-muted">{{ __('Leave blank unless this date applies to one option only (e.g. Live vs Self-Study).') }}</small>
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
                <label class="primary_input_label">{{ __('Capacity') }}</label>
                <input class="primary_input_field" name="capacity" type="number" min="1"
                    value="{{ old('capacity', optional($session)->capacity ?? '') }}"
                    placeholder="{{ __('Optional') }}">
            </div>
        </div>
        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Sort order') }}</label>
                <input class="primary_input_field" name="sort_order" type="number" min="0"
                    value="{{ old('sort_order', optional($session)->sort_order ?? 0) }}">
            </div>
        </div>
        <div class="col-xl-4">
            <div class="primary_input mb-25">
                <label class="primary_input_label">{{ __('Status') }}</label>
                <select class="primary_input_field" name="status">
                    <option value="1" @selected((string) old('status', optional($session)->status ?? 1) === '1')>{{ __('Active') }}</option>
                    <option value="0" @selected((string) old('status', optional($session)->status ?? 1) === '0')>{{ __('Inactive') }}</option>
                </select>
            </div>
        </div>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <button type="submit" class="primary-btn fix-gr-bg">{{ __('common.Save') }}</button>
        <a href="{{ route('certificationOfferingSessions.index', $offering->id) }}" class="primary-btn tr-bg">{{ __('common.Cancel') }}</a>
    </div>
</form>

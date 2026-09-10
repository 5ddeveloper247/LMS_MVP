@php
    $isFeatured = (int) ($query->is_featured ?? 0) === 1;
@endphp
<label class="switch_toggle">
    <input type="checkbox"
           class="instructor_featured_toggle"
           value="{{ $query->id }}"
           data-id="{{ $query->id }}"
           {{ $isFeatured ? 'checked' : '' }}>
    <i class="slider round"></i>
</label>

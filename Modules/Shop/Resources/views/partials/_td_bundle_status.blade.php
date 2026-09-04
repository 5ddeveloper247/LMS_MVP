<label class="switch_toggle" for="bundle_active_checkbox{{ $query->id }}">
    <input type="checkbox" class="bundle_status_enable_disable" id="bundle_active_checkbox{{ $query->id }}"
        value="{{ $query->id }}" {{ $query->status ? 'checked' : '' }}>
    <i class="slider round"></i>
</label>

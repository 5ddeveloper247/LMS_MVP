<div class="dropdown CRM_dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuBundle{{ $bundle->id }}"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ trans('common.Action') }}
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuBundle{{ $bundle->id }}">
        <a href="{{ route('continuing-education.bundles.edit', $bundle->id) }}" class="dropdown-item">
            {{ trans('common.Edit') }}
        </a>

        @if (permissionCheck('continuing-education.bundles.index'))
            <a onclick="confirm_modal('{{ route('continuing-education.bundles.destroy', $bundle->id) }}')"
                class="dropdown-item edit_brand">{{ trans('common.Delete') }}</a>
        @endif
    </div>
</div>

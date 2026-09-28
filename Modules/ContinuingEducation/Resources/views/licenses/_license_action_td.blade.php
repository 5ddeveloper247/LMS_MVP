<div class="dropdown CRM_dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuLicense{{ $license->id }}"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ trans('common.Action') }}
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLicense{{ $license->id }}">
        <a href="{{ route('continuing-education.licenses.edit', $license->id) }}" class="dropdown-item">
            {{ trans('common.Edit') }}
        </a>

        @if (permissionCheck('continuing-education.licenses.index'))
            <a onclick="confirm_modal('{{ route('continuing-education.licenses.destroy', $license->id) }}')"
                class="dropdown-item edit_brand">{{ trans('common.Delete') }}</a>
        @endif
    </div>
</div>

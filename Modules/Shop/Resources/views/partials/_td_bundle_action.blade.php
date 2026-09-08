<div class="dropdown CRM_dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuBundle{{ $query->id }}"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ trans('common.Action') }}
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuBundle{{ $query->id }}">
        <a class="dropdown-item" href="{{ route('bundle.edit', [$query->id]) }}">Edit</a>
        <button class="dropdown-item deleteBundle" data-id="{{ $query->id }}" type="button">
            {{ trans('common.Delete') }}
        </button>
    </div>
</div>

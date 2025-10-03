<div class="dropdown CRM_dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ trans('common.Action') }}
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
        
        <a class="dropdown-item text-center" href="{{ route('order.view', [$query->id]) }}">
            View
        </a>
        <!-- <button class="dropdown-item deleteProduct" data-id="{{ $query->id }}"
            type="button">{{ trans('common.Delete') }}
        </button> -->
    </div>
</div>

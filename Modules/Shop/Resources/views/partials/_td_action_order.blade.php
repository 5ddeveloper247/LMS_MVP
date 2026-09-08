<div class="dropdown CRM_dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ trans('common.Action') }}
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
        @if (!empty($query->is_bundle) && !empty($query->tracking) && !empty($query->shop_bundle_id))
            <a class="dropdown-item text-center" href="{{ route('order.view.bundle', [$query->tracking, $query->shop_bundle_id]) }}">
                View
            </a>
        @else
            <a class="dropdown-item text-center" href="{{ route('order.view', [$query->id]) }}">
                View
            </a>
        @endif
    </div>
</div>

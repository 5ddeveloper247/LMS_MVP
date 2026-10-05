<div class="dropdown CRM_dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2-{{ $purchase->id }}"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __('common.Select') }}
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2-{{ $purchase->id }}">
        <a class="dropdown-item" href="{{ route('continuing-education.purchases.show', $purchase->id) }}">
            {{ __('common.View') }}
        </a>
    </div>
</div>

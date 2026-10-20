@if (in_array((int) $order->payment_status, [0, 4], true))
    <span class="badge rounded-pill bg-danger" style="padding:10px 20px; color:white;">{{ $order->payment_status_label ?? 'N/A' }}</span>
@elseif (in_array((int) $order->payment_status, [1, 3], true))
    <span class="badge rounded-pill bg-success" style="padding:10px 20px; color:white;">{{ $order->payment_status_label ?? 'N/A' }}</span>
@elseif ((int) $order->payment_status === 2)
    <span class="badge rounded-pill bg-warning" style="padding:10px 20px; color:white;">{{ $order->payment_status_label ?? 'N/A' }}</span>
@else
    <span class="badge rounded-pill bg-secondary" style="padding:10px 20px; color:white;">{{ $order->payment_status_label ?? 'N/A' }}</span>
@endif

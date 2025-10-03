@if (in_array($query->payment_status, [0,4]))
    <span class="badge rounded-pill bg-danger" style="padding:10px 20px; color:white;">{{ $query->payment_status_label ?? 'N/A' }}</span>    
@elseif (in_array($query->payment_status, [1,3]))
    <span class="badge rounded-pill bg-success" style="padding:10px 20px; color:white;">{{ $query->payment_status_label ?? 'N/A' }}</span>
@elseif ($query->payment_status == 2)
    <span class="badge rounded-pill bg-warning" style="padding:10px 20px; color:white;">{{ $query->payment_status_label ?? 'N/A' }}</span>
@endif
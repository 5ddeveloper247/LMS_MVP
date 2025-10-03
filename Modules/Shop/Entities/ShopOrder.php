<?php

namespace Modules\Shop\Entities;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Modules\Payment\Entities\Checkout;

class ShopOrder extends Model
{
    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault();
    }

    public function checkout()
    {
        return $this->belongsTo(Checkout::class, 'tracking', 'tracking')->withDefault();
    }

    public function product()
    {
        return $this->belongsTo(ShopProduct::class, 'product_id');
    }

    // Accessor for status label
    public function getStatusLabelAttribute()
    {   
        if($this->status == 1){
            return 'Placed';
        }else
        if($this->status == 2){
            return 'Confirmed';
        }else
        if($this->status == 3){
            return 'Shipped';
        }else
        if($this->status == 4){
            return 'Delivered';
        }else
        if($this->status == 5){
            return 'Cancelled';
        }else{
            return '';
        }
    }

    // accessor for payment status label
    public function getPaymentStatusLabelAttribute()
    {   
        if($this->payment_status == 0){
            return 'Unpaid';
        }else
        if($this->payment_status == 1){
            return 'Paid';
        }else
        if($this->payment_status == 2){
            return 'Refund Requested';
        }else
        if($this->payment_status == 3){
            return 'Refund Confirmed';
        }else
        if($this->payment_status == 4){
            return 'Refund Rejected';
        }else{
            return '';
        }
    }
}

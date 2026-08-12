<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_name',
        'phone',
        'email',
        'address',
        'address_detail',
        'city',
        'ward',
        'voucher_code',
        'discount_amount',
        'note',
        'total_price',
        'payment_method',
        'status',
        'transaction_no',
        'bank_code',
        'paid_at',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}

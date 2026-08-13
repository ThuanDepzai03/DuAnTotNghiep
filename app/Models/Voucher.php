<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = [
        'code',
        'name',
        'discount_type',
        'discount_value',
        'max_discount',
        'min_order',
        'quantity',
        'used_quantity',
        'start_date',
        'end_date',
        'status',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

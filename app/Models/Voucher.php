<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = [
        'code',
        'discount_type',
        'discount_value',
        'min_order_value',
        'quantity',
        'start_date',
        'end_date',
        'status',
    ];
}

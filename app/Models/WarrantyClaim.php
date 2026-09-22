<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WarrantyClaim extends Model
{
    protected $fillable = ['product_imei_id', 'order_id', 'user_id', 'status', 'issue_description', 'technician_note', 'received_at', 'completed_at'];
    protected $casts = ['received_at' => 'datetime', 'completed_at' => 'datetime'];
    public function imei() { return $this->belongsTo(ProductImei::class, 'product_imei_id'); }
    public function order() { return $this->belongsTo(Order::class); }
    public function user() { return $this->belongsTo(User::class); }
}

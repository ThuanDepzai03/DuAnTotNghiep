<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImei extends Model
{
    protected $fillable = [
        'product_variant_id', 'imei', 'imei2', 'status', 'warehouse_location',
        'received_at', 'sold_at', 'warranty_expired_at',
    ];

    protected $casts = [
        'received_at' => 'datetime',
        'sold_at' => 'datetime',
        'warranty_expired_at' => 'datetime',
    ];

    public function variant() { return $this->belongsTo(ProductVariant::class, 'product_variant_id'); }
    public function orderItems() { return $this->belongsToMany(OrderItem::class, 'order_item_imeis'); }
    public function warrantyClaims() { return $this->hasMany(WarrantyClaim::class); }
}

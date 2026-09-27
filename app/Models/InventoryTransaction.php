<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryTransaction extends Model
{
    protected $fillable = ['product_variant_id', 'product_imei_id', 'order_id', 'type', 'quantity', 'note', 'created_by'];
    public function variant() { return $this->belongsTo(ProductVariant::class, 'product_variant_id'); }
    public function imei() { return $this->belongsTo(ProductImei::class, 'product_imei_id'); }
    public function order() { return $this->belongsTo(Order::class); }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturnItem extends Model
{
    protected $fillable = ['return_request_id', 'order_item_id', 'product_imei_id', 'quantity', 'condition', 'inspection_note'];
    public function request() { return $this->belongsTo(ReturnRequest::class, 'return_request_id'); }
    public function orderItem() { return $this->belongsTo(OrderItem::class); }
    public function imei() { return $this->belongsTo(ProductImei::class, 'product_imei_id'); }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturnRequest extends Model
{
    protected $fillable = ['order_id', 'user_id', 'reason_id', 'warranty_claim_id', 'status', 'reason', 'description', 'refund_amount', 'refund_method', 'admin_note'];
    protected $casts = ['refund_amount' => 'decimal:2'];
    public function order() { return $this->belongsTo(Order::class); }
    public function user() { return $this->belongsTo(User::class); }
    public function items() { return $this->hasMany(ReturnItem::class); }
    public function serviceReason() { return $this->belongsTo(ServiceReason::class, 'reason_id'); }
    public function warrantyClaim() { return $this->belongsTo(WarrantyClaim::class, 'warranty_claim_id'); }
}

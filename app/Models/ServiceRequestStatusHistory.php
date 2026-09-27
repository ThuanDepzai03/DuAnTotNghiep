<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRequestStatusHistory extends Model
{
    protected $casts = ['changed_at' => 'datetime'];

    protected $fillable = [
        'request_type',
        'request_id',
        'old_status',
        'new_status',
        'reason',
        'changed_by_type',
        'changed_by',
        'changed_by_name',
        'changed_at',
    ];

    public function scopeForRequest($query, string $type, int $requestId)
    {
        return $query->where('request_type', $type)
            ->where('request_id', $requestId)
            ->orderBy('created_at')
            ->orderBy('id');
    }
}
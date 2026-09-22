<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceReason extends Model
{
    protected $fillable = ['name', 'slug', 'service_type', 'condition_text', 'is_active', 'sort_order'];
    protected $casts = ['is_active' => 'boolean'];

    public function scopeFor($query, string $type)
    {
        return $query->where('is_active', true)->whereIn('service_type', [$type, 'both'])->orderBy('sort_order')->orderBy('name');
    }
}

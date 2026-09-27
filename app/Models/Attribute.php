<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'input_type',
        'display_type',
        'attribute_type',
        'is_active',
        'is_filterable',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_filterable' => 'boolean',
    ];

    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_attributes')
            ->withPivot('is_required');
    }

    public function productAttributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }
}

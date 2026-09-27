<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $fillable = [
        'product_id',
        'attribute_id',
        'name',
        'slug',
        'display_type',
        'attribute_type',
        'is_required',
        'show_on_product',
        'is_filterable',
        'sort_order',
    ];

    protected $casts = [
        'is_required' => 'boolean',
        'show_on_product' => 'boolean',
        'is_filterable' => 'boolean',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function values()
    {
        return $this->hasMany(ProductAttributeValue::class)->orderBy('sort_order');
    }
}

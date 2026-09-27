<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    protected $fillable = [
        'product_attribute_id',
        'attribute_value_id',
        'custom_value',
        'color_hex',
        'sort_order',
    ];

    public function productAttribute()
    {
        return $this->belongsTo(ProductAttribute::class);
    }

    public function attributeValue()
    {
        return $this->belongsTo(AttributeValue::class);
    }
}

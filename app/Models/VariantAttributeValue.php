<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariantAttributeValue extends Model
{
    protected $table = 'variant_attribute_values';

    protected $fillable = [
        'product_variant_id',
        'attribute_id',
        'attribute_value_id',
        'custom_value',
    ];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function option()
    {
        return $this->belongsTo(AttributeValue::class, 'attribute_value_id');
    }
}

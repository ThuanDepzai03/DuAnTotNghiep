<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'image_url',
        'sort_order',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Accessor - Convert image_url to full asset path
     */
    public function getImageUrlAttribute($value)
    {
        if (!$value) {
            return asset('img/product01.png');
        }

        // Nếu đã là full URL
        if (preg_match('#^https?://#', $value)) {
            return $value;
        }

        // Nếu là path tương đối, convert thành asset URL
        $cleanPath = ltrim($value, '/');
        return asset($cleanPath);
    }
}


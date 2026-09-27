<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Product;
use Illuminate\Support\Facades\DB;

$products = Product::all()->map(function($p){
    return [
        'id' => $p->id,
        'name' => $p->name,
        'sku' => $p->sku ?? null,
        'slug' => $p->slug ?? null,
        'category_id' => $p->category_id ?? null,
        'brand_id' => $p->brand_id ?? null,
        'price' => $p->price ?? null,
        'thumbnail' => $p->thumbnail ?? null,
        'image' => $p->image ?? null,
        'description' => $p->description ?? null,
        'status' => $p->status ?? null,
    ];
});

echo $products->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

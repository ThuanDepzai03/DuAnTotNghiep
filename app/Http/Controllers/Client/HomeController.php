<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $banners = Banner::where('status', 1)->get();

        $categories = Category::where('status', 1)->get();

        $brands = Brand::where('status', 1)->get();

        $query = Product::with([
            'category',
            'brand',
            'variants',
        ])->where('status', 1);

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $products = $query->latest()
            ->take(12)
            ->get();

        return view('client.home', compact(
            'banners',
            'categories',
            'brands',
            'products'
        ));
    }

   public function about()
{
    return view('client.about');
}

public function news()
{
    return view('client.news');
}

public function contact()
{
    return view('client.contact');
}
}

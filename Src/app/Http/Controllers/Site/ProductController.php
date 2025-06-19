<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;

class ProductController extends Controller
{
    public function index()
    {
        $page_title = __('pages.products');

        $products = Product::whereActive(true)->get();

        return view('site.products.index', compact('page_title', 'products'));
    }

    public function show($product_slug)
    {
        $product = Product::find_or_fail_from_slug($product_slug);

        $page_title = $product->name;

        return view('site.products.show', compact('product', 'page_title'));
    }
}

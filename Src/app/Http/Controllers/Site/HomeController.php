<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $page_title = __('pages.home');
        $sliders = Slider::all();
        $latest_products = Product::whereActive(true)->get();

        return view('site.home', compact('page_title', 'sliders', 'latest_products'));
    }
}

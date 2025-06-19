<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\Section;

class SectionController extends Controller
{
    public function show($section_slug)
    {

        $section = Section::find_or_fail_from_slug($section_slug);

        $page_title = $section->name;

        $products = Product::whereSectionId($section->id)->whereActive(true)->get();

        return view('site.products.index', compact('page_title', 'products'));
    }
}

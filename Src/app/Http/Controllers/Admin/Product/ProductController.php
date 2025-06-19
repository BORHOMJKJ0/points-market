<?php

namespace App\Http\Controllers\Admin\Product;

use _Storage;
use App\Http\Controllers\Controller;
use App\Models\Product\Image;
use App\Models\Product\Product;
use App\Models\Section;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $index_route = 'admin.products.index';

    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }

    public function index(Request $request)
    {

        $page_title = __('pages.products');
        $products = Product::all();

        return view('admin.products.index', compact('products', 'page_title'));
    }

    public function create(Request $request)
    {
        $page_title = __('labels.add');

        $breadcrumbs = [
            __('pages.products') => $this->index_route,
            $page_title => null,
        ];

        $sections = Section::all();

        return view('admin.products.add', compact('page_title', 'breadcrumbs', 'sections'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:191',
            'description' => 'required|string',
            'price' => 'required|integer|gt:0',
            'section' => 'required|exists:sections,id',
            'main_image' => 'required|image',
            'sub_images' => 'nullable|array',
            'sub_images.*' => 'image',
            'active' => 'required|boolean',

        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->section_id = $request->section;
        $product->main_image = _Storage::upload('main_image', 'products');
        $product->active = $request->active;
        $product->save();

        $this->create_images($product, $request);

        return redirect()->route($this->index_route)->withSuccess(__('messages.success.added'));
    }

    public function show(Product $product)
    {
        $page_title = $product->name;

        $breadcrumbs = [
            __('pages.products') => $this->index_route,
            $page_title => null,
        ];

        return view('admin.products.show', compact('page_title', 'breadcrumbs', 'product'));
    }

    public function edit(Product $product)
    {

        $page_title = __('labels.edit')." - {$product->name}";

        $breadcrumbs = [
            __('pages.products') => $this->index_route,
            $page_title => null,
        ];

        $sections = Section::all();

        return view('admin.products.edit', compact('product', 'page_title', 'breadcrumbs', 'sections'));
    }

    public function update(Request $request, Product $product)
    {

        $request->validate([
            'name' => 'required|string|max:191',
            'description' => 'required|string',
            'price' => 'required|integer|gt:0',
            'section' => 'required|exists:sections,id',
            'main_image' => 'nullable|image',
            'sub_images' => 'nullable|array',
            'sub_images.*' => 'image',
            'active' => 'required|boolean',
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->section_id = $request->section;
        $product->main_image = _Storage::upload('main_image', 'products', $product->main_image);
        $product->active = $request->active;
        $product->update();

        $this->create_images($product, $request);

        return redirect()->route($this->index_route)->withSuccess(__('messages.success.updated'));
    }

    public function destroy(Product $product)
    {

        $product->offers()->delete();
        $product->repositories()->delete();

        $product->images()->delete();
        $product->delete();

        return back()->withSuccess(__('messages.success.deleted'));
    }

    public function destroy_image(Image $image)
    {
        $image->delete();

        return back()->withSuccess(__('messages.success.deleted'));
    }

    private function create_images($product, $request)
    {
        foreach ($request->sub_images ?? [] as $sub_image) {
            $product->images()->create([
                'path' => _Storage::upload($sub_image, 'products'),
            ]);
        }
    }
}

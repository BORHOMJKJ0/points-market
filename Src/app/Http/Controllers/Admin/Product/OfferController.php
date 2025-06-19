<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Offer;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Offer::class, 'offer');
    }

    public function create(Product $product)
    {
        $page_title = __('labels.add');
        $breadcrumbs = [
            __('pages.products') => 'admin.products.index',
            $product->name => route('admin.products.show', ['product' => $product->id]),
            __('pages.offers') => null,
            $page_title => null,
        ];

        return view('admin.products.offers.add', compact('page_title', 'breadcrumbs', 'product'));
    }

    public function store(Request $request, Product $product)
    {

        $request->validate([
            'begin_date' => 'required|date|before:end_date',
            'end_date' => 'required|date',
            'discount_percentage' => 'required|numeric|between:0,100',
        ]);

        $offer = new Offer;
        $offer->begin_date = $request->begin_date;
        $offer->end_date = $request->end_date;
        $offer->discount_percentage = $request->discount_percentage;
        $offer->product_id = $product->id;
        $offer->save();

        return redirect()->route('admin.products.show', ['product' => $product->id])->with('success', __('messages.success.added'));
    }

    public function edit(Product $product, Offer $offer)
    {
        $page_title = __('labels.edit');

        $breadcrumbs = [
            __('pages.products') => 'admin.products.index',
            $product->name => route('admin.products.show', ['product' => $product->id]),
            __('pages.offers') => null,
            $page_title => null,
        ];

        return view('admin.products.offers.edit', compact('offer', 'page_title', 'breadcrumbs', 'product'));
    }

    public function update(Request $request, Product $product, Offer $offer)
    {
        $request->validate([
            'begin_date' => 'required|date|before:end_date',
            'end_date' => 'required|date',
            'discount_percentage' => 'required|numeric|between:0,100',
        ]);

        $offer->begin_date = $request->begin_date;
        $offer->end_date = $request->end_date;
        $offer->discount_percentage = $request->discount_percentage;
        $offer->product_id = $product->id;

        $offer->update();

        return redirect()->route('admin.products.show', ['product' => $product->id])->with('success', __('messages.success.updated'));
    }

    public function destroy(Product $product, Offer $offer)
    {
        $offer->delete();

        return redirect()->route('admin.products.show', ['product' => $product->id])->withSuccess(__('messages.success.deleted'));
    }
}

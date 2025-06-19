<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $page_title = __('pages.cart');

        return view('site.cart.index', compact('page_title'));
    }

    public function store(Product $product)
    {

        if (Cart::has_product($product->id)) {
            return response()->json([
                'message' => __('messages.error.cart.already_exists'),
                'state' => false,
            ]);
        }

        $product->cart_quantity = 1;

        Cart::push($product);

        return response()->json([
            'count' => Cart::total_quantity(),
            'html' => view('site.cart.header_item', [
                'product_in_cart' => $product,
            ])->render(),
            'state' => true,
            'message' => __('messages.success.cart.added_successfully'),

        ]);
    }

    public function update(Request $request)
    {
        $cart = Cart::get();

        $cart->map(function ($product_in_cart) use ($request) {
            $product_in_cart->cart_quantity = $request->input("quantity.$product_in_cart->id") ? $request->input("quantity.$product_in_cart->id") : 1;

            return $product_in_cart;
        });

        session([
            'cart' => $cart,
        ]);

        return back()->with('success', __('messages.success.updated'));
    }

    public function destroy($product_id)
    {
        Cart::remove($product_id);

        return back()->with('success', __('messages.success.deleted'));
    }
}

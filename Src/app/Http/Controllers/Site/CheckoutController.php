<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order\Order;
use App\Models\Order\Product as Order_product;
use Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user')->only('complete');
    }

    public function index()
    {
        $page_title = __('pages.checkout');

        return view('site.checkout.index', compact('page_title'));
    }

    public function complete(Request $request)
    {

        $request->validate([
            'coupon' => 'nullable|exists:coupons,code',
        ], [
            'coupon.*' => trans('messages.error.coupons.wrong'),
        ]);

        $coupon = Coupon::where('code', $request->coupon)->first();
        $cart_total_price = Cart::total_price();
        $order = new Order;

        if ($coupon) {
            if ($coupon->exceeded()) {
                return back()->with('error', trans('messages.error.coupons.exceeded', ['number' => $coupon->limit]));
            }

            if ($coupon->expired()) {
                return back()->with('error', trans('messages.error.coupons.expired', ['date' => $coupon->end_date->format('Y-m-d')]));
            }

            $order->coupon_discount = ($coupon->discount_type == 'number') ? $coupon->discount : (($coupon->discount / 100) * $cart_total_price);
            $order->coupon_id = $coupon->id;

            $coupon->increment('used');
        }

        $order->total_price = $cart_total_price;
        $order->user_id = user()->id;
        $order->state = 'review';
        $order->save();

        foreach (Cart::get() as $product_in_cart) {
            $order_product = new Order_product;
            $order_product->price = $product_in_cart->offer_price();
            $order_product->quantity = $product_in_cart->cart_quantity;
            $order_product->product_id = $product_in_cart->id;
            $order_product->order_id = $order->id;
            $order_product->save();
        }

        session()->forget('cart');

        return redirect()->route('site.profile.index')->with('success', __('messages.success.checkout.order_placed'));

    }
}

<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Models\Product\Repository;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Order::class, 'order');
        $this->middleware('can:changeState,order')->only('accept', 'cancel');
    }

    public function index()
    {

        $page_title = __('pages.orders');
        $orders = Order::all();

        return view('admin.orders.index', compact('page_title', 'orders'));
    }

    public function show(Order $order)
    {
        $page_title = __('labels.show_order')." $order->id";

        $breadcrumbs = [
            __('pages.orders') => 'admin.orders.index',
            $page_title => null,
        ];

        return view('admin.orders.show', compact('page_title', 'breadcrumbs', 'order'));

    }

    public function accept(Order $order)
    {
        DB::beginTransaction();

        $errors = collect();

        foreach ($order->products as $product) {
            $new_product_quantity = $product->quantity - $product->pivot->quantity;

            if ($new_product_quantity < 0) {
                $errors->push(__('messages.error.products.repositories.quantity_can_not_be_negative-3', ['product' => $product->name, 'quantity' => $product->quantity]));
            } else {
                $repository = new Repository;
                $repository->type = 'out';
                $repository->quantity = $product->pivot->quantity;
                $repository->product_id = $product->id;
                $repository->note = __('labels.this_action_is_from_order_number', ['order' => $order->id]);
                $repository->save();

                $product->quantity = $new_product_quantity;
                $product->update();
            }
        }

        if ($errors->isNotEmpty()) {
            DB::rollBack();

            return back()->with('error', $errors);
        }

        $order->state = 'accepted';
        $order->update();
        DB::commit();

        return back()->with('success', __('messages.success.orders.accepted'));

    }

    public function cancel(Order $order)
    {

        $order->state = 'cancelled';
        $order->update();

        return back()->with('success', __('messages.success.orders.cancelled'));

    }
}

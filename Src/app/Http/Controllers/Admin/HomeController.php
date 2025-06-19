<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Models\User\User;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $page_title = __('pages.home');

        $rectangular_statistics = Cache::remember('admin.home.rectangular_statistics', 60 * 5/**5 minutes */, function () {
            return (object) [
                'users_count' => User::count(),
                'total_orders_prices' => Order::onState('accepted')->sum('total_price'),
                'total_orders_coupons_discount' => Order::onState('accepted')->sum('coupon_discount'),
                'waiting_review_orders_count' => Order::onState('review')->count(),
            ];
        });

        return view('admin.home', compact('page_title', 'rectangular_statistics'));
    }
}

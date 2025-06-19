<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    private $index_route = 'admin.coupons.index';

    public function __construct()
    {
        $this->authorizeResource(Coupon::class, 'coupon');
    }

    public function index(Request $request)
    {

        $page_title = __('pages.coupons');
        $coupons = Coupon::all();

        return view('admin.coupons.index', compact('coupons', 'page_title'));
    }

    public function create()
    {
        $page_title = __('labels.add');
        $breadcrumbs = [
            __('pages.coupons') => $this->index_route,
            $page_title => null,
        ];

        return view('admin.coupons.add', compact('page_title', 'breadcrumbs'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'code' => 'required|string|max:191|unique:coupons,code',
            'begin_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:begin_date',
            'discount_type' => 'required|in:percentage,number',
            'discount' => 'required|numeric|'.(($request->discount_type == 'percentage') ? 'between:0,100' : 'gt:0'),
            'limit' => 'nullable|integer|gt:0',
        ]);

        $coupon = new Coupon;
        $coupon->code = $request->code;
        $coupon->begin_date = $request->begin_date;
        $coupon->end_date = $request->end_date;
        $coupon->discount_type = $request->discount_type;
        $coupon->discount = $request->discount;
        $coupon->limit = $request->limit;
        $coupon->save();

        return redirect()->route($this->index_route)->with('success', __('messages.success.added'));
    }

    public function edit(Coupon $coupon)
    {
        $page_title = __('labels.edit');

        $breadcrumbs = [
            __('pages.coupons') => $this->index_route,
            $page_title => null,
        ];

        return view('admin.coupons.edit', compact('coupon', 'page_title', 'breadcrumbs'));
    }

    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            'code' => "required|string|max:191|unique:coupons,code,$coupon->id",
            'begin_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:begin_date',
            'discount_type' => 'required|in:percentage,number',
            'discount' => 'required|numeric|'.(($request->discount_type == 'percentage') ? 'between:0,100' : 'gt:0'),
            'limit' => 'nullable|integer|gt:0',
        ]);

        $coupon->code = $request->code;
        $coupon->begin_date = $request->begin_date;
        $coupon->end_date = $request->end_date;
        $coupon->discount_type = $request->discount_type;
        $coupon->discount = $request->discount;
        $coupon->limit = $request->limit;

        $coupon->update();

        return redirect()->route($this->index_route)->with('success', __('messages.success.updated'));
    }

    public function destroy(Coupon $coupon)
    {

        if ($coupon->orders->isNotEmpty()) {
            return back()->with('error', __('messages.error.coupons.related_order'));
        }

        $coupon->delete();

        return redirect()->route($this->index_route)->withSuccess(__('messages.success.deleted'));
    }
}

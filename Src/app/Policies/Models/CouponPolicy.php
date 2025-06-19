<?php

namespace App\Policies\Models;

use App\Models\Admin\Admin;
use App\Models\Coupon;
use Illuminate\Auth\Access\HandlesAuthorization;

class CouponPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->has_permission('coupons.viewAny');
    }

    public function create(Admin $admin)
    {
        return $admin->has_permission('coupons.create');
    }

    public function update(Admin $admin, Coupon $coupon)
    {
        return $admin->has_permission('coupons.update');
    }

    public function delete(Admin $admin, Coupon $coupon)
    {
        return $admin->has_permission('coupons.delete');
    }
}

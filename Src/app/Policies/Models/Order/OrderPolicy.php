<?php

namespace App\Policies\Models\Order;

use App\Models\Admin\Admin;
use App\Models\Order\Order;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->has_permission('orders.viewAny');
    }

    public function view(Admin $admin, Order $order)
    {
        return $admin->has_permission('orders.view');
    }

    public function changeState(Admin $admin, Order $order)
    {
        return $admin->has_permission('orders.changeState');
    }
}

<?php

namespace App\Policies\Models\Product;

use App\Models\Admin\Admin;
use App\Models\Product\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->has_permission('products.viewAny');
    }

    public function create(Admin $admin)
    {
        return $admin->has_permission('products.create');
    }

    public function view(Admin $admin, Product $product)
    {
        return $admin->has_permission('products.view');
    }

    public function update(Admin $admin, Product $product)
    {
        return $admin->has_permission('products.update');
    }

    public function delete(Admin $admin, Product $product)
    {
        return $admin->has_permission('products.delete');
    }
}

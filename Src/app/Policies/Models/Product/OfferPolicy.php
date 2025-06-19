<?php

namespace App\Policies\Models\Product;

use App\Models\Admin\Admin;
use App\Models\Product\Offer;
use Illuminate\Auth\Access\HandlesAuthorization;

class OfferPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->has_permission('products.offers.viewAny');
    }

    public function create(Admin $admin)
    {
        return $admin->has_permission('products.offers.create');
    }

    public function update(Admin $admin, Offer $offer)
    {
        return $admin->has_permission('products.offers.update');
    }

    public function delete(Admin $admin, Offer $offer)
    {
        return $admin->has_permission('products.offers.delete');
    }
}

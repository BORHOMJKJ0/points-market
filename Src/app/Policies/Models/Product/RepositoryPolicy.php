<?php

namespace App\Policies\Models\Product;

use App\Models\Admin\Admin;
use App\Models\Product\Repository;
use Illuminate\Auth\Access\HandlesAuthorization;

class RepositoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->has_permission('products.repositories.viewAny');
    }

    public function create(Admin $admin)
    {
        return $admin->has_permission('products.repositories.create');
    }

    public function delete(Admin $admin, Repository $repository)
    {
        return $admin->has_permission('products.repositories.delete');
    }
}

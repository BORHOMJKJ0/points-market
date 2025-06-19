<?php

namespace App\Policies\Models\User;

use App\Models\Admin\Admin;
use App\Models\User\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->has_permission('users.viewAny');
    }

    public function create(Admin $admin)
    {
        return $admin->has_permission('users.create');
    }

    public function view(Admin $admin, User $user)
    {
        return $admin->has_permission('users.view');
    }

    public function update(Admin $admin, User $user)
    {
        return $admin->has_permission('users.update');
    }

    public function delete(Admin $admin, User $user)
    {
        return $admin->has_permission('users.delete');
    }
}

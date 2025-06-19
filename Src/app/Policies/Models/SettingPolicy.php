<?php

namespace App\Policies\Models;

use App\Models\Admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->has_permission('settings.viewAny');
    }

    public function update(Admin $admin)
    {
        return $admin->has_permission('settings.update');
    }
}

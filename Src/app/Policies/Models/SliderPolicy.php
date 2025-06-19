<?php

namespace App\Policies\Models;

use App\Models\Admin\Admin;
use App\Models\Slider;
use Illuminate\Auth\Access\HandlesAuthorization;

class SliderPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->has_permission('sliders.viewAny');
    }

    public function create(Admin $admin)
    {
        return $admin->has_permission('sliders.create');
    }

    public function update(Admin $admin, Slider $slider)
    {
        return $admin->has_permission('sliders.update');
    }

    public function delete(Admin $admin, Slider $slider)
    {
        return $admin->has_permission('sliders.delete');
    }
}

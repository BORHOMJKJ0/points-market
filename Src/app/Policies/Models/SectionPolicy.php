<?php

namespace App\Policies\Models;

use App\Models\Admin\Admin;
use App\Models\Section;
use Illuminate\Auth\Access\HandlesAuthorization;

class SectionPolicy
{
    use HandlesAuthorization;

    public function viewAny(Admin $admin)
    {
        return $admin->has_permission('sections.viewAny');
    }

    public function create(Admin $admin)
    {
        return $admin->has_permission('sections.create');
    }

    public function update(Admin $admin, Section $section)
    {
        return $admin->has_permission('sections.update');
    }

    public function delete(Admin $admin, Section $section)
    {
        return $admin->has_permission('sections.delete');
    }
}

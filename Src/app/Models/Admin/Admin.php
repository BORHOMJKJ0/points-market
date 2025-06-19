<?php

namespace App\Models\Admin;

use App\Models\Role\Role;
use App\Traits\HasFileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;

class Admin extends Authenticatable
{
    use HasFactory, HasFileTrait, Notifiable;

    public $files = ['avatar'];

    public function avatar()
    {
        return $this->uploads('avatar') ?? '/assets/admin/images/faces/default.png';
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'admin_roles', 'admin_id', 'role_id');
    }

    public function permissions()
    {
        return Cache::remember("admin.$this->id.permissions", 60 * 5/* five minutes*/, function () {
            return $this->roles->pluck('permissions')->flatten()->unique();
        });

    }

    public function has_permission($permission)
    {
        return $this->permissions()->contains($permission);
    }
}

<?php

namespace App\Models\Role;

use App\Models\Admin\Admin;
use App\Traits\SortTrait;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use SortTrait;

    protected $fillable = ['name', 'permissions'];

    protected $casts = [
        'permissions' => 'object',
    ];

    public function admins()
    {
        return $this->belongsToMany(Admin::class, 'admin_roles', 'role_id', 'admin_id');
    }
}

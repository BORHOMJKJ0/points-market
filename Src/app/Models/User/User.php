<?php

namespace App\Models\User;

use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

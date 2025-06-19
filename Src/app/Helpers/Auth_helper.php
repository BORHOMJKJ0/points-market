<?php

use App\Models\Admin\Admin;
use App\Models\User\User;
use Illuminate\Support\Facades\Auth;

/**
 * @return Admin
 */
function admin()
{
    return Auth::guard('admin')->user();
}

/**
 * @return User
 */
function user()
{
    return Auth::guard('user')->user();
}

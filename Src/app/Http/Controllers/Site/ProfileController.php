<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    public function index()
    {
        $page_title = user()->name;
        $orders = user()->orders;

        return view('site.profile.index', compact('page_title', 'orders'));
    }

    public function update(Request $request)
    {

        $user = user();

        $request->validate([
            'name' => 'required|string|max:191',
            'email' => "required|string|email|max:191|unique:users,email,$user->id",
            'phone' => 'required',
            'password' => 'nullable|string|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->update();

        return back()->with('success', __('messages.success.updated'));
    }
}

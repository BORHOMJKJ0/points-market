<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $index_route = 'admin.users.index';

    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function index(Request $request)
    {

        $page_title = __('pages.users');
        $users = User::all();

        return view('admin.users.index', compact('users', 'page_title'));
    }

    public function create(Request $request)
    {
        $page_title = __('labels.add');

        $breadcrumbs = [
            __('pages.users') => $this->index_route,
            $page_title => null,
        ];

        return view('admin.users.add', compact('page_title', 'breadcrumbs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'phone' => 'required|string|max:191',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',

        ]);

        $user = new User;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route($this->index_route)->with('success', __('messages.success.added'));

    }

    public function edit(User $user)
    {
        $page_title = __('labels.edit')." - {$user->name}";

        $breadcrumbs = [
            __('pages.users') => $this->index_route,
            $page_title => null,
        ];

        return view('admin.users.edit', compact('user', 'page_title', 'breadcrumbs'));
    }

    public function update(Request $request, User $user)
    {

        $request->validate([
            'name' => 'required|string|max:191',
            'phone' => 'required|string|max:191',
            'email' => "required|email|unique:users,email,$user->id",
            'password' => 'nullable|confirmed',

        ]);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->update();

        return redirect()->route($this->index_route)->withSuccess(__('messages.success.updated'));
    }

    public function destroy(User $user)
    {
        if ($user->orders->isNotEmpty()) {
            return back()->withError(__('messages.error.users.cannot_delete_orders'));
        }

        $user->delete();

        return back()->withSuccess(__('messages.success.deleted'));
    }
}

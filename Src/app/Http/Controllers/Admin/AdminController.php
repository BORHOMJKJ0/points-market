<?php

namespace App\Http\Controllers\Admin;

use _Storage;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Role\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    private $index_route = 'admin.admins.index';

    public function __construct()
    {
        $this->middleware('can:superAdmin')->except('show');
    }

    public function index()
    {
        $page_title = __('pages.admins');
        $admins = Admin::latest()->get();

        return view('admin.admins.index', compact('admins', 'page_title'));
    }

    public function create()
    {
        $page_title = __('labels.add');
        $breadcrumbs = [
            __('pages.admins') => $this->index_route,
            $page_title => null,
        ];
        $roles = Role::all();

        return view('admin.admins.add', compact('page_title', 'breadcrumbs', 'roles'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|unique:admins',
            'password' => 'required|confirmed',
            'avatar' => 'nullable|image',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,id',
            'super_admin' => 'required|boolean',

        ]);

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->avatar = _Storage::upload('avatar', 'admins');
        $admin->super = $request->super_admin;

        $admin->save();

        if ($admin->super && $request->roles) {
            session()->flash('info', __('messages.info.super_admin.no_need_permissions'));
        }

        $admin->roles()->sync($request->roles);

        return redirect()->route($this->index_route)->with('success', __('messages.success.added'));
    }

    public function edit(Admin $admin)
    {
        $admin->load('roles');

        $page_title = __('labels.edit')." - $admin->name";

        $breadcrumbs = [
            __('pages.admins') => $this->index_route,
            $page_title => null,
        ];

        $roles = Role::all();

        return view('admin.admins.edit', compact('admin', 'page_title', 'breadcrumbs', 'roles'));
    }

    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'email' => "required|email|unique:admins,email,$admin->id",
            'password' => 'nullable|confirmed',
            'avatar' => 'nullable|image',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,id',
            'super_admin' => 'required|boolean',

        ]);

        if ($admin->super && $this->only_one_super_admin() && ! $request->super_admin) {
            return back()->withError(__('messages.error.super_admin.only_one_edit'))->withInput($request->all());
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }
        $admin->avatar = _Storage::upload('avatar', 'admins', $admin->avatar);
        $admin->super = $request->super_admin;

        $admin->update();

        if ($admin->super && $request->roles) {
            session()->flash('info', __('messages.info.super_admin.no_need_permissions'));
        }

        $admin->roles()->sync($request->roles);

        return redirect()->route($this->index_route)->with('success', __('messages.success.updated'));
    }

    public function destroy(Admin $admin)
    {
        if ($admin->super && $this->only_one_super_admin()) {
            return back()->withError(__('messages.error.super_admin.only_one_delete'));
        }

        $admin->roles()->detach();
        $admin->delete_files();
        $admin->delete();

        return redirect()->route($this->index_route)->withSuccess(__('messages.success.deleted'));
    }

    private function only_one_super_admin()
    {
        $super_admins_count = Admin::whereSuper(true)->count();

        return $super_admins_count == 1;
    }
}

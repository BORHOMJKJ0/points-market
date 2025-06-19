<?php

namespace App\Http\Controllers\Admin;

use _Storage;
use App\Http\Controllers\Controller;
use App\Models\Role\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private $index_route = 'admin.roles.index';

    public function __construct()
    {
        $this->middleware('can:superAdmin');
    }

    public function index()
    {
        $page_title = __('pages.roles');
        $roles = Role::all();

        return view('admin.roles.index', compact('page_title', 'roles'));
    }

    public function create()
    {
        $page_title = __('labels.add');

        $breadcrumbs = [
            __('pages.roles') => $this->index_route,
            $page_title => null,
        ];

        $permissions = _Storage::getJsonFromLocal('admin/permissions');

        return view('admin.roles.add', compact('page_title', 'permissions', 'breadcrumbs'));
    }

    public function store(Request $request)
    {
        $permissions = _Storage::getJsonFromLocal('admin/permissions');

        $request->validate([
            'name' => 'required|string|max:191',
            'permissions' => 'required|array',
            'permissions.*' => 'in:'.$permissions->implode(','),
        ]);

        $role = new Role;
        $role->name = $request->name;
        $role->permissions = $request->permissions;
        $role->save();

        return redirect()->route($this->index_route)->withSuccess(__('messages.success.added'));
    }

    public function edit(Role $role)
    {
        $page_title = __('labels.edit')." - $role->name";

        $breadcrumbs = [
            __('pages.roles') => $this->index_route,
            $page_title => null,
        ];

        $permissions = _Storage::getJsonFromLocal('admin/permissions');

        return view('admin.roles.edit', compact('role', 'page_title', 'breadcrumbs', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $permissions = _Storage::getJsonFromLocal('admin/permissions');

        $request->validate([
            'name' => 'required|string|max:191',
            'permissions' => 'required|array',
            'permissions.*' => 'in:'.$permissions->implode(','),
        ]);

        $role->name = $request->name;
        $role->permissions = $request->permissions;
        $role->update();

        return redirect()->route($this->index_route)->with('success', __('messages.success.updated'));
    }

    public function destroy(Role $role)
    {
        $role->admins()->detach();
        $role->delete();

        return redirect()->route($this->index_route)->with('success', __('messages.success.deleted'));

    }
}

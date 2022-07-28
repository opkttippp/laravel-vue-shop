<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
//        $roles = Role::orderBy('id')->where('name', '!=', 'admin')->get();
        $roles = Role::orderBy('id')->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::OrderBy('id')->get();

        return view('admin.roles.create', compact('permissions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:25',
            'permissions' => 'required',
            'permissions.*' => 'required|integer|exists:permissions,id'
        ]);
//        $role = Role::where('name', '!=', 'admin')->findOrFail($id);
        $role = Role::find($id);
        $role->update([
            'name' => $request->name,
        ]);

        $permissions = Permission::whereIn('id', $request->permissions)->get();
        $role->syncPermissions($permissions);

        return redirect()->back()->with(
            'success',
            'Permissions updated!!'
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:25',
            'permissions' => 'required',
            'permissions.*' => 'required|integer|exists:permissions,id'
        ]);

        $newRole = Role::create([
            'name' => $request->name,
        ]);

        $permissions = Permission::whereIn('id', $request->permissions)->get();
        $newRole->syncPermissions($permissions);

        return redirect(url('admin/roles'))->with(
            'success',
            'Permissions created!!'
        );
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::OrderBy('id')->get();
        return view('admin.roles.edit', compact(['permissions', 'role',]));
    }

    public function destroy($id)
    {
        Role::find($id)->delete();
        return redirect()->back()->with(
            'success',
            'Success delete'
        );
    }
}

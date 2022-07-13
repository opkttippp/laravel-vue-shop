<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $permissions = Permission::all();
        return view('users.index', compact(['users', 'permissions']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        $roles = Role::orderBy('name')->get();
        return view('users.edit', compact(['user', 'roles']));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:25',
            'role' => 'required|integer|exists:roles,id',
        ]);

        $user->update([
            'name' => $request->name
        ]);

        $role = Role::find($request->role);
        $user->syncRoles($role->name);

        return redirect()->back()->with(
            'success',
            'User updated!!'
        );
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', ' User was deleted!!');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserAdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $permissions = Permission::all();
        return view('admin.users.index', compact(['users', 'permissions']));
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
//        $roles = Role::orderBy('name')->get();

        $roles = Role::all();
        $roles = $roles->pluck('name', 'id');
        $rolesList = $user->roles()->pluck('id');

        return view(
            'admin.users.edit',
            compact(['user', 'roles', 'rolesList'])
        );
    }

    public function update(Request $request, User $user)
    {
        if ($request->has('avatar')) {
            $file = $request->file('avatar');
            $filenameWithExt = $file->hashName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extention = $file->extension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extention;
            $path = $file->storeAs(
                'public/avatar',
                $fileNameToStore
            );
        }
        $date = $request->all();
        if (isset($path)) {
            $this->deleteImage($user->avatar);
            $date['avatar'] = $path;
        }
        $request->validate([
            'name' => 'required|max:25',
            'role' => 'required|integer|exists:roles,id',
        ]);

        $role = Role::find($request->role);
        $user->syncRoles($role->name);

        $user->update($date);

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

    public function deleteImage($images)
    {
        Storage::delete($images);
    }
}

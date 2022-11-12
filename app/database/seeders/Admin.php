<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class Admin extends Seeder
{
    public function run()
    {
//        // Reset cached roles and permissions
//        app()[PermissionRegistrar::class]->forgetCachedPermissions();
//
//        // create permissions
//        Permission::create(['name' => 'edit articles']);
//        Permission::create(['name' => 'delete articles']);
//        Permission::create(['name' => 'publish articles']);
//        Permission::create(['name' => 'unpublish articles']);
//
//        // create roles and assign existing permissions
//        $role1 = Role::create(['name' => 'writer']);
//        $role1->givePermissionTo('edit articles');
//        $role1->givePermissionTo('delete articles');
//
//        $role2 = Role::create(['name' => 'admin']);
//        $role2->givePermissionTo('publish articles');
//        $role2->givePermissionTo('unpublish articles');
//
//        $role3 = Role::create(['name' => 'Super-Admin']);
//
//        // create demo users
//        $user = User::factory()->create([
//            'name' => 'Example User',
//            'email' => 'test@example.com',
//        ]);
//        $user->assignRole($role1);
//
//        $user = User::factory()->create([
//            'name' => 'Example Admin User',
//            'email' => 'admin@example.com',
//        ]);
//        $user->assignRole($role2);
//
//        $user = User::factory()->create([
//            'name' => 'Example Super-Admin User',
//            'email' => 'superadmin@example.com',
//        ]);
//
//        $user->assignRole($role3);
        $user = User::create([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'status' => User::STATUS_ACTIVE,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $role = Role::findByName('admin');
        $user->assignRole($role);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class Users extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'Vladik',
            'email' => 'vladik@vladik.com',
            'password' => Hash::make('vladik'),
            'status' => User::STATUS_ACTIVE,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $role = Role::findByName('user');
        $user->assignRole($role);

    }
}

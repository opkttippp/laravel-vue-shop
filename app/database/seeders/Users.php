<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class Users extends Seeder
{
    public function run()
    {
        Role::create([
        'name' => 'user',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        ]);
    }
}

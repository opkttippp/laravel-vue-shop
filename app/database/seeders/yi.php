<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\YII;

class yi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        YII::create([
            'name' => 'tttttttt',
            'email' => 'ddd@d.net'
        ]);
    }
}

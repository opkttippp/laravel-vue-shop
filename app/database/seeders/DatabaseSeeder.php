<?php

namespace Database\Seeders;

use App\Http\Controllers\YIIController;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
//        DB::table('reviews')->insert([
//            'name' => 'Diana',
//            'subject'  => 'Fantastic Doll',
//            'review'  => 'It is a new views',
//            'email'  => 'ddd@ooo.net',
//        ]);
        $this->call(yi::class);
    }
}

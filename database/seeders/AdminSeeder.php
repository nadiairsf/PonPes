<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admins')->insert([
            'name' => Str::random(10),
            'phone' => '0821599879',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('qweasd123'),
        ]);
    }
}

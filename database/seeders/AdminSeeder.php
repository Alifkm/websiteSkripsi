<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin123'
        ]);

        DB::table('admins')->insert([
            'name' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => 'admin123'
        ]);

        DB::table('admins')->insert([
            'name' => 'admin2',
            'email' => 'admin2@gmail.com',
            'password' => 'admin123'
        ]);
    }
}

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
            'name' => 'owner',
            'admin_type_id' => 1,
            'email' => 'owner@gmail.com',
            'password' => bcrypt('admin123'),
            'phone' => '081293827331'
        ]);

        DB::table('admins')->insert([
            'name' => 'admin1',
            'admin_type_id' => 2,
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('admin123'),
            'phone' => '082224312321'
        ]);

        DB::table('admins')->insert([
            'name' => 'admin2',
            'admin_type_id' => 2,
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('admin123'),
            'phone' => '087893047123'
        ]);
    }
}

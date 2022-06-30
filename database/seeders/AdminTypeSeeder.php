<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admin_types')->insert([
            'admin_type_name' => 'superAdmin',
        ]);

        DB::table('admin_types')->insert([
            'admin_type_name' => 'admin',
        ]);
    }
}

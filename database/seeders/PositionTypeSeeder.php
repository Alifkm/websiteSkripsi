<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PositionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('position_types')->insert([
            'position_name' => 'penanggung jawab teknik',
        ]);

        DB::table('position_types')->insert([
            'position_name' => 'pejabat pelaksana K3LH',
        ]);

        DB::table('position_types')->insert([
            'position_name' => 'koordinator teknik 1',
        ]);

        DB::table('position_types')->insert([
            'position_name' => 'koordinator teknik 2',
        ]);

        DB::table('position_types')->insert([
            'position_name' => 'asisten K3LH',
        ]);

        DB::table('position_types')->insert([
            'position_name' => 'administrasi teknik',
        ]);

        DB::table('position_types')->insert([
            'position_name' => 'administrasi keuangan',
        ]);

        DB::table('position_types')->insert([
            'position_name' => 'petugas teknik',
        ]);
    }
}

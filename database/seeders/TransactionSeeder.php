<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('transactions')->insert([
            'transaction_name' => 'pembangunan SLTA',
            'transaction_type_id' => 1,
            'transaction_source_id' => 1,
            'date' => '2022-04-21',
            'total' => 210000000
        ]);

        DB::table('transactions')->insert([
            'transaction_name' => 'project PLN',
            'transaction_type_id' => 1,
            'transaction_source_id' => 1,
            'date' => '2022-05-01',
            'total' => 500000000
        ]);

        DB::table('transactions')->insert([
            'transaction_name' => 'biaya listrik',
            'transaction_type_id' => 2,
            'transaction_source_id' => 9,
            'date' => '2022-05-20',
            'total' => 1000000
        ]);

        DB::table('transactions')->insert([
            'transaction_name' => 'kantor',
            'transaction_type_id' => 2,
            'transaction_source_id' => 10,
            'date' => '2022-06-10',
            'total' => 5000000
        ]);
    }
}

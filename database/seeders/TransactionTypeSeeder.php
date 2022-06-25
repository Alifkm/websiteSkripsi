<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('transaction_types')->insert([
            'transaction_type_name' => 'pemasukan',
        ]);

        DB::table('transaction_types')->insert([
            'transaction_type_name' => 'pengeluaran',
        ]);
    }
}

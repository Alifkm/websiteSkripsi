<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransactionSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('transaction_sources')->insert([
            'transaction_source_name' => 'harga project',
        ]);

        DB::table('transaction_sources')->insert([
            'transaction_source_name' => 'pembelian material',
        ]);

        DB::table('transaction_sources')->insert([
            'transaction_source_name' => 'gaji karyawan',
        ]);

        DB::table('transaction_sources')->insert([
            'transaction_source_name' => 'pembayaran lainnya untuk client',
        ]);

        DB::table('transaction_sources')->insert([
            'transaction_source_name' => 'penyusutan',
        ]);

        DB::table('transaction_sources')->insert([
            'transaction_source_name' => 'transportasi',
        ]);

        DB::table('transaction_sources')->insert([
            'transaction_source_name' => 'pemeliharaan',
        ]);

        DB::table('transaction_sources')->insert([
            'transaction_source_name' => 'dokumen',
        ]);

        DB::table('transaction_sources')->insert([
            'transaction_source_name' => 'listrik dan telepon',
        ]);

        DB::table('transaction_sources')->insert([
            'transaction_source_name' => 'kantor',
        ]);

        DB::table('transaction_sources')->insert([
            'transaction_source_name' => 'pembayaran lainnya',
        ]);
    }
}

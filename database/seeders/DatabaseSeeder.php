<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\AdminTypeSeeder;
use Database\Seeders\TransactionSeeder;
use Database\Seeders\TransactionTypeSeeder;
use Database\Seeders\TransactionSourceSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(AdminTypeSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(PositionTypeSeeder::class);
        $this->call(TransactionTypeSeeder::class);
        $this->call(TransactionSourceSeeder::class);
        $this->call(TransactionSeeder::class);
    }
}

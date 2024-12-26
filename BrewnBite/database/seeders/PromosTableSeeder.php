<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('promos')->insert([
            [
                'name' => 'Waffle Wednesdays',
                'discount' => 10,
                'min_transaction' => 50000,
                'max_discount' => 10000,
                'requirement' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tea Time Treats',
                'discount' => 15,
                'min_transaction' => 60000,
                'max_discount' => 15000,
                'requirement' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Coffee Lovers Delight',
                'discount' => 20,
                'min_transaction' => 80000,
                'max_discount' => 20000,
                'requirement' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sweet Tooth Saturday',
                'discount' => 25,
                'min_transaction' => 100000,
                'max_discount' => 25000,
                'requirement' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Frosty Friday',
                'discount' => 30,
                'min_transaction' => 120000,
                'max_discount' => 30000,
                'requirement' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

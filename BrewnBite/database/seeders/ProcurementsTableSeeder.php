<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProcurementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('procurements')->insert([
            [
                'id_ingredient' => 1,
                'amount' => 10000,
                'price_per_item' => 15,
                'item_subtotal' => 150000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_ingredient' => 2,
                'amount' => 10000,
                'price_per_item' => 12,
                'item_subtotal' => 120000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_ingredient' => 3,
                'amount' => 10000,
                'price_per_item' => 80,
                'item_subtotal' => 800000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_ingredient' => 4,
                'amount' => 10000,
                'price_per_item' => 2000,
                'item_subtotal' => 20000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_ingredient' => 5,
                'amount' => 10000,
                'price_per_item' => 7,
                'item_subtotal' => 70000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_ingredient' => 6,
                'amount' => 10000,
                'price_per_item' => 40,
                'item_subtotal' => 400000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_ingredient' => 7,
                'amount' => 10000,
                'price_per_item' => 150,
                'item_subtotal' => 1500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_ingredient' => 8,
                'amount' => 10000,
                'price_per_item' => 35,
                'item_subtotal' => 350000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_ingredient' => 9,
                'amount' => 10000,
                'price_per_item' => 100,
                'item_subtotal' => 1000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_ingredient' => 10,
                'amount' => 10000,
                'price_per_item' => 50,
                'item_subtotal' => 500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_ingredient' => 11,
                'amount' => 10000,
                'price_per_item' => 5,
                'item_subtotal' => 50000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_ingredient' => 12,
                'amount' => 10000,
                'price_per_item' => 20,
                'item_subtotal' => 200000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_ingredient' => 13,
                'amount' => 10000,
                'price_per_item' => 80,
                'item_subtotal' => 800000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_ingredient' => 14,
                'amount' => 10000,
                'price_per_item' => 60,
                'item_subtotal' => 600000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_ingredient' => 15,
                'amount' => 10000,
                'price_per_item' => 25,
                'item_subtotal' => 250000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_ingredient' => 16,
                'amount' => 10000,
                'price_per_item' => 1500,
                'item_subtotal' => 15000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_ingredient' => 17,
                'amount' => 10000,
                'price_per_item' => 2000,
                'item_subtotal' => 20000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_ingredient' => 18,
                'amount' => 10000,
                'price_per_item' => 90,
                'item_subtotal' => 900000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_ingredient' => 19,
                'amount' => 10000,
                'price_per_item' => 30,
                'item_subtotal' => 300000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_ingredient' => 20,
                'amount' => 10000,
                'price_per_item' => 120,
                'item_subtotal' => 1200000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

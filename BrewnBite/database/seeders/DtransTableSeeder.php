<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DtransTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dtrans')->insert([
            [
                'id_htrans' => 1,
                'id_product' => 14,
                'amount' => 1,
                'price_per_item' => 30000,
                'item_subtotal' => 30000,
            ],
            [
                'id_htrans' => 1,
                'id_product' => 17,
                'amount' => 1,
                'price_per_item' => 20000,
                'item_subtotal' => 20000,
            ],
            [
                'id_htrans' => 2,
                'id_product' => 34,
                'amount' => 8,
                'price_per_item' => 25000,
                'item_subtotal' => 200000,
            ],
            [
                'id_htrans' => 3,
                'id_product' => 7,
                'amount' => 2,
                'price_per_item' => 25000,
                'item_subtotal' => 50000,
            ],
            [
                'id_htrans' => 4,
                'id_product' => 10,
                'amount' => 2,
                'price_per_item' => 15000,
                'item_subtotal' => 30000,
            ],
            [
                'id_htrans' => 4,
                'id_product' => 25,
                'amount' => 1,
                'price_per_item' => 40000,
                'item_subtotal' => 40000,
            ],
            [
                'id_htrans' => 4,
                'id_product' => 4,
                'amount' => 1,
                'price_per_item' => 30000,
                'item_subtotal' => 30000,
            ],
            [
                'id_htrans' => 5,
                'id_product' => 6,
                'amount' => 4,
                'price_per_item' => 25000,
                'item_subtotal' => 100000,
            ],
            [
                'id_htrans' => 5,
                'id_product' => 16,
                'amount' => 2,
                'price_per_item' => 25000,
                'item_subtotal' => 50000,
            ],
            [
                'id_htrans' => 5,
                'id_product' => 6,
                'amount' => 2,
                'price_per_item' => 25000,
                'item_subtotal' => 50000,
            ],
            [
                'id_htrans' => 6,
                'id_product' => 40,
                'amount' => 2,
                'price_per_item' => 35000,
                'item_subtotal' => 70000,
            ],
            [
                'id_htrans' => 6,
                'id_product' => 9,
                'amount' => 2,
                'price_per_item' => 15000,
                'item_subtotal' => 30000,
            ],
            [
                'id_htrans' => 7,
                'id_product' => 29,
                'amount' => 1,
                'price_per_item' => 30000,
                'item_subtotal' => 30000,
            ],
            [
                'id_htrans' => 7,
                'id_product' => 28,
                'amount' => 2,
                'price_per_item' => 35000,
                'item_subtotal' => 70000,
            ],
        ]);
    }
}

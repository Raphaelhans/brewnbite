<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HtransTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('htrans')->insert([
            [
                'id_user' => 2,
                'subtotal' => 50000,
                'id_promo' => 1,
                'grandtotal' => 50000,
                'created_at' => '2025-1-05',
                'updated_at' => '2025-1-05',
            ],
            [
                'id_user' => 3,
                'subtotal' => 200000,
                'id_promo' => 1,
                'grandtotal' => 200000,
                'created_at' => '2024-12-14',
                'updated_at' => '2024-12-14',
            ],
            [
                'id_user' => 4,
                'subtotal' => 50000,
                'id_promo' => 1,
                'grandtotal' => 50000,
                'created_at' => '2024-11-12',
                'updated_at' => '2024-11-12',
            ],
            [
                'id_user' => 5,
                'subtotal' => 100000,
                'id_promo' => 1,
                'grandtotal' => 100000,
                'created_at' => '2024-10-1',
                'updated_at' => '2024-10-1',
            ],
            [
                'id_user' => 6,
                'subtotal' => 200000,
                'id_promo' => 1,
                'grandtotal' => 200000,
                'created_at' => '2024-9-20',
                'updated_at' => '2024-9-20',
            ],
            [
                'id_user' => 7,
                'subtotal' => 100000,
                'id_promo' => 1,
                'grandtotal' => 100000,
                'created_at' => '2024-8-15',
                'updated_at' => '2024-8-15',
            ],
            [
                'id_user' => 8,
                'subtotal' => 100000,
                'id_promo' => 1,
                'grandtotal' => 100000,
                'created_at' => '2024-7-21',
                'updated_at' => '2024-7-21',
            ],
        ]);
    }
}

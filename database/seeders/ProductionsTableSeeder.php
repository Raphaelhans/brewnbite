<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records = [];
        for ($i = 1; $i <= 43; $i++) {
            $records[] = [
                'id_product' => $i,
                'amount' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('productions')->insert($records);
    }
}

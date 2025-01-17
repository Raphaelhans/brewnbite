<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('addons')->insert([
            [
                'name' => 'hot',
                'price' => 0,
                'id_category' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'cold',
                'price' => 0,
                'id_category' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'small',
                'price' => 5000,
                'id_category' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'medium',
                'price' => 10000,
                'id_category' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'large',
                'price' => 12000,
                'id_category' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

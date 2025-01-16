<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ingredients')->insert([
            [
                'name' => 'Flour',
                'stock' => 10000,
                'unit' => 'g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sugar',
                'stock' => 10000,
                'unit' => 'g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Butter',
                'stock' => 10000,
                'unit' => 'g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Eggs',
                'stock' => 10000,
                'unit' => 'pcs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Milk',
                'stock' => 10000,
                'unit' => 'ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Yeast',
                'stock' => 10000,
                'unit' => 'g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chocolate',
                'stock' => 10000,
                'unit' => 'g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vanilla Extract',
                'stock' => 10000,
                'unit' => 'ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cocoa Powder',
                'stock' => 10000,
                'unit' => 'g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Baking Powder',
                'stock' => 10000,
                'unit' => 'g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Salt',
                'stock' => 10000,
                'unit' => 'g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cream',
                'stock' => 10000,
                'unit' => 'ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Coffee Beans',
                'stock' => 10000,
                'unit' => 'g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tea Leaves',
                'stock' => 10000,
                'unit' => 'g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ice Cream Mix',
                'stock' => 10000,
                'unit' => 'g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Strawberries',
                'stock' => 10000,
                'unit' => 'pcs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Blueberries',
                'stock' => 10000,
                'unit' => 'pcs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Honey',
                'stock' => 10000,
                'unit' => 'ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Whipping Cream',
                'stock' => 10000,
                'unit' => 'ml',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gelatin',
                'stock' => 10000,
                'unit' => 'g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

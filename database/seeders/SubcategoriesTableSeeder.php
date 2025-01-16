<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subcategories')->insert([
            [
                'name' => 'Coffee',
                'description' => 'All kinds of coffee',
                'id_category' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Non-Coffee',
                'description' => 'All kinds of non-coffee',
                'id_category' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tea',
                'description' => 'All kinds of tea',
                'id_category' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pastry',
                'description' => 'All kinds of pastry',
                'id_category' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bread & Sandwich',
                'description' => 'All kinds of bread & sandwich',
                'id_category' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cake',
                'description' => 'All kinds of cake',
                'id_category' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ice Cream & Gelato',
                'description' => 'All kinds of ice cream & gelato',
                'id_category' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pudding',
                'description' => 'All kinds of pudding',
                'id_category' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Waffle and Pancake',
                'description' => 'All kinds of waffle and pancake',
                'id_category' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

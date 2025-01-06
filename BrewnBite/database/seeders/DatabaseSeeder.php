<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            CategoriesTableSeeder::class,
            SubcategoriesTableSeeder::class,
            IngredientsTableSeeder::class,
            ProductsTableSeeder::class,
            PromosTableSeeder::class,
            RecipesTableSeeder::class,
            HtransTableSeeder::class,
            DtransTableSeeder::class,
            ProductionsTableSeeder::class,
            ProcurementsTableSeeder::class,
            AddonsTableSeeder::class,
            DaddonsTableSeeder::class,
        ]);
    }
}

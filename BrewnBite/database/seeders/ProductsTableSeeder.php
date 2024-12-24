<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                // 1
                'name' => 'Espresso',
                'id_category' => 1,
                'id_subcategory' => 1,
                'price' => 15000,
                'stock' => 10,
                'description' => 'A concentrated form of coffee served in small, strong shots.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 2
                'name' => 'Cappuccino',
                'id_category' => 1,
                'id_subcategory' => 1,
                'price' => 20000,
                'stock' => 10,
                'description' => 'An espresso-based coffee drink that originated in Italy, and is traditionally prepared with steamed milk foam.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 3
                'name' => 'Latte',
                'id_category' => 1,
                'id_subcategory' => 1,
                'price' => 25000,
                'stock' => 10,
                'description' => 'A coffee drink made with espresso and steamed milk.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 4
                'name' => 'Mocha',
                'id_category' => 1,
                'id_subcategory' => 1,
                'price' => 30000,
                'stock' => 9,
                'description' => 'A chocolate-flavored variant of a caffè latte.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 5
                'name' => 'Iced Coffee',
                'id_category' => 1,
                'id_subcategory' => 1,
                'price' => 20000,
                'stock' => 10,
                'description' => 'A cold coffee drink.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 6
                'name' => 'Matcha Latte',
                'id_category' => 1,
                'id_subcategory' => 2,
                'price' => 25000,
                'stock' => 4,
                'description' => 'A Japanese-inspired green tea latte.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 7
                'name' => 'Chai Latte',
                'id_category' => 1,
                'id_subcategory' => 2,
                'price' => 25000,
                'stock' => 8,
                'description' => 'A spiced tea latte.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 8
                'name' => 'Hot Chocolate',
                'id_category' => 1,
                'id_subcategory' => 2,
                'price' => 25000,
                'stock' => 10,
                'description' => 'A heated drink consisting of shaved chocolate, melted chocolate or cocoa powder, heated milk or water, and sugar.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 9
                'name' => 'Green Tea',
                'id_category' => 1,
                'id_subcategory' => 3,
                'price' => 15000,
                'stock' => 8,
                'description' => 'A tea made from unoxidized leaves and is one of the less processed types of tea.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 10
                'name' => 'Black Tea',
                'id_category' => 1,
                'id_subcategory' => 3,
                'price' => 15000,
                'stock' => 8,
                'description' => 'A type of tea that is more oxidized than oolong, green, and white teas.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 11
                'name' => 'Oolong Tea',
                'id_category' => 1,
                'id_subcategory' => 3,
                'price' => 20000,
                'stock' => 10,
                'description' => 'A traditional Chinese tea produced through a unique process including withering under the strong sun and oxidation before curling and twisting.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 12
                'name' => 'Herbal Tea',
                'id_category' => 1,
                'id_subcategory' => 3,
                'price' => 18000,
                'stock' => 10,
                'description' => 'A beverage made from the infusion or decoction of herbs, spices, or other plant material in hot water.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 13
                'name' => 'White Tea',
                'id_category' => 1,
                'id_subcategory' => 3,
                'price' => 22000,
                'stock' => 10,
                'description' => 'A lightly oxidized tea grown and harvested primarily in China.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 14
                'name' => 'Croissant',
                'id_category' => 2,
                'id_subcategory' => 4,
                'price' => 30000,
                'stock' => 9,
                'description' => 'A buttery, flaky, and crescent-shaped pastry.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 15
                'name' => 'Danish',
                'id_category' => 2,
                'id_subcategory' => 4,
                'price' => 35000,
                'stock' => 10,
                'description' => 'A multi-layered, laminated sweet pastry.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 16
                'name' => 'Muffin',
                'id_category' => 2,
                'id_subcategory' => 4,
                'price' => 25000,
                'stock' => 8,
                'description' => 'A small, cup-shaped bread, often sweetened.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 17
                'name' => 'Bagel',
                'id_category' => 2,
                'id_subcategory' => 4,
                'price' => 20000,
                'stock' => 9,
                'description' => 'A dense, chewy, doughnut-shaped bread.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 18
                'name' => 'Scone',
                'id_category' => 2,
                'id_subcategory' => 4,
                'price' => 22000,
                'stock' => 10,
                'description' => 'A small, lightly sweetened biscuit-like cake.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 19
                'name' => 'Baguette',
                'id_category' => 2,
                'id_subcategory' => 5,
                'price' => 25000,
                'stock' => 10,
                'description' => 'A long, narrow loaf of French bread.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 20
                'name' => 'Ciabatta',
                'id_category' => 2,
                'id_subcategory' => 5,
                'price' => 27000,
                'stock' => 10,
                'description' => 'An Italian white bread made from wheat flour, water, salt, and yeast.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 21
                'name' => 'Focaccia',
                'id_category' => 2,
                'id_subcategory' => 5,
                'price' => 30000,
                'stock' => 10,
                'description' => 'A flat oven-baked Italian bread product similar in style and texture to pizza dough.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 22
                'name' => 'Panini',
                'id_category' => 2,
                'id_subcategory' => 5,
                'price' => 35000,
                'stock' => 10,
                'description' => 'A sandwich made with Italian bread, usually served warmed by grilling or toasting.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 23
                'name' => 'Club Sandwich',
                'id_category' => 2,
                'id_subcategory' => 5,
                'price' => 40000,
                'stock' => 10,
                'description' => 'A sandwich of bread, sliced cooked poultry, ham or fried bacon, lettuce, tomato, and mayonnaise.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 24
                'name' => 'Cheesecake',
                'id_category' => 3,
                'id_subcategory' => 6,
                'price' => 45000,
                'stock' => 10,
                'description' => 'A sweet dessert consisting of one or more layers.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 25
                'name' => 'Chocolate Cake',
                'id_category' => 3,
                'id_subcategory' => 6,
                'price' => 40000,
                'stock' => 9,
                'description' => 'A cake flavored with melted chocolate, cocoa powder, or both.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 26
                'name' => 'Red Velvet Cake',
                'id_category' => 3,
                'id_subcategory' => 6,
                'price' => 42000,
                'stock' => 10,
                'description' => 'A red, red-brown, crimson, or scarlet-colored chocolate layer cake.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 27
                'name' => 'Carrot Cake',
                'id_category' => 3,
                'id_subcategory' => 6,
                'price' => 38000,
                'stock' => 10,
                'description' => 'A cake that contains carrots mixed into the batter.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 28
                'name' => 'Lemon Cake',
                'id_category' => 3,
                'id_subcategory' => 6,
                'price' => 35000,
                'stock' => 8,
                'description' => 'A cake that is flavored with lemon juice, zest, or extract.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 29
                'name' => 'Vanilla Ice Cream',
                'id_category' => 3,
                'id_subcategory' => 7,
                'price' => 30000,
                'stock' => 9,
                'description' => 'A classic ice cream flavor made with vanilla beans.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 30
                'name' => 'Chocolate Gelato',
                'id_category' => 3,
                'id_subcategory' => 7,
                'price' => 35000,
                'stock' => 10,
                'description' => 'A rich and creamy Italian-style chocolate ice cream.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 31
                'name' => 'Strawberry Ice Cream',
                'id_category' => 3,
                'id_subcategory' => 7,
                'price' => 32000,
                'stock' => 10,
                'description' => 'A sweet and fruity ice cream made with fresh strawberries.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 32
                'name' => 'Pistachio Gelato',
                'id_category' => 3,
                'id_subcategory' => 7,
                'price' => 37000,
                'stock' => 10,
                'description' => 'A creamy gelato made with roasted pistachios.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 33
                'name' => 'Mint Chocolate Chip Ice Cream',
                'id_category' => 3,
                'id_subcategory' => 7,
                'price' => 33000,
                'stock' => 10,
                'description' => 'A refreshing ice cream with mint flavor and chocolate chips.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 34
                'name' => 'Chocolate Pudding',
                'id_category' => 3,
                'id_subcategory' => 8,
                'price' => 25000,
                'stock' => 2,
                'description' => 'A creamy and rich chocolate dessert.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 35
                'name' => 'Vanilla Pudding',
                'id_category' => 3,
                'id_subcategory' => 8,
                'price' => 24000,
                'stock' => 10,
                'description' => 'A smooth and creamy vanilla-flavored dessert.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 36
                'name' => 'Butterscotch Pudding',
                'id_category' => 3,
                'id_subcategory' => 8,
                'price' => 26000,
                'stock' => 10,
                'description' => 'A rich and buttery butterscotch-flavored dessert.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 37
                'name' => 'Rice Pudding',
                'id_category' => 3,
                'id_subcategory' => 8,
                'price' => 23000,
                'stock' => 10,
                'description' => 'A creamy dessert made with rice and milk.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 38
                'name' => 'Tapioca Pudding',
                'id_category' => 3,
                'id_subcategory' => 8,
                'price' => 22000,
                'stock' => 10,
                'description' => 'A sweet pudding made with tapioca pearls.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 39
                'name' => 'Classic Waffle',
                'id_category' => 3,
                'id_subcategory' => 9,
                'price' => 30000,
                'stock' => 10,
                'description' => 'A traditional waffle served with syrup and butter.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 40
                'name' => 'Belgian Waffle',
                'id_category' => 3,
                'id_subcategory' => 9,
                'price' => 35000,
                'stock' => 8,
                'description' => 'A light and crispy waffle with deep pockets, perfect for holding syrup and toppings.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 41
                'name' => 'Blueberry Pancakes',
                'id_category' => 3,
                'id_subcategory' => 9,
                'price' => 28000,
                'stock' => 10,
                'description' => 'Fluffy pancakes filled with fresh blueberries.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 42
                'name' => 'Chocolate Chip Pancakes',
                'id_category' => 3,
                'id_subcategory' => 9,
                'price' => 29000,
                'stock' => 10,
                'description' => 'Pancakes loaded with chocolate chips and served with whipped cream.',
                'weather' => '-',
                'img_url' => '-',
            ],
            [
                // 43
                'name' => 'Banana Pancakes',
                'id_category' => 3,
                'id_subcategory' => 9,
                'price' => 27000,
                'stock' => 10,
                'description' => 'Pancakes made with ripe bananas for a sweet and fruity flavor.',
                'weather' => '-',
                'img_url' => '-',
            ],
        ]);
    }
}

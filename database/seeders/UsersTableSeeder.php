<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Kedrick Adyatma',
                'email' => 'kedrick@gmail.com',
                'password' => bcrypt('kedrick'),
                'membership' => 1,
                'role' => 1,
                'credit' => 0,
                'total_spent' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Merry Feby',
                'email' => 'merry@gmail.com',
                'password' => bcrypt('merry'),
                'membership' => 2,
                'role' => 1,
                'credit' => 0,
                'total_spent' => 50000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Valentino Tan',
                'email' => 'tan@gmail.com',
                'password' => bcrypt('tino'),
                'membership' => 4,
                'role' => 1,
                'credit' => 0,
                'total_spent' => 200000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Frederico',
                'email' => 'frederico@gmail.com',
                'password' => bcrypt('rico'),
                'membership' => 2,
                'role' => 1,
                'credit' => 0,
                'total_spent' => 50000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mario Joseph',
                'email' => 'mario@gmail.com',
                'password' => bcrypt('mario'),
                'membership' => 3,
                'role' => 1,
                'credit' => 0,
                'total_spent' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jason Owen',
                'email' => 'jason@gmail.com',
                'password' => bcrypt('jason'),
                'membership' => 4,
                'role' => 1,
                'credit' => 0,
                'total_spent' => 200000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Florencia Vero',
                'email' => 'flo@gmail.com',
                'password' => bcrypt('flo'),
                'membership' => 3,
                'role' => 1,
                'credit' => 0,
                'total_spent' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hieronimus William',
                'email' => 'william@gmail.com',
                'password' => bcrypt('william'),
                'membership' => 3,
                'role' => 1,
                'credit' => 0,
                'total_spent' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Raph Hans',
                'email' => 'raphael@gmail.com',
                'password' => bcrypt('password'),
                'membership' => 0,
                'role' => 2,
                'credit' => 0,
                'total_spent' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Darren Sipen',
                'email' => 'darren@gmail.com',
                'password' => bcrypt('password'),
                'membership' => 0,
                'role' => 3,
                'credit' => 0,
                'total_spent' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
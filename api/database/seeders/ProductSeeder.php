<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {

        DB::table('categories')->insert([
            'id' => 1,
            'title' => 'Latte',
        ]);

        DB::table('categories')->insert([
            'id' => 2,
            'title' => 'Sandwich',
        ]);

        DB::table('stores')->insert([
            'id' => 1,
            'title' => 'Bar & Cafe',
        ]);

        DB::table('stores')->insert([
            'id' => 2,
            'title' => 'Restaurant',
        ]);

        DB::table('products')->insert([
            'code' => 'qwerqwer',
            'name' => 'bobot',
            'image' => 'bobot',
            'price' => 1.5,
            'qty' => 25,
            'category_id' => 1,
            'store_id' => 1,
        ]);
    }
}

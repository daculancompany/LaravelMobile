<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Insert multiple product records into the database
        foreach (range(1, 100) as $index) {
            DB::table('products')->insert([
                'name' => $faker->word,
                'barcode' => $faker->unique()->isbn13,  // Generates a random barcode
                'category_id' => rand(1, 2),  // Assuming you have 5 categories, adjust as needed
                'price' => $faker->randomFloat(2, 10, 1000),  // Random price between 10 and 1000
                'stock' => $faker->numberBetween(0, 100),  // Random stock between 0 and 100
                'description' => $faker->text,  // Random description
                'image' => $faker->imageUrl,  // Random image URL
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

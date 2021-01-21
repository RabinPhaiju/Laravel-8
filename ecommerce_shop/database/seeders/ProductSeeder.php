<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,5) as $index){
            Product::insert([
                'name' => $faker->name,
                'price' => $faker->randomNumber(2),
                'category' => $faker->title,
                'description' => $faker->realText($maxNbChars = 20, $indexSize = 2),
                'gallery' => $faker->imageUrl($width = 640, $height = 480)
            ]);
        }
    }
}

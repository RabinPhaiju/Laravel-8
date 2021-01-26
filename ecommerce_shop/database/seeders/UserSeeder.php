<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use App\Models\User;

class UserSeeder extends Seeder
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
            User::insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'photo'=>$faker->imageUrl($width = 640, $height = 480),
                'password' => Hash::make('pass')
            ]);
        }
    }
}

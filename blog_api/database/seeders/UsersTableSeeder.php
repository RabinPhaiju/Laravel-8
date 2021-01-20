<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
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
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('password')
            ]);
        }
        
    }
}

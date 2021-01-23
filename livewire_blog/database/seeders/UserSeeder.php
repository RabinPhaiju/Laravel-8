<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * 
     *  $table->id();
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,50) as $index){
        DB::table('users')->insert([
            'name'=>$faker->name,
            'email'=>$faker->email,
            'password'=>Str::random(10),
            'email_verified_at'=>'1990-3-3'
        ]);
        }
    }
}

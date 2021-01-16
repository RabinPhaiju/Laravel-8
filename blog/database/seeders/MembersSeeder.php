<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'username'=>Str::random(10),
            'pic'=>Str::random(10)."jpg",
            'user_type'=>'admin',
            'firstname'=>Str::random(10),
            'lastname'=>Str::random(10),
            'email'=>Str::random(10)."gmail.com",
            'location'=>Str::random(10),
            'lan'=>4444,
            'log'=>4555,
            'contact'=>38383838,
            'dob'=>'2000-01-01',
            'password'=>Str::random(10),
            'secret_key'=>Str::random(6),
            'verified'=>1,
            'verifiedby_id'=>1,
            'remark'=>Str::random(20),
            'status'=>1,
            'code'=>Str::random(10),

            
        ]);
    }
}

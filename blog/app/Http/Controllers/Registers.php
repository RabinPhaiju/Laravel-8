<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Member;
use App\Models\Register;

class Registers extends Controller
{
        // Multiple Database connection
        function multipleDatabaseConnection(){

            // return Register::all();
            // return Member::all();
            // return User::all();

            // return DB::connection('mysql2')->table('register')->get();
            // return DB::connection('mysql')->table('users')->get();
           
            $databaseName1 = (new Register())->getConnection()->getDatabaseName();
            $databaseName2 = (new User())->getConnection()->getDatabaseName();
            $tableName1 = (new Register())->getTable();
            $tableName2 = (new User())->getTable();

            $data = User::join($databaseName1 . '.' . $tableName1, function($join) use ($databaseName1, $tableName1, $tableName2) {
                $join->on($databaseName1 . '.' . $tableName1 . '.id', $tableName2 . '.id');
            })->get();
            return $data;
        }
    
    
}

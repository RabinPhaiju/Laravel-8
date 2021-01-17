<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class Students extends Controller
{
    function index(Student $key){
        return $key;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class DateController extends Controller
{
    function index(){
        $datetime = new \DateTime();
        $datetime1 = new \DateTime('+1 week');
        
        $date1 = $datetime->format('m-d-Y');
        $date2 = $datetime1->format('m-d-Y');

        $date3 = Carbon::now()->addDays(4)->diffForHumans();

        $date4 = Carbon::now()->subMonths(4)->diffForHumans();

        $date5 = Carbon::now()->yesterday()->diffForHumans();

        return view('date',['data'=>[$date1,$date2,$date3,$date4,$date5]]);
    }
}

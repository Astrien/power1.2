<?php

namespace App\Http\Controllers;


use App\Models\Power;
use Illuminate\Support\Facades\DB;

class PowerController extends Controller
{
    public function index()
    {
        $times = DB::table('powers')
            ->pluck('created_at');
        $powers =DB::table('powers')
            ->pluck('consumption');
        foreach ($times as $index => $time)
       {
            $datas[] =  array(strtotime($times[$index]), (float)$powers[$index]);
        }
        return view('chart',compact('datas'));
    }
    public function calendar()
    {
        $cal1= DB::table('powers')
            ->min('created_at');
         $cal=mb_substr($cal1,0,-9);
        return view('welcome',compact('cal'));
    }
}

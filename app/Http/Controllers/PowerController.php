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
            ->pluck('count');
        foreach ($times as $index => $time)
       {
            $datas[] =  array(strtotime($times[$index]), (float)$powers[$index]);
        }
        return view('chart',compact('datas'));
    }

    public function calendar()
    { 
        $min= DB::table('powers')
        ->latest()
        ->value('created_at');
        $max = DB::table('powers')
                ->oldest()
                ->value('created_at');
         $min=mb_substr($min,0,-9);
         $max=mb_substr($max,0,-9);

        return view('welcome',compact('min','max'));
    }
}

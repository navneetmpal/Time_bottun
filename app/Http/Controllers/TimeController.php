<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Time;

class TimeController extends Controller
{
    public function getTime(){
        $targetTimes = Time::pluck('date')->all();
        return view('apply')->with('targetTimes', $targetTimes);
    }

    public function store(Request $request){
        $timetoset = new Time();
        $timetoset->date = isset($request->time)?$request->time:'NULL';
        $timetoset->save();
        return redirect()->back();
    }

    public function show($id){
        $getid = $id+1;
        return "$getid";
    }
    public function phpvariable(Request $request){
        $posts = Time::get();   
  
        return view('php-variable', compact('posts'));
    }
    public function login(){
        return "testing";
    }
}

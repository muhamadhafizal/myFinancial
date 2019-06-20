<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Business;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $in = 0;
        $out = 0;
        $net = 0;
        $i = 1;
        

        $a = Business::where('userId', $id)->orderBy('date','DESC')->get();

        foreach($a as $data){
            $in = $in + $data->profit;
            $out = $out + $data->expanses;
        }

        $net = $in - $out;

        return view('/home', compact('net','in','out','a','i'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Business;

class BusinessController extends Controller
{

    public function store(Request $request)
    {
        $in = 0;
        $out = 0;
        $net = 0;
        $i = 1;
        $id = Auth::id();
        
        $title = $request->input('title');
        $amount = $request->input('amount');
        $date = $request->input('date');
        $category = $request->input('category');
        $remarks = $request->input('remarks');


        if( $category == "revenue" ){
            $revenue = $amount;
            $expanses = 0;

        } elseif( $category == "expanses" ){
            $expanses = $amount;
            $revenue = 0;

        }

        $business = new Business;
        $business->name = $title;
        $business->date = $date;
        $business->remarks = $remarks;
        $business->profit = $revenue;
        $business->expanses = $expanses;
        $business->userId = $id;

        $business->save();

        $a = Business::where('userId',$id)->orderBy('date','DESC')->get();

        foreach($a as $data){
            $in = $in + $data->profit;
            $out = $out + $data->expanses;
        }

        $net = $in - $out;
        \Session::flash('flash_message','successfully added.');
        return view('/home', compact('net','in','out','a','i'));
        
        
    }

    public function show($id)
    {
        $userId = Auth::id();
        $data = Business::all()->where('id', $id)->where( 'userId', $userId )->first();

        return view('/view', compact('data',$data));
    }

    public function edit($id)
    {
        $data = Business::all()->where('id', $id)->first();

        return view('/edit', compact('data',$data));
    }

    public function update(Request $request, $id)
    {
        $userId = Auth::id();

        $name = $request->input('name');
        $date = $request->input('date');
        $in   = $request->input('in');
        $out  = $request->input('out');
        $remarks = $request->input('remarks');

        $data = Business::find($id);
                $data->name  = $name;
                $data->date  = $date;
                $data->profit = $in;
                $data->expanses = $out;
                $data->remarks = $remarks;
                $data->save();
        
        $in = 0;
        $out = 0;
        $net = 0;
        $i = 1;
        

        $a = Business::where( 'userId', $userId )->orderBy('date','DESC')->get();

        foreach($a as $data){
            $in = $in + $data->profit;
            $out = $out + $data->expanses;
        }

        $net = $in - $out;
        \Session::flash('flash_message','successfully edit.');
        return view('/home', compact('net','in','out','a','i'));

    }

    public function destroy($id)
    {
        $data = Business::find($id); 
        $data->delete($data->id);
        \Session::flash('flash_message_delete','successfully deleted.');
        return \Redirect::back();
    }
}

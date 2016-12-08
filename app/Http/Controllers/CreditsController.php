<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use DB;
class CreditsController extends Controller
{
    public function index(Request $request)
    {
    	$data =  User::whereNotIn('id', [Auth::user()->id])->orderBy('id','DESC')->paginate(5);
    	
            return view('credits.create',compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
       
      
    }

    public function update(Request $request)
    {
       var_dump($request->all());
    }

}

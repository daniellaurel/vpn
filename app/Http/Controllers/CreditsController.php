<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Auth;
use DB;
class CreditsController extends Controller
{
    public function index(Request $request)
    {
    	    $data =  User::where('parent', Auth::user()->id)->orderBy('id','DESC')->paginate(5);
    	
            return view('credits.create',compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
       
      
    }

    public function updatecredit(Request $request)
    {
       $user = new User;
       try {
	       $upuser = $user::find($request->id);
	       $upuser->credits = $upuser->credits + $request->credits;
	       $upuser->save();
	       return 1;
       } catch (Exception $e) {
       		return 0;
       }
    }
    public function users_duration(Request $request)
    {
      if(Auth::user()->hasRole('admin')) {

            $data =  User::whereNotIn('id', [Auth::user()->id])->orderBy('id','DESC')->paginate(5);
            return view('user.duration',compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);

        }
        elseif(Auth::user()->hasRole('sub-admin')) {

            $data =  User::where('parent', Auth::user()->id)->orderBy('id','DESC')->paginate(5);
            return view('user.duration',compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
        }
        else {
            return redirect()->route('user.profile')->with('warning','You dont have permission');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('credits.edit_duration',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $current_log = User::find(Auth::user()->id);
        $user = User::find($id);

        if(($current_log->credits - $request->duration) < 0) {
            return redirect()->route('durations.index')
                        ->with('error','Not Enough Credits');
        }


        $duration = 2592000*$request->duration;
        $duration = $user->duration + $duration;
        $user->duration = $duration;
        $user->save();
        $current_log->credits =  ($current_log->credits - $request->duration);
        $current_log->save();
        return redirect()->route('durations.index')
                        ->with('success','User duration updated successfully');
    }
    
    public function transfer(Request $request,$id) {

        $data = User::find($id);
        $downline =  User::where('parent', $id)->orderBy('id','DESC')->get();
        return view('credits.transfer',compact('data','downline'));
    }

    public function transfer_credit(Request $request, $id)
    {
        /*var_dump($request->credits_to_user);
        var_dump($request->credits);*/
        $user = User::find($id);
        if(($user->credits - $request->credits) < 0) {
            return redirect()->route('credits.transfer',$id)->with('error','Not Enough Credits');
        }
        try {
            $user_update = User::find($request->credits_to_user);
            $user_update->credits = $user_update->credits + $request->credits;
            $user_update->save();
            $user->credits = ($user->credits - $request->credits);
            $user->save();
            return redirect()->route('credits.transfer',$id)->with('success','Credits Transfer Successful');
        } catch (Exception $e) {
            return redirect()->route('credits.transfer',$id)->with('error','Error');
        }
        

    }
}

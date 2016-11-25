<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;
class UserController extends Controller
{
    //
    public function index()
    {
        return view('user.index');
    }

    public function create()
    {
    	$roles = Role::lists('display_name','id');
        return view('user.add',compact('roles'));
      
    }
    public function store(Request $request)
	{
		   $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users',
            'password' => 'required|same:password_confirmation',
            'roles' => 'required'
        ]);
		$input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }
        return redirect()->route('user.create')
                        ->with('success','User created successfully');
	}
}

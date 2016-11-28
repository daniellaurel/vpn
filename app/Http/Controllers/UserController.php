<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;
use Auth;
use DB;
class UserController extends Controller
{
    //
    public function index()
    {
        return view('user.index');
    }

    public function create()
    {
    	
    	if(Auth::user()->hasRole('admin')) {
				$roles = Role::lists('display_name','id');
			} 
            elseif(Auth::user()->hasRole('sub-admin')){
                $roles = Role::whereNotIn('id', [1,2])->lists('display_name', 'id');
            }
            else {
				 return redirect()->route('user.profile')
                        ->with('warning','You dont have permission');
			}
    	

        return view('user.add',compact('roles'));
      
    }
    public function store(Request $request)
	{

		   $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|min:6|unique:users',
            'password' => 'required|min:6|same:password_confirmation',
            'roles' => 'required'
        ]);
		$input = $request->all();
        $input['parent'] = Auth::user()->id;
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }
        return redirect()->route('user.create')
                        ->with('success','User created successfully');
	}

    public function userlist(Request $request)
    {
        if(Auth::user()->hasRole('admin')) {

            $data =  User::whereNotIn('id', [Auth::user()->id])->orderBy('id','DESC')->paginate(5);
            return view('user.list',compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);

        }
        elseif(Auth::user()->hasRole('sub-admin')) {

            $data =  User::whereNotIn('id', [1,Auth::user()->id])->orderBy('id','DESC')->paginate(5);
            return view('user.list',compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
        }
        else {
            return redirect()->route('user.profile')->with('warning','You dont have permission');
        }
       
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('user.show',compact('user'));
    }

    public function edit($id)
    {
        //
        $user = User::find($id);
        $userRole = $user->roles->lists('id','id')->toArray();
        if(Auth::user()->hasRole('admin')) {
                $roles = Role::lists('display_name','id');
            } 
            elseif(Auth::user()->hasRole('sub-admin')){
                $roles = Role::whereNotIn('id', [1,2])->lists('display_name', 'id');
            }
            else {
                 return redirect()->route('user.profile')
                        ->with('warning','You dont have permission');
            }
   

        return view('user.edit',compact('user','roles','userRole'));

        
    }
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|same:password_confirmation',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = bcrypt($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('role_user')->where('user_id',$id)->delete();

        
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }

        return redirect()->route('user.list')
                        ->with('success','User updated successfully');
    }
    public function destroy($id)
    {
         User::find($id)->delete();
        return redirect()->route('user.list')
                        ->with('success','User deleted successfully');
    }

}

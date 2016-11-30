<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Voucher;
class VoucherController extends Controller
{
    public function index(Request $request)
    {
        /*$user = User::find(Auth::user()->id);
		$vouchers = $user->available_vouchers()->get();*/

		$vouchers =  Voucher::where('is_use',1)->orderBy('code','DESC')->paginate(5);
		return view('vouchers.index',compact('vouchers'))->with('i', ($request->input('page', 1) - 1) * 5);
	

    }

    public function create()
    {
    	
        return view('vouchers.create');
      
    }

    public function generateVoucherCode(Request $request) {
	    if($request->ajax()) {
	        do
	        {
	          	$voucher = str_random(10);
	            $v = Voucher::where('code', $voucher)->first();
	           	
	        }
       		while(!empty($v));

	       	$v = new Voucher();
		    $v->code = $voucher;
		    $v->is_use = false;
		    $v->is_expired = false;
		    $v->save();
	    	return $voucher;
         }
        else {
        	return redirect('/');
        }
	}

}

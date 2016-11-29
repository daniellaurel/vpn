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
}

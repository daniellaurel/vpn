<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
class VoucherController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
		$vouchers = $user->available_vouchers()->get();
		foreach ($vouchers as $key => $value) {
			
			var_dump($value->code);
		}
    }
}

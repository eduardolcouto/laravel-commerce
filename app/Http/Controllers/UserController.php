<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function createAddress()
    {
    	$user = Auth::user();
    	return view('store.address',compact('user'));
    }

    public function saveAddress(Request $request, $user_id)
    {
    	
    }
}

<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
	public function index()
	{
		$user = Auth::user();
		$delivery = $user->address->where('type','delivery')->first();
		$billing = $user->address->where('type','billing')->first();
		return view('store.account',compact('user','delivery','billing'));
	}
    public function orders()
    {
    	$orders = Auth::user()->orders;

    	return view('store.orders',compact('orders'));
    }

     public function createAddress()
    {
    	$user = Auth::user();
    	return view('store.address',compact('user'));
    }

    public function saveAddress(Request $request, \CodeCommerce\AddressUser $addressUser)
    {
    	$userId = $request->get('user_id');
    	if($request->exists('delivery'))
    	{
    		$delivery = $request->get('delivery');
    		$addressUser->create([
    			'user_id' => $userId,
    			'type' => 'delivery',
    			'city' => $delivery['city'],
    			'address' => $delivery['address'],
    			'state' => $delivery['state'],
    			'country' => $delivery['country'],
    			'zipcode' => $delivery['zipcode'],
    		]);
    	}

    	if($request->exists('billing'))
    	{
    		$billing = $request->get('billing');
    		$addressUser->create([
    			'user_id' => $userId,
    			'type' => 'billing',
    			'city' => $billing['city'],
    			'address' => $billing['address'],
    			'state' => $billing['state'],
    			'country' => $billing['country'],
    			'zipcode' => $delivery['zipcode'],
    		]);
    	}

    	return redirect()->route('account');


    }
}

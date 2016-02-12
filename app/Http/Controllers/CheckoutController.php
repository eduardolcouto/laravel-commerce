<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Cart;
use Illuminate\Support\Facades\Auth;
class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function place(\CodeCommerce\Order $orderModel, \CodeCommerce\OrderItem $ordemItem, \CodeCommerce\Category $category)
    {
    	if (!Session::has('cart')) {
    		return false;
    	}

    	$cart = Session::get('cart');
    	if ($cart->getTotal() > 0) {
    		
    		$order = $orderModel->create(['user_id'=>Auth::user()->id,'total'=>$cart->getTotal()]);
    		foreach ($cart->all() as $k => $item) {  

	    		$items = $ordemItem->create([
	    			'order_id' => $order->id,
    				'product_id' => $k,
    				'price' => $item['price'],
    				'qtd' => $item['qtd']
    			]);
    		}
            $cart->clear();

            return view('store.checkout',compact('order'));
    	}

        $categories = $category->all();

        return view('store.checkout',['cartEmpty' => true,'categories' => $categories]);
    }
}

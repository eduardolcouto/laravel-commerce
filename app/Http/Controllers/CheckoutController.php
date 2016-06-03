<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Cart;
use Illuminate\Support\Facades\Auth;

use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;
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

            event(new \CodeCommerce\Events\CheckoutEvent(Auth::user(), $order));

            return view('store.checkout',compact('order'));
    	}

        $categories = $category->all();

        return view('store.checkout',['cartEmpty' => true,'categories' => $categories]);
    }

    public function test(CheckoutService $checkoutService)
    {

        $checkout = $checkoutService->createCheckoutBuilder()
            ->addItem(new Item(1, 'Televisão LED 500', 8999.99))
            ->addItem(new Item(2, 'Video-game mega ultra blaster', 799.99))
            ->getCheckout();

        $response = $checkoutService->checkout($checkout);

        return redirect($response->getRedirectionUrl());

    }
}

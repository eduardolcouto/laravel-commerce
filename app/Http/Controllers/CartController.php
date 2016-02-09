<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Cart;
use CodeCommerce\Product;

class CartController extends Controller
{
    private $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        if(!Session::has('cart')){
            Session::set('cart',$this->cart);
        }

        return view('store.cart',['cart' => $this->getCart()]);
    }

    public function add($id)
    {
        $product = Product::find($id);

        $cart = $this->getCart();

        $cart->add($product->id, $product->name, $product->price);

        Session::set('cart',$cart);
         
        return redirect()->route('cart');

    }

    public function destroy($id)
    {
    
        $cart = $this->getCart();
        $cart->remove($id);

        Session::set('cart',$cart);
         
        return redirect()->route('cart');
       
    }

    private function getCart()
    {
        if(Session::has('cart')){
           $cart = Session::get('cart'); 
        }else{
            $cart = $this->cart;
        }

        return $cart;
    }

    
}

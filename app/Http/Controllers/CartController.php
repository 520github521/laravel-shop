<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cart;
use App\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	public function addItem ($productId){
		//$cart=Cart::where('user_id',Auth::user()->id)->first();
		$cart=DB::select('select * from carts where user_id=?',[Auth::user()->id]);
		if(!$cart){
			$cart=new Cart();
			$cart->user_id=Auth::user()->id;
			$cart->save();
		}
		$cartItem  =new CartItem();
		$cartItem->product_id=$productId;
		$cartItem->cart_id= $cart[0]->id;
		$cartItem->save();
		return redirect('/cart');
	}

	public function showCart(){
		$cart = Cart::where('user_id',Auth::user()->id)->first();

        	/*if(!$cart){
            	$cart =  new Cart();
            	$cart->user_id=Auth::user()->id;
            	$cart->save();
        	}	*/
		$items =$cart->cartItems;
		$total=0;
		foreach($items as $key=>$vo){
			$total+=$vo->product->price;
		}
		return view('cart.view',['items'=>$items,'total'=>$total]);
	}

	public function removeItem($id){
		CartItem::destroy($id);
		return redirect('/cart');
	}	
}


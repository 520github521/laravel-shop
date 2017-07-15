<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
protected $table='cart_items';

class CartItem  extends Model{
	public function cart(){
		return $this->belongTo('App\Cart','cart_id','id');
	} 
	public function product(){
		return $this->belongTo('App\Product','product_id','id');
	}
}

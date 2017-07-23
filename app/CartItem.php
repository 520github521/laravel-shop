<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class CartItem  extends Model{
	protected $table='cart_items';

	public function cart(){
		return $this->belongsTo('App\Cart','cart_id','id');
	} 
	public function product(){
		return $this->belongsTo('App\Product','product_id','id');
	}
}

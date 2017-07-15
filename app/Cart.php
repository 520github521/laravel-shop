<?php
namespace App;
use illuminate\Database\Eloquent\Model;
class Cart extends Model{
	public function user(){
		return $this->belongsTo('App\User');
	}
	public function cartItems(){
		return $this->hasMany('App\CartItem');
	}
}

<?php
namespace App;
use illuminate\Database\Eloquent\Model;
class Product extends Model{
	public function file(){
		return $this->belongsTo('App\File','file_id');	
	}
}

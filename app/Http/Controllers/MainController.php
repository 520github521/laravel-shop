<?php
namespace App\Http\Controllers;
use App\Product;
use App\Http\Controllers\Controller;

class MainController extends Controller{
	public function index(){
		$products=Product::all();
		return view('main.index',['products'=>$products]);
	}
}

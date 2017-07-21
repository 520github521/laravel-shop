<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Auth;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller{


	public function __construct(){
		$this->middleware('auth:admin');
	}

	public function index(){
	//	$admins=Auth::guard('admin')->user();
	//	return $admins->name;
		return redirect('/admin/products');
	}
}

<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Auth;

class AdminController extends Controller{
	public function __construct(){
		$this->middleware('auth:admin');
	}

	public function index(){
		$admin=Auth::guard('admin')->user();
		return $admin-<name;
	}
}

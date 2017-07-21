<?php
namespace App\Extensions;
use Illuminate\Http\Request;

trait AuthenticatesLogout{
	public function logout(Request $request){
		$str=$this->guard()->getName();
		$this->guard()->logout();
		$request->session()->forget($str);
		$request->session()->regenerate();
		if('admin'===substr($str,6,5)){
			return redirect('/admin');
		}else{
			return redirect('/');
		}	
	}		
}

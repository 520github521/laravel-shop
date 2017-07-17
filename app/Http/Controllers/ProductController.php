<?php
namespace App\Http\Controllers;

use App\Product;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller{
	public function __construct(){
		$this->middleware('auth:admin');
	}
	public function index(){
		$products=Product::all();
		return view('admin.products',['products'=>$products]);
	}
	public function destroy($id){
		Product::destroy($id);
		return redirect('/admin/products');
	}
	public function newProduct(){
		return view('admin.new');
	}
	public function add(){
		$file=Request::file('file');
		$extension=$file->getClientOriginalExtension();
		Storage::disk('local')->put($file->getFilename.'.'.$extension,File::get($file));
		$entry=new \App\File();
		$entry->mine=$file->getClientMimeType();
		$entry->original_filename = $file->getClientOriginalName();
		$entry->filename = $file->getFilename().'.'.$extension;
		$entry->created_at=time();
		$entry->save();
		
		$product=new Product();
		$product->file_id=$entry->id;
		$product->name=Request::input('name');
		$product->description =Request::input('description');
        	$product->price =Request::input('price');
	        $product->imageurl =Request::input('imageurl');
		$product->created_at=time();
		$product->save();
		
		return redirect('/admin/products');
	}

}

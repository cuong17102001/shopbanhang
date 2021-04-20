<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Product;

class HomeController extends Controller
{
    public function index(){
    	$feature = Product::limit(6)->orderBy('id','desc')->get();
        return view('front.home.home',compact('feature'));
    }
    public function product_detail($id){
    	$product = Product::find($id);
    	return view('front.product.detail',compact('product'));
    }
}

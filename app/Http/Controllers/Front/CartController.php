<?php

namespace App\Http\Controllers\Front;

use App\Admin\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add_cart($id, Request $request)
    {
        $product = Product::find($id);
        $arr = [];
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = [];
        }
        if (array_key_exists($id, $cart)) {
            echo '1';
        } else {
            echo '0';
        }

        $arr['id'] = $product->id;
        $arr['name'] = $product->name;
        $arr['price'] = $product->price;
        $arr['discount'] = $product->discount;
        $arr['image'] = $product->image;
        $arr['qty'] = $request->qty;
        $arr['userId'] = $product->userId;

        $cart[$product->id] = $arr;

        Session::put('cart', $cart);
        // Session::forget('cart');


    }
    public function cart()
    {
        return view('front.cart.cart');
    }
    public function down(Request $request)
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
            // $cart[$request->id]['qty'];
            if ($cart[$request->id]['qty'] - 1 <= 0) {
                unset($cart[$request->id]);
                Session::put('cart', $cart);
            } else {
                $cart[$request->id]['qty'] = $cart[$request->id]['qty'] - 1;
                Session::put('cart', $cart);
            }
        }
    }
    public function up(Request $request)
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
            // $cart[$request->id]['qty'];
            $cart[$request->id]['qty'] = $cart[$request->id]['qty'] + 1;
            Session::put('cart', $cart);
        }
    }
    public function delete(Request $request){
        if (Session::has('cart')) {
            $cart = Session::get('cart');
            // $cart[$request->id]['qty'];
            unset($cart[$request->id]);
            Session::put('cart', $cart);
        }
    }
    public function checkout(){
        return view('front.cart.checkout');
    }
}

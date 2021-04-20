<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartContrller extends Controller
{
    public function cart(){
        return view('front.cart.cart');
    }
}

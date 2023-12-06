<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function index(){
        return view('frontend.checkout.index', [
            'cartProducts' => Cart::content()
        ]);
    }
}

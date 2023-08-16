<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.home.home');
    }
    public function products(){
        return view('frontend.ptoduct.product');
    }
    public function productDetails(){
        return view('frontend.ptoduct.product-details');
    }
    public function cart(){
        return view('frontend.cart.cart');
    }
    public function checkout(){
        return view('frontend.checkout.checkout');
    }
    public function userLogin(){
        return view('frontend.user.user-login');
    }
    public function userRegister(){
        return view('frontend.user.user-register');
    }
    public function userFrogotPassword(){
        return view('frontend.user.user-forgot-password');
    }
    public function userAccount(){
        return view('frontend.user.user-account');
    }
}

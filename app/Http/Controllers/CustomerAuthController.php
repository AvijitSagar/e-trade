<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CustomerAuthController extends Controller
{
    public function login()
    {
        return view('frontend.customer.customer-login');
    }
    public function registration()
    {
        return view('frontend.customer.customer-register');
    }
    public function recoverPassword()
    {
        return view('frontend.customer.customer-recover-password');
    }
    public function logout()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect(route('home'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CustomerAuthController extends Controller
{
    private $customer;

    public function login(){
        return view('frontend.customer.customer-login');
    }

    public function registration(){
        return view('frontend.customer.customer-register');
    }

    public function recoverPassword(){
        return view('frontend.customer.customer-recover-password');
    }

    public function logout(){
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect(route('home'));
    }


    public function newRegistration(Request $request){

        // validation 
        $this->validate($request, [
            'name'              => 'required',
            'email'             => 'required|unique:customers,email',
            'mobile'            => 'required|unique:customers,mobile',
            'password'  => 'required'
        ], [
            'name.required'      => 'Name is required',
            'email.required'     => 'Email is required',
            'email.unique'       => 'This email is already taken please give a unique one',
            'mobile.required'    => 'Mobile number is required',
            'mobile.unique'      => 'This mobile is already taken please give a unique one',
            'password.required'  => 'Password is required'
        ]);

        
        $this->customer = Customer::newCustomer($request);
        Session::put('customer_id', $this->customer->id);
        Session::put('customer_name', $this->customer->name);
        return redirect(route('dashboard.customer'));
    }


    public function loginCheck(Request $request){

        // for login form validation
        $this->validate($request, [
            'user_id'   => 'required',
            'password'  => 'required'
        ], [
            'user_id.required'  => 'This field is required',
            'password.required' => 'Password is required'
        ]);

        // for checking if the given email is in the customer table
        $this->customer = Customer::where('email', $request->user_id)->first();
        if($this->customer){

            if(password_verify($request->password, $this->customer->password)){

                Session::put('customer_id', $this->customer->id);
                Session::put('customer_name', $this->customer->name);
                return redirect(route('dashboard.customer'));
            }

            return back()->with('message', 'Sorry... your password is incorrect');
        }

        // for checking if the given mobile no is in the customer table
        $this->customer = Customer::where('mobile', $request->customer_id)->first();
        if($this->customer){
            if(password_verify($request->mobile, $this->customer->mobile)){

                Session::put('customer_id', $this->customer->id);
                Session::put('customer_name', $this->customer->name);
                return redirect(route('dashboard.customer'));
            }

            return back()->with('message', 'Sorry... your mobile number is incorrect');
        }

        // if given email or mobile number is not in the customer table then return this message
        return back()->with('message', 'Sorry... username or email incorrect');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public function index(){
        return view('frontend.customer.index', [
            'orders' => Order::where('customer_id', Session::get('customer_id'))->orderBy('id', 'desc')->get()
        ]);
    }
}

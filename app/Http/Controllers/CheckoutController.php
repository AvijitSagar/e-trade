<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    private $order, $orderDetail, $customer;

    public function index(){
        return view('frontend.checkout.index', [
            'cartProducts' => Cart::content()
        ]);
    }

    public function newOrder(Request $request){


        $this->validate($request, [
            'name'              => 'required',
            'email'             => 'required|unique:customers,email',
            'mobile'            => 'required|unique:customers,mobile',
            'delivery_address'  => 'required'
        ], [
            'name.required'             => 'Name is required',
            'email.required'            => 'Email is required',
            'email.unique'             => 'This email is already taken please give a unique one',
            'mobile.required'           => 'Mobile number is required',
            'mobile.unique'             => 'This mobile is already taken please give a unique one',
            'delivery_address.required' => 'Delivery address is required'
        ]);


        $this->customer = new Customer();
        $this->customer->name       = $request->name;
        $this->customer->email      = $request->email;
        $this->customer->mobile     = $request->mobile;
        $this->customer->password   = bcrypt($request->mobile);
        $this->customer->save();

        $this->order = new Order();
        $this->order->customer_id       = $this->customer->id;
        $this->order->order_total       = Session::get('order_total');
        $this->order->tax_total         = Session::get('tax_total');
        $this->order->shipping_total    = Session::get('shipping_total');
        $this->order->order_date        = date('y-m-d');
        $this->order->order_timestamps  = strtotime(date('y-m-d'));
        $this->order->delivery_address  = $request->delivery_address;
        $this->order->payment_type      = $request->payment_type;
        $this->order->save();

        foreach(Cart::content() as $item){
            $this->orderDetail = new OrderDetail();
            $this->orderDetail->order_id            = $this->order->id;
            $this->orderDetail->product_id          = $item->id;
            $this->orderDetail->product_name        = $item->name;
            $this->orderDetail->product_image       = $item->options->image;
            $this->orderDetail->product_price       = $item->price;
            $this->orderDetail->product_quantity    = $item->qty;
            $this->orderDetail->save();
        }

        return redirect(route('order.complete'))->with('message', 'Your order saved successfully. Please wait we will contact with you soon..!');
    }

    public function completeOrder(){
        return view('frontend.checkout.complete-order');
    }
}

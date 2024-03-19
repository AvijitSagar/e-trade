<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    private $orders;

    public function index(){
        $this->orders = Order::orderBy('id', 'desc')->get();
        return view('backend.order.index', [
            'orders' => $this->orders
        ]);
    }

    public function detail($id){
        return view('backend.order.detail', [
            'order' =>Order::find($id)
        ]);
    }

    public function edit($id){
        return view('backend.order.edit', [
            'order' =>Order::find($id)
        ]);
    }

    public function invoice($id){
        return view('backend.order.invoice', [
            'order' =>Order::find($id)
        ]);
    }

    public function download($id){
        return view('backend.order.download', [
            'order' =>Order::find($id)
        ]);
    }
    
    public function delete($id){
        return $id;
    }
}

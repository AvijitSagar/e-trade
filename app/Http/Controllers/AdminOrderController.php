<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    private $orders, $order;

    public function index()
    {
        $this->orders = Order::orderBy('id', 'desc')->get();
        return view('backend.order.index', [
            'orders' => $this->orders
        ]);
    }

    public function detail($id)
    {
        return view('backend.order.detail', [
            'order' => Order::find($id)
        ]);
    }

    public function edit($id)
    {
        return view('backend.order.edit', [
            'order' => Order::find($id),
            'couriers' => Courier::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->order = Order::find($id);
        if ($request->order_status == 0) {

            $this->order->order_status      = $request->order_status;
            $this->order->delivery_status   = $request->order_status;
            $this->order->payment_status    = $request->order_status;
        } elseif ($request->order_status == 1) {

            $this->order->order_status      = $request->order_status;
            $this->order->delivery_status   = $request->order_status;
            $this->order->payment_status    = $request->order_status;
        } elseif ($request->order_status == 2) {

            $this->order->order_status      = $request->order_status;
            $this->order->delivery_status   = $request->order_status;
            $this->order->payment_status    = $request->order_status;
            $this->order->delivery_address  = $request->delivery_address;
            $this->order->courier_id        = $request->courier_id;
        } elseif ($request->order_status == 3) {

            $this->order->order_status      = $request->order_status;
            $this->order->delivery_status   = $request->order_status;
            $this->order->payment_status    = $request->order_status;
        }
        $this->order->save();
        return redirect(route('order.index'))->with('message', 'Order info updated successfully...!');
    }

    public function invoice($id)
    {
        return view('backend.order.invoice', [
            'order' => Order::find($id)
        ]);
    }

    // download a dom pdf package niye kaj kora hoyeche 
    public function download($id)
    {
        $pdf = Pdf::loadView('backend.order.download', [
            'order' => Order::find($id)
        ]);
        return $pdf->stream($id . '-invoice.pdf');
    }

    public function delete($id)
    {
        return $id;
    }
}

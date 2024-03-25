<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $couriers = Courier::all();
        return view('backend.courier.manage', compact('couriers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.courier.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'courier_name'      => 'required|unique:couriers,courier_name',
            'courier_email'     => 'required|email|unique:couriers,courier_email',
            'courier_mobile'    => 'required|numeric|unique:couriers,courier_mobile',
            'courier_cost'      => 'required|numeric',
            'courier_address'   => 'required'
        ]);
        Courier::create($request->all());
        return back()->with('message', 'Courier info created successfully...!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Courier $courier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($courier)
    {
        $courier = Courier::find($courier);
        // return dd($courier);
        return view('backend.courier.edit', compact('courier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $courier)
    {
        $this->validate($request, [
            'courier_name'      => 'required|unique:couriers,courier_name,' . $courier,
            'courier_email'     => 'required|email|unique:couriers,courier_email,' . $courier,
            'courier_mobile'    => 'required|numeric|unique:couriers,courier_mobile,' . $courier,
            'courier_cost'      => 'required|numeric',
            'courier_address'   => 'required'
        ],);
        Courier::updateCourier($request, $courier);
        return redirect(route('courier.index'))->with('message', 'Courier updated successfully...!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($courier)
    {
        Courier::deleteCourier($courier);
        return back()->with('message', 'Courier deleted successfully...!');
    }
}

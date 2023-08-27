<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.unit.manage', [
            'units' => Unit::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.unit.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:units,name|regex:/(^([a-zA-z0-9 -]+)(\d+)?$)/u'
        ], [
            'name.required' => 'Unit name is required',
            'name.unique' => 'Unit name must be unique',
            'name.regex' => 'This fild can contain letters numbers and "-" only'
        ]);
        Unit::newUnit($request);
        return back()->with('message', 'Unit added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.unit.edit', [
            'unit' =>Unit::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name' => 'required|unique:units,name,'.$id.'id|regex:/(^([a-zA-z0-9 -]+)(\d+)?$)/u'
        ], [
            'name.required' => 'Unit name is required',
            'name.unique' => 'Unit name must be unique',
            'name.regex' => 'This fild can contain letters numbers and "-" only'
        ]);
        Unit::updateUnit($request, $id);
        return redirect(route('unit.index'))->with('message', 'Unit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Unit::deleteUnit($id);
        return back()->with('message', 'Unit deleted successfully');
    }
}

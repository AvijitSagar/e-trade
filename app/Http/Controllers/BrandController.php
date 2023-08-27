<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.brand.manage', [
            'brands' => Brand::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.brand.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:brands,name|regex:/(^([a-zA-z0-9 -]+)(\d+)?$)/u',
            'image' => 'required|unique:brands,image'
        ], [
            'name.required' => 'Brand name is required',
            'name.unique' => 'Brand name should be unique',
            'name.regex' => 'This fild can contain letters numbers and "-" only',
            'image.required' => 'Please select a brand image',
            'image.unique' => 'This image already in use. please select another'
        ]);
        Brand::newBrand($request);
        return back()->with('message', 'Brand added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('backend.brand.edit', [
            'brand' => Brand::find($brand->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $this->validate($request, [
            'name' => 'required|unique:brands,name,'.$brand->id.',id|regex:/(^([a-zA-z0-9 -]+)(\d+)?$)/u',
            // 'image' => 'required|unique:brands,image'
        ], [
            'name.required' => 'Brand name is required',
            // 'name.unique' => 'Brand name should be unique',
            'name.regex' => 'This fild can contain letters numbers and "-" only',
            'image.required' => 'Please select a brand image',
            'image.unique' => 'This image already in use. please select another'
        ]);
        Brand::updateBrand($request, $brand->id);
        return redirect(route('brand.index'))->with('message', 'Brand updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        Brand::deleteBrand($brand->id);
        return back()->with('message', 'Brand deleted successfully');
    }
}

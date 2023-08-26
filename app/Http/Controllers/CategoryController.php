<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.category.manage', [
            'categories'=>Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->validate($request, ['category_name' => 'required'], ['category_name.required' => 'This field is required']);
        $this->validate(
            $request,
            ['name' => 'required|unique:categories,name|alpha:ascii'],
            ['name.required' => 'This field is required', 'name.unique' => 'Category name must be unique', 'name.alpha' => 'This field must only contain letters']
        );
        Category::newCategory($request);
        return back()->with('message', 'Category added successfully');
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
        return view('backend.category.edit', [
            'category'=>Category::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate(
            $request,
            ['name' => 'required|alpha:ascii'],
            ['name.required' => 'Category name cannot be empty', 'name.alpha' => 'This field must only contain letters']
        );
        Category::updateCategory($request, $id);
        return redirect(route('category.index'))->with('message', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::deleteCategory($id);
        return back()->with('message', 'Category deleted successfully');
    }
}

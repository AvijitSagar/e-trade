<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function create(){
        return view('backend.sub-category.index', [
            'categories' => Category::all()
        ]);
    }
    public function store(Request $request){
        SubCategory::newSubCategory($request);
        return back()->with('message', 'Subcategory added successfully');
    }
    public function index(){
        return view('backend.sub-category.manage', [
            'subCategories' => SubCategory::all()
        ]);
    }
    public function edit($id){
        return view('backend.sub-category.edit', [
            'subCategory' => SubCategory::find($id),
            'categories' => Category::all()
        ]);
    }
    public function update(Request $request, $id){
        SubCategory::updateSubCategory($request, $id);
        return redirect(route('sub-category.index'))->with('message', 'Subcategory updated successfully');
    }
    public function destroy($id){
        SubCategory::deleteSubCategory($id);
        return back()->with('message', 'Subcategory deleted successfully');
    }
}

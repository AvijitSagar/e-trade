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
        $this->validate($request,[
            'name' => 'required|unique:sub_categories,name|alpha:ascii',
            'category_id' => 'required'
        ], [
            'name.required' => 'This field is required',
            'name.unique' => 'Subcategory name is unique',
            'name.alpha' => 'This field only contain letters',

            'category_id.required' => 'Please select a category'
        ]);
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
        $this->validate($request,[
            // 'name' => 'required|unique:sub_categories,name,'.$request->name.',name',
            'name' => 'required|alpha:ascii',
            'category_id' => 'required'
        ], [
            'name.required' => 'This field is required',
            // 'name.unique' => 'Subcategory name is unique',
            'name.alpha' => 'This field only contain letters',

            'category_id.required' => 'Please select a category'
        ]);
        SubCategory::updateSubCategory($request, $id);
        return redirect(route('sub-category.index'))->with('message', 'Subcategory updated successfully');
    }
    public function destroy($id){
        SubCategory::deleteSubCategory($id);
        return back()->with('message', 'Subcategory deleted successfully');
    }
}

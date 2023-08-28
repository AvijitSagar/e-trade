<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\OthersImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.product.manage', [
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.product.index', [
            'categories' => Category::all(),
            'subCategories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    private $product;
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'brand_id' => 'required',
            'unit_id' => 'required',
            'name' => 'required',
            'code' => 'required|unique:products,code',
            'regular_price' => 'required|regex:/(^([0-9.]+)(\d+)?$)/u',
            'selling_price' => 'required|regex:/(^([0-9.]+)(\d+)?$)/u',
            'stock_amount' => 'required|regex:/(^([0-9.]+)(\d+)?$)/u',
            'reorder_label' => 'required|regex:/(^([0-9.]+)(\d+)?$)/u',
            'image' => 'required',
            'others_image' => 'required'
        ], [
            'category_id.required' => 'Please select a category',
            'sub_category_id.required' => 'Please select a subcategory',
            'brand_id.required' => 'Please select a brand',
            'unit_id.required' => 'Please select a unit',
            'name.required' => 'Product name is required',
            'code.required' => 'Product code is required',
            'code.unique' => 'Product code must be unique',
            'regular_price.required' => '***',
            'regular_price.regex' => 'Numbers only',
            'selling_price.required' => '***',
            'selling_price.regex' => 'Numbers only',
            'stock_amount.required' => '***',
            'stock_amount.regex' => 'Numbers only',
            'reorder_label.required' => '***',
            'reorder_label.regex' => 'Numbers only',
            'image.required' => 'Product image is required',
            'others_image.required' => 'Others image is required'
        ]);
        $this->product = Product::newProduct($request);
        OthersImage::newOtherImage($request->file('others_image'), $this->product->id);
        return back()->with('message', 'product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('backend.product.show', [
            'product' => Product::find($product->id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('backend.product.edit', [
            'product' => Product::find($product->id),
            'categories' => Category::all(),
            'subCategories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'brand_id' => 'required',
            'unit_id' => 'required',
            'name' => 'required',
            'code' => 'required|unique:products,code,'.$product->id.'id',
            'regular_price' => 'required|regex:/(^([0-9.]+)(\d+)?$)/u',
            'selling_price' => 'required|regex:/(^([0-9.]+)(\d+)?$)/u',
            'stock_amount' => 'required|regex:/(^([0-9.]+)(\d+)?$)/u',
            'reorder_label' => 'required|regex:/(^([0-9.]+)(\d+)?$)/u',
            'image' => 'required'.$product->id.'id',
        ], [
            'category_id.required' => 'Please select a category',
            'sub_category_id.required' => 'Please select a subcategory',
            'brand_id.required' => 'Please select a brand',
            'unit_id.required' => 'Please select a unit',
            'name.required' => 'Product name is required',
            'code.required' => 'Product code is required',
            'code.unique' => 'Product code must be unique',
            'regular_price.required' => '***',
            'regular_price.regex' => 'Numbers only',
            'selling_price.required' => '***',
            'selling_price.regex' => 'Numbers only',
            'stock_amount.required' => '***',
            'stock_amount.regex' => 'Numbers only',
            'reorder_label.required' => '***',
            'reorder_label.regex' => 'Numbers only',
            'image' => 'Product image is required'
        ]);
        Product::updateProduct($request, $product->id);
        if($request->file('others_image')){
            OthersImage::updateOtherImage($request, $product->id);
        }
        return redirect(route('product.index'))->with('message', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::deleteProduct($product->id);
        OthersImage::deleteOtherImage($product->id);
        return back()->with('message', 'Product deleted successfully');
    }

    public function getSubCategoryByCategory(){
        return response()->json(SubCategory::where('category_id', $_GET['id'])->get());
    }

    private $message;
    public function updateFeaturedStatus($id){
        $this->message = Product::updateFeaturedStatus($id);
        return back()->with('message', $this->message);
    }
}

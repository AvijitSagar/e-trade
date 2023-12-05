<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OthersImage;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.home.home',[
            'subCategories' => SubCategory::all(),
            'new_arraival_products' => Product::where('featured_status', 1)->get(),
            'explore_products' => Product::where('featured_status', 0)->get()
        ]);
    }
    public function products(){
        return view('frontend.product.product',[
            'products' => Product::all()
        ]);
    }
    public function productDetails($id){
        return view('frontend.product.product-details',[
            'product' => Product::find($id),
            'othersImage' =>OthersImage::where('product_id', $id)->get()
        ]);
    }
    public function categoryWiseProducts($id){
        return view('frontend.category.index',[
            'products' => Product::where('category_id', $id)->get()
        ]);
    }
    
    public function checkout(){
        return view('frontend.checkout.checkout');
    }
    public function userLogin(){
        return view('frontend.user.user-login');
    }
    public function userRegister(){
        return view('frontend.user.user-register');
    }
    public function userFrogotPassword(){
        return view('frontend.user.user-forgot-password');
    }
    public function userAccount(){
        return view('frontend.user.user-account');
    }
}

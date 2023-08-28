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
            'categories' => Category::all(),
            'subCategories' => SubCategory::all(),
            'products' => Product::all()
        ]);
    }
    public function products(){
        return view('frontend.product.product');
    }
    public function productDetails($id){
        return view('frontend.product.product-details',[
            'product' => Product::find($id),
            'categories' => Category::all(),
            'othersImage' =>OthersImage::where('product_id', $id)->get()
        ]);
    }
    public function cart(){
        return view('frontend.cart.cart');
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

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $product;
    public function index(Request $request, $id){
        $this->product = Product::find($id);
        Cart::add([
            'id' => $id, 
            'name' => $this->product->name, 
            'qty' => $request->qty, 
            'price' => $this->product->selling_price, 
            'options' => [
                'image' => $this->product->image,
                'category' => $this->product->category->name,
                'brand' => $this->product->brand->name
                ]
            ]);
            return redirect('/shopping-cart');
    }

    public function show(){
        return view('frontend.cart.cart', [
            'cartProducts' => Cart::content()
        ]);
    }

    public function update(Request $request, $id){
        Cart::update($id, $request->qty);
        return back()->with('message', 'Cart product quantity updated successfully');
    }

    public function cart(){
        return view('frontend.cart.cart',[
            'cartProducts' => Cart::content()
        ]);
    }
}

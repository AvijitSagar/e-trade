<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $product, $totalCartItem;
    public function index(Request $request, $id){
        $this->product = Product::find($id);

        if($this->product->stock_amount < $request->qty){
            return back()->with('message', 'Sorry... You can purchase maximum ' . $this->product->stock_amount . ' of this product');
        }

        foreach(Cart::content() as $item){
            if($item->id == $this->product->id){
                $this->totalCartItem = $item->qty + $request->qty;
                if($this->product->stock_amount < $this->totalCartItem){
                    return back()->with('message', 'Sorry... You can purchase maximum ' . $this->product->stock_amount . ' of this product');
                }
            }
        }

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

        $this->product = Product::find($request->id);
        if($this->product->stock_amount < $request->qty){
            return back()->with('message', 'Sorry... You can purchase maximum ' . $this->product->stock_amount . ' of this product');
        }

        Cart::update($id, $request->qty);
        return back()->with('message', 'Cart product quantity updated successfully');
    }

    public function delete($id){
        Cart::remove($id);
        return back()->with('message', 'Cart product removed successfully');
    }

    public function cart(){
        return view('frontend.cart.cart',[
            'cartProducts' => Cart::content()
        ]);
    }
}

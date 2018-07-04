<?php

namespace App\Http\Controllers;
use App\User;
use App\Product;
use App\Order;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function view_cart()
    {
        $user_id = auth()->user()->id;
        //dd($user_id);
        $carts =  Order::find($user_id)->all();

        return view('User.cart',['carts'=>$carts]);
    }
    public function add_to_cart(Request $request,$id)
    {
        //dd('llllllllll');
        $product = Product::find($id);
        $cart = new Order();
        $cart->product_id = $product->id;
        $cart->user_id = auth()->user()->id;
        $cart->quantity = $request->quantity;
       // dd($cart->units);
        $cart->price = $product->price;
        $cart->total_price =  $cart->quantity *  $cart->price;
        //dd($cart);
        $cart->save();
        //dd($cart);

        return redirect('User/cart');

    }
}

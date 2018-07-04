<?php

namespace App\Http\Controllers;

use App\User;
use App\Cart;
use App\OrderDetails;

use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{
    public function orderNow(){
        $user_id = auth()->user()->id;
        $orders = Cart::find($user_id)->all();
        //dd($orders);
        $final_price = 0;
        foreach ($orders as $order){
           $final_price =  $order->total_price + $final_price ;
        }


        $order_details = new OrderDetails;
        //$order_details->order_id = ;
        $order_details->order_status = "pending";
        $order_details->total_price_of_orders = $final_price;


    }
}

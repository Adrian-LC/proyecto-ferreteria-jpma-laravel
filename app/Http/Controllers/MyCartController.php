<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Order_number;
use App\Order;

class MyCartController extends Controller
{
    public function index()
    {
      $orderNumber = Order_number::where('user_id', '=', Auth::user()->id)->where('state_on', '=', 1)->get();
      if(isset($orderNumber[0])){
        $orders = Order::where('order_number_id', '=', $orderNumber[0]->id)->get();
        if($orders->count() > 0){
          $totalPrice = 0;
          foreach($orders as $order){
            if($order->quantity > 0){
              $totalPrice += ($order->quantity * $order->product->price_p);
            }
          }
          return view('myCart')->with('orders', $orders)->with('totalPrice', $totalPrice);
        }
      }
      return redirect('/');
    }
}

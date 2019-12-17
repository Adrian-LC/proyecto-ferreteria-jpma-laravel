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

    public function confirm()
    {
      //busco el número de orden
      $orderNumber = Order_number::where('user_id', '=', Auth::user()->id)->where('state_on', '=', 1)->get();
      //busco los productos del carrito que se desea comprar
      $orders = Order::where('order_number_id', '=', $orderNumber[0]->id)->get();

      /*mercado pago*/
      //agrega credenciales
      \MercadoPago\SDK::setAccessToken(env('MP_TEST_ACCESS_TOKEN'));
      //crea un objeto de preferencia
      $preference = new \MercadoPago\Preference();
      //crea uno o varios ítems en la preferencia
      $products = [];
      foreach ($orders as $order) {
        $item = new \MercadoPago\Item();
        $item->currency_id = "ARS";
        $item->title = $order->product->name_p;
        $item->description = $order->product->detail;
        $item->unit_price = $order->product->price_p;
        $item->picture_url = $order->product->poster;
        $item->quantity = $order->quantity;
        $products[] = $item;
      }
      $preference->items = $products;
      $preference->back_urls = [
        'success' => url('mp/success'),
        //'failure' => url('mp/failure'),
        //'pending' => url('mp/pending')
      ];
      $preference->save();
      return redirect($preference->init_point);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Order_number;
use App\Order;
use App\Sale;

class MercadoPagoController extends Controller
{
    public function success(Request $request)
    {
      //busco el número de orden
      $orderNumber = Order_number::where('user_id', '=', Auth::user()->id)->where('state_on', '=', 1)->get();
      //busco los productos de la compra para calcular el precio total
      $orders = Order::where('order_number_id', '=', $orderNumber[0]->id)->get();
      $totalPrice = 0;
      foreach($orders as $order){
        if($order->quantity > 0){
          $totalPrice += ($order->quantity * $order->product->price_p);
        }
      }
      //creo un registro de la venta
      $addSale = new Sale();
      $addSale->total_price = $totalPrice;
      $addSale->order_number_id_s = $orderNumber[0]->id;
      $addSale->user_id_s = Auth::user()->id;
      $addSale->payment_method_id = 1;
      $addSale->save();
      //busco la venta registrada, para agregar su id a los pedidos y tener registrado a que venta pertenecen cada uno
      $sale = Sale::where('order_number_id_s', '=', $orderNumber[0]->id)->get();
      //registro el id de la venta en cada uno de los pedidos de productos
      foreach ($orders as $order) {
        $order->price_o = $order->product->price_p;
        $order->sale_id = $sale[0]->id;
        $order->update();
      }
      //desactivo el número de orden de referencia para los pedidos porque la compra ya se realizo
      $orderNumber[0]->state_on = 0;
      $orderNumber[0]->update();

      //retornar a la página de inicio
      return redirect('/');
    }
}

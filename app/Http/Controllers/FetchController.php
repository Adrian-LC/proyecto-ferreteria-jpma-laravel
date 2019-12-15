<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Product_category;
use App\Order_number;
use App\Order;

class FetchController extends Controller
{
    public function indexPC()
    {
      $productCategories = Product_category::all();
      return response()->json($productCategories);
    }

    public function indexCC()
    {
      if(Auth::user()){
        //veo si hay un número de orden
        $orderNumber = Order_number::where('user_id', '=', Auth::user()->id)->where('state_on', '=', 1)->get();
        if(isset($orderNumber[0])){
          //retornar la cantidad de productos que hay en el pedido
          $orders = Order::where('order_number_id', '=', $orderNumber[0]->id)->get();
          return response()->json($orders->count());
        }
      }
      return response()->json(false);
    }

    public function saveATC(Request $request)
    {
      if(Auth::user()){
        //veo si hay un número de orden
        $orderNumber = Order_number::where('user_id', '=', Auth::user()->id)->where('state_on', '=', 1)->get();
        if(!isset($orderNumber[0])){
        //si no existe ningún número de orden, o en el caso de que si, pero este no esté activo, se genera uno
          $addOrderNumber = new Order_number();
          $addOrderNumber->state_on = 1;
          $addOrderNumber->user_id = Auth::user()->id;
          $addOrderNumber->save();
          //busco el número de orden generado
          $orderNumber = Order_number::where('user_id', '=', Auth::user()->id)->where('state_on', '=', 1)->get();
          //genero un pedido del producto que se quiere añadir al carrito
          $addOrder = new Order();
          $addOrder->quantity = 0;
          $addOrder->user_id_o = Auth::user()->id; //puede ser que esta columna no sea necesaria
          $addOrder->order_number_id = $orderNumber[0]->id;
          $addOrder->product_id = $request->input('product_id');
          $addOrder->save();
        }else{
          //busco el pedido del producto
          $order = Order::where('order_number_id', '=', $orderNumber[0]->id)->where('product_id', '=', $request->input('product_id'))->get();
          if(!isset($order[0])){
          //si no existe el pedido del producto, genero un pedido del producto que se quiere añadir al carrito
            $addOrder = new Order();
            $addOrder->quantity = 0;
            $addOrder->user_id_o = Auth::user()->id; //puede ser que esta columna no sea necesaria
            $addOrder->order_number_id = $orderNumber[0]->id;
            $addOrder->product_id = $request->input('product_id');
            $addOrder->save();
          }
        }
        //retornar la cantidad de productos que hay en el pedido
        $orders = Order::where('order_number_id', '=', $orderNumber[0]->id)->get();
        return response()->json($orders->count());
      }else{
        return response()->json(false);
      }
    }
}

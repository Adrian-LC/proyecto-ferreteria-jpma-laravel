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
          $addOrder->quantity = 1;
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
            $addOrder->quantity = 1;
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

    public function updateCQ(Request $request)
    {
      //busco el número de orden
      $orderNumber = Order_number::where('user_id', '=', Auth::user()->id)->where('state_on', '=', 1)->get();
      //busco el pedido del producto y actualizo la cantidad del mismo
      //siempre y cuando la cantidad sea mayor o igual a uno
      if($request->input('quantity') >= 1){
        $editOrder = Order::where('order_number_id', '=', $orderNumber[0]->id)->where('product_id', '=', $request->input('product_id'))->get();
        $editOrder[0]->quantity = $request->input('quantity');
        $editOrder[0]->update();
        //calculo el subtotal del producto
        $subPrice = $request->input('quantity') * $editOrder[0]->product->price_p;
        //calculo el precio total de todos los productos
        $orders = Order::where('order_number_id', '=', $orderNumber[0]->id)->get();
        $totalPrice = 0;
        foreach($orders as $order){
          if($order->quantity > 0){
            $totalPrice += ($order->quantity * $order->product->price_p);
          }
        }
        return response()->json([
          'product_id' => $request->input('product_id'),
          'subPrice' => $subPrice,
          'totalPrice' => $totalPrice
        ]);
      }
      return response()->json(false);
    }

    public function destroyDO(Request $request)
    {
      //busco el número de orden
      $orderNumber = Order_number::where('user_id', '=', Auth::user()->id)->where('state_on', '=', 1)->get();
      //busco el pedido del producto que quiero eliminar
      $order = Order::where('order_number_id', '=', $orderNumber[0]->id)->where('product_id', '=', $request->input('product_id'))->get();
      if($order->count() > 0){
        $order[0]->delete();
        //busco los pedidos de productos que quedaron en el carrito
        //si no hay productos en el carrito, envío al usuario a la página de inicio
        $orders = Order::where('order_number_id', '=', $orderNumber[0]->id)->get();
        if($orders->count() > 0){
          //calculo el precio total de todos los productos que quedaron
          $totalPrice = 0;
          foreach($orders as $order){
            if($order->quantity > 0){
              $totalPrice += ($order->quantity * $order->product->price_p);
            }
          }
          //en el caso que queden productos, entonces solo borro de la pantalla el producto que se busca borrar
          //también retorno la cantidad de productos que quedaron en el pedido
          //y por último el precio total
          return response()->json([
            'product_id' => $request->input('product_id'),
            'count' => $orders->count(),
            'totalPrice' => $totalPrice
          ]);
        }
      }
      return response()->json(false);
    }
}

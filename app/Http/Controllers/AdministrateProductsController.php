<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Product_category;

class AdministrateProductsController extends Controller
{
    public function index()
    {
      $products = Product::paginate(10);
      return view('products.administrateProducts')->with('products', $products);
    }

    public function create()
    {
      $productCategories = Product_category::all();
      return view('products.addProduct')->with('productCategories', $productCategories);
    }

    public function save(Request $request)
    {
      $rules = [
        'name_p' => 'required|string|max:70',
        'price_p' => 'required|numeric|min:0|max:999999.99',
        'offer' => 'required|integer|min:0|max:100',
        'detail' => 'required|string|max:65535',
        'poster' => 'required|file|mimes:jpeg,bmp,png',
        'stock' => 'required|integer|min:0|max:1000000',
        'state_p' => 'required|integer|min:0|max:1',
        'product_category_id' => 'required|integer'
      ];
      $this->validate($request, $rules);
      $addProduct = new Product();
      $route = $request->file('poster')->storePublicly('public/poster');
      $namePoster = basename($route);
      $addProduct->name_p = ucwords(strtolower($request->input('name_p')));
      $addProduct->price_p = $request->input('price_p');
      $addProduct->offer = $request->input('offer');
      $addProduct->detail = $request->input('detail');
      $addProduct->poster = $namePoster;
      $addProduct->stock = $request->input('stock');
      $addProduct->new = 1;
      $addProduct->state_p = $request->input('state_p');
      $addProduct->total_purchased = 0;
      $addProduct->product_category_id = $request->input('product_category_id');
      $addProduct->save();
      return redirect()->route('administrateProducts');
    }

    public function edit($id)
    {
      $product = Product::find($id);
      $productCategories = Product_category::where('id', '!=', $product->product_category_id)->get();
      return view('products.editProduct')->with('product', $product)->with('productCategories', $productCategories);
    }

    public function update(Request $request, $id)
    {
      $rules = [
        'name_p' => 'required|string|max:70',
        'price_p' => 'required|numeric|min:0|max:999999.99',
        'offer' => 'required|integer|min:0|max:100',
        'detail' => 'required|string|max:65535',
        'poster' => 'file|mimes:jpeg,bmp,png',
        'stock' => 'required|integer|min:0|max:1000000',
        'new' => 'required|integer|min:0|max:1',
        'state_p' => 'required|integer|min:0|max:1',
        'product_category_id' => 'required|integer'
      ];
      $this->validate($request, $rules);
      $editProduct = Product::find($id);
      $editProduct->name_p = ucwords(strtolower($request->input('name_p')));
      $editProduct->price_p = $request->input('price_p');
      $editProduct->offer = $request->input('offer');
      $editProduct->detail = $request->input('detail');
      $editProduct->stock = $request->input('stock');
      $editProduct->new = $request->input('new');
      $editProduct->state_p = $request->input('state_p');
      $editProduct->product_category_id = $request->input('product_category_id');
      if($request->file('poster')){
        $route = $request->file('poster')->storePublicly('public/poster');
        $namePoster = basename($route);
        $editProduct->poster = $namePoster;
      }
      $editProduct->update();
      return redirect()->route('administrateProducts');
    }

    public function show($id)
    {
      $product = Product::find($id);
      return view('products.detailsProduct')->with('product', $product);
    }

    public function search(Request $request)
    {
      if($request->input('search')){
        $products = Product::where('name_p', 'like', '%'.$request->input('search').'%')->paginate(10);
      }else{
        $products = Product::paginate(10);
      }
      return view('products.administrateProducts')->with('products', $products);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product_category;
use App\Product;

class CategoriesController extends Controller
{
    public function index($id)
    {
      $categories = Product_category::all();
      if($id >= 1 && $id <= $categories->count()){
        $category = Product_category::find($id);
        if($category->state_pc === 1){
          $products = Product::where('product_category_id', '=', $category->id)->paginate(8);
          return view('categories')->with('category', $category)->with('products', $products);
        }
      }
    }
}

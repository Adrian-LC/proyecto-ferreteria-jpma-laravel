<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product_category;

class FetchController extends Controller
{
    public function indexPC()
    {
      $productCategories = Product_category::all();
      return response()->json($productCategories);
    }
}

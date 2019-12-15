<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class RootController extends Controller
{
    public function index()
    {
      $newProducts = Product::where('new', '=', 1)->where('state_p', '=', 1)->paginate(4);
      return view('root')->with('newProducts', $newProducts);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product_category;

class AdministrateProductCategoriesController extends Controller
{
    public function index()
    {
      $productCategories = Product_category::paginate(10);
      return view('productCategories.administrateProductCategories')->with('productCategories', $productCategories);
    }

    public function create()
    {
      return view('productCategories.addProductCategory');
    }

    public function save(Request $request)
    {
      $rules = [
        'name_pc' => 'required|string|unique:product_categories|max:30'
      ];
      $this->validate($request, $rules);
      $addProductCategory = new Product_category();
      $addProductCategory->name_pc = ucwords(strtolower($request->input('name_pc')));
      $addProductCategory->state_pc = 1;
      $addProductCategory->save();
      return redirect()->route('administrateProductCategories');
    }

    public function edit($id)
    {
      $productCategory = Product_category::find($id);
      return view('productCategories.editProductCategory')->with('productCategory', $productCategory);
    }

    public function update(Request $request, $id)
    {
      $productCategories = Product_category::where('id', '!=', $id)->get();
      $rules = [
        'name_pc' => 'required|string|max:30'
      ];
      foreach ($productCategories as  $productCategory) {
        if($productCategory->name_pc == ucwords(strtolower($request->input('name_pc')))){
          $rules = [
            'name_pc' => 'required|string|unique:product_categories|max:30'
          ];
        }
      }
      $this->validate($request, $rules);
      $editProductCategory = Product_category::find($id);
      $editProductCategory->name_pc = ucwords(strtolower($request->input('name_pc')));
      $editProductCategory->state_pc = $request->input('state_pc');
      $editProductCategory->update();
      return redirect()->route('administrateProductCategories');
    }
}

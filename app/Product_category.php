<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// use App\Product;

class Product_category extends Model
{
    protected $fillable = [
      'name_pc', 'state_pc'
    ];

    // public function products()
    // {
    //   return $this->hasMany(Product::class);
    // }
}

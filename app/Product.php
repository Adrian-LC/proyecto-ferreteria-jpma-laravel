<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Product_category;

class Product extends Model
{
    protected $fillable = [
      'name_p', 'price_p', 'offer', 'detail', 'poster', 'stock', 'new', 'state_p', 'total_purchased', 'product_category_id'
    ];

    public function product_category()
    {
      return $this->belongsTo(Product_category::class);
    }
}

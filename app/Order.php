<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Product;

class Order extends Model
{
    protected $fillable = [
      'price_o', 'quantity', 'user_id_o', 'order_number_id', 'product_id', 'sale_id'
    ];

    public function product()
    {
      return $this->belongsTo(Product::class);
    }
}

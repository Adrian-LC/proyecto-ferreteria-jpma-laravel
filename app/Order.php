<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
      'price_o', 'quantity', 'user_id_o', 'order_number_id', 'product_id', 'sale_id'
    ];
}

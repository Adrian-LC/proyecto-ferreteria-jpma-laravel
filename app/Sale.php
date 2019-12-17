<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
      'total_price', 'order_number_id_s', 'payment_method_id'
    ];
}

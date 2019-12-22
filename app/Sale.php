<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Order;

class Sale extends Model
{
    protected $fillable = [
      'total_price', 'order_number_id_s', 'payment_method_id'
    ];

    public function orders()
    {
      return $this->hasMany(Order::class);
    }
}

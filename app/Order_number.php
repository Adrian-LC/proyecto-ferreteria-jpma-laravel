<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_number extends Model
{
    protected $fillable = [
      'state_on', 'user_id'
    ];
}

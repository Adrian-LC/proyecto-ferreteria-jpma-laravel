<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frequent_question extends Model
{
    protected $fillable = [
      'question', 'answer'
    ];
}

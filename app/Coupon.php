<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
      'coupon_name',
      'percent',
      'starting_date',
      'ending_date',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
      'ip',
      'product_id',
      'product_code',
      'size',
      'color',
    ];
    protected $table = 'carts';
}

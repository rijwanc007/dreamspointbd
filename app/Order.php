<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
      'product_code',
      'product_name',
      'size',
      'color',
      'product_qty',
      'product_price',
      'product_sub_total',
      'delivery',
      'status',
      'customer_name',
      'customer_phone',
      'customer_email',
      'customer_address',
      'coupon_name',
      'total_with_coupon',
      'total_without_coupon',
    ];
    protected $table = 'orders';
}

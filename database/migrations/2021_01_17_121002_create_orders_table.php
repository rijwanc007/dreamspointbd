<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('product_code')->nullable();
            $table->longText('product_name')->nullable();
            $table->longText('size')->nullable();
            $table->longText('color')->nullable();
            $table->longText('product_qty')->nullable();
            $table->longText('product_price')->nullable();
            $table->string('product_sub_total')->nullable();
            $table->string('delivery')->nullable();
            $table->string('status')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('coupon_name')->nullable();
            $table->string('total_with_coupon')->nullable();
            $table->string('total_without_coupon')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

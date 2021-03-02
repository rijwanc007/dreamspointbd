<?php

namespace App\Http\Controllers;

use App\Order;
use App\Subscriber;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $m= date("m");
        $de= date("d");
        $y= date("Y");

        $from = date('Y-m-d',mktime(0,0,0,$m,($de-7),$y));
        $to = date('Y-m-d');
        $weekly_sales = Order::where('status', 'delivered')->whereDate('updated_at', '>=', $from)->whereDate('updated_at', '<=', $to)->orderbY('id', 'DESC')->count();
        $weekly_orders = Order::where('status', 'pending')->whereDate('updated_at', '>=', $from)->whereDate('updated_at', '<=', $to)->orderbY('id', 'DESC')->count();
        $total_orders = Order::where('status', 'pending')->orderbY('id', 'DESC')->count();
        $total_sell = Order::where('status', 'delivered')->orderbY('id', 'DESC')->sum('product_sub_total');
        $returned_products = Order::where('status', 'returned')->orderbY('id', 'DESC')->count();
        $subscribers = Subscriber::orderbY('id', 'DESC')->count();
        return view('backend.index', compact('weekly_sales', 'weekly_orders', 'subscribers', 'total_orders', 'total_sell','returned_products'));
    }
}

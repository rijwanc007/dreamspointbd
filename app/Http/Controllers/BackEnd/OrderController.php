<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->get();
        return view('backend.order.index', compact('orders'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $order = Order::find($id);
        return view('backend.order.show', compact('order'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Order::find($id)->delete();
        return redirect()->back();
    }
    public function transaction(){
        $from = null;
        $to = date('d-m-Y');
        $orders = Order::where('status', 'delivered')->orderBy('id', 'DESC')->get();
        return view('backend.order.transaction', compact('orders', 'from', 'to'));
    }
    public function date_search_transaction(Request $request){
        $from = $request->date_from;
        $to = $request->date_to;
        $orders = Order::whereDate('updated_at', '>=', $from)->whereDate('updated_at', '<=', $to)->where('status', 'delivered')->orderBy('id', 'DESC')->get();
        return view('backend.order.transaction', compact('orders', 'from', 'to'));
    }
    public function delivered($id){
        $order = Order::find($id);
        $order->update(['status'=>'delivered']);
        return redirect()->back();
    }
    public function returned($id){
        $order = Order::find($id);
        $order->update(['status'=>'returned']);
        return redirect()->back();
    }
    public function canceled($id){
        $order = Order::find($id);
        $order->update(['status'=>'canceled']);
        return redirect()->back();
    }
}

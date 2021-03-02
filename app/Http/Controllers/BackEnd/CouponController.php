<?php

namespace App\Http\Controllers\BackEnd;

use App\Coupon;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::orderBy('id', 'DESC')->get();
        return view('backend.coupon.index', compact('coupons'));
    }

    public function create()
    {
        return view('backend.coupon.create');
    }


    public function store(Request $request)
    {
        Coupon::create([
           'coupon_name'=>$request->coupon_name,
           'percent'=>$request->percentage,
           'starting_date'=>$request->starting_date,
           'ending_date'=>$request->ending_date,
        ]);
        Session::flash('success', 'Coupon Created Successfully');
        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('backend.coupon.edit', compact('coupon'));
    }

    public function update(Request $request, $id)
    {
        $coupon = Coupon::find($id);
        $coupon->update([
            'coupon_name'=>$request->coupon_name,
            'percent'=>$request->percentage,
            'starting_date'=>$request->starting_date,
            'ending_date'=>$request->ending_date,
        ]);
        Session::flash('success', 'Coupon Updated Successfully');
        return redirect()->route('coupon.index');
    }

    public function destroy($id)
    {
        Coupon::find($id)->delete();
        Session::flash('success', 'Coupon Deleted Successfully');
        return redirect()->back();
    }

    public function coupon($coupon){
        $date = date('Y-m-d');
        $value = explode('___', $coupon);
        $coupon = Coupon::where('coupon_name', $value[0])->whereDate('starting_date', '<=', $date)->whereDate('ending_date', '>=', $date)->orderBy('id', 'DESC')->first();
        $order = Order::where('coupon_name', $value[0])->where('customer_phone', $value[1])->orderBy('id', 'DESC')->first();
        if(empty($order)){
            if(!empty($coupon)){
                $data = $coupon->percent;
            }
            else{
                $data = 0;
            }
        }
        else{
            $data = 0;
        }

        return response()->json($data);
    }
}

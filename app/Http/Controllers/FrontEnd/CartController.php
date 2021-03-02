<?php

namespace App\Http\Controllers\FrontEnd;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = Cart::where('ip', $request->ip())->orderBy('id', 'DESC')->first();
        if(!empty($cart)){
            $product_id = explode(',',str_replace(str_split('[]""'),'',$cart->product_id));
        }
        else{
            $product_id = [];
        }
        $products = Product::whereIn('id', $product_id)->orderBy('id', 'DESC')->get();
        return view('frontend.cart', compact('cart', 'products'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        for($q=0 ; $q<count($request->product_qty) ; $q++){
           if($request->product_qty[$q] == 0 ){
               Session::flash('error', 'Product Can not have 0 quantity');
               return redirect()->route('cart.index');
           }
        }
        $cart = Cart::find($request->cart_id);
        $product_id = explode(',',str_replace(str_split('[]""'),'',$cart->product_id));
        $product_code = explode(',',str_replace(str_split('[]""'),'',$cart->product_code));
        $product_size = explode(',',str_replace(str_split('[]""'),'',$cart->size));
        $product_color = explode(',',str_replace(str_split('[]""'),'',$cart->color));
        $products = Product::whereIn('id', $product_id)->orderBy('id', 'DESC')->get();
        foreach ($products as $product){
            for($i=0;$i<count($product_id) ;$i++){
                if($product->id == $product_id[$i]){
                    $size[] = $product_size[$i];
                    $color[] = $product_color[$i];
                    $code[] = $product_code[$i];
                }
            }
        }

        $product_sub_total = 0;
        for($i=0;$i<count($request->product_qty) ;$i++){
            $product_sub_total += (($request->product_price[$i]) * ($request->product_qty[$i]));
        }

        Order::create([
           'product_code'=>json_encode($code),
           'product_name'=>json_encode($request->product_name),
           'size'=>json_encode($size),
           'color'=>json_encode($color),
           'product_qty'=>json_encode($request->product_qty),
           'product_price'=>json_encode($request->product_price),
            'product_sub_total'=>$product_sub_total,
            'delivery'=>$request->delivery,
            'status'=>'pending',
            'customer_name'=>$request->name,
            'customer_phone'=>$request->phone,
            'customer_email'=>$request->email,
            'customer_address'=>$request->address,
            'coupon_name'=>$request->coupon_name,
            'total_with_coupon'=>$request->total_with_coupon,
            'total_without_coupon'=>$request->total_without_coupon,
        ]);
        $cart->delete();
        Session::flash('success', 'Your order is successfully placed');
        return redirect()->route('cart.index');
    }

    public function show($id)
    {
        //
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
        //
    }
    public function remove_cart(Request $request, $id){
        $cart = Cart::where('ip', $request->ip())->orderBy('id', 'DESC')->first();
        $product_id = explode(',',str_replace(str_split('[]""'),'',$cart->product_id));
        $product_code = explode(',',str_replace(str_split('[]""'),'',$cart->product_code));
        $size = explode(',',str_replace(str_split('[]""'),'',$cart->size));
        $color = explode(',',str_replace(str_split('[]""'),'',$cart->color));
        for($i=0;$i<count($product_id) ; $i++){
            if($product_id[$i] == $id){
                array_splice($product_id,$i,1);
                array_splice($product_code,$i,1);
                array_splice($size,$i,1);
                array_splice($color,$i,1);
//                unset($product_id[$i]);
//                unset([$size$i]);
//                unset($color[$i]);
            }
        }
        if(!empty($product_id)){
            $cart->update([
                'product_id'=>json_encode($product_id),
                'product_code'=>json_encode($product_code),
                'size'=>json_encode($size),
                'color'=>json_encode($color),
            ]);
        }
        else{
            $cart->delete();
        }

        Session::flash('success', 'Product Removed From Cart');
        return redirect()->route('cart.index');
    }
    public function addToCart(Request $request, $id){
        $product = Product::find($id);
        $cart = Cart::where('ip', $request->ip())->orderBy('id', 'DESC')->first();
        if(empty($cart)){
            Cart::create([
                'ip'=>$request->ip(),
                'product_id'=> json_encode($id),
                'product_code'=> json_encode($product->product_code),
                'size'=> json_encode($request->size),
                'color'=> json_encode($request->color),
            ]);
        }
        else{
            $product_id = explode(',',str_replace(str_split('[]""'),'',$cart->product_id));
            $product_code = explode(',',str_replace(str_split('[]""'),'',$cart->product_code));
            $size = explode(',',str_replace(str_split('[]""'),'',$cart->size));
            $color = explode(',',str_replace(str_split('[]""'),'',$cart->color));
            for ($i = 0; $i<count($product_id) ; $i++){
                if($product_id[$i] == $id){
                    Session::flash('error', 'Product is already added to cart');
                    return redirect()->back();
                }
            }
            $product_id[] = $id;
            $product_code[] = $product->product_code;
            $size[]= $request->size;
            $color[]= $request->color;
            $cart->update([
                'product_id'=> json_encode($product_id),
                'product_code'=> json_encode($product_code),
                'size'=> json_encode($size),
                'color'=> json_encode($color),
            ]);
        }
        Session::flash('success', 'Product added to cart');
        return redirect()->back();

    }
}

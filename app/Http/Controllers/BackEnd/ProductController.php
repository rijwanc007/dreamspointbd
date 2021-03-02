<?php

namespace App\Http\Controllers\BackEnd;

use App\Category;
use App\Http\Controllers\Controller;
use App\Offer;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(30);
        return view('backend.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('id', 'DESC')->select('name')->distinct()->get();
        $offers = Offer::orderBy('id', 'DESC')->get();
        return view('backend.product.create', compact('categories', 'offers'));
    }

    public function store(Request $request)
    {

        $size = !empty($request->size) ? explode(',', $request->size) : null;
        $color = !empty($request->color) ? explode(',', $request->color) : null;

        foreach($request->file('photo') as $image){
            $name = rand().'.'.$image->getClientOriginalExtension();
            $document_name[] = $name;
            $image->move(public_path().'/assets/images/products/'.$request->category.'/',$name);
        }

       Product::create([
          'category'=>$request->category,
          'sub_category'=>$request->sub_category,
          'image'=>json_encode($document_name),
           'title'=>$request->title,
           'product_code'=>$request->p_code,
           'description'=>$request->description,
           'size'=>json_encode($size),
           'color'=>json_encode($color),
           'offer'=>$request->offer,
           'pf'=>$request->pf,
           'prev_price'=>$request->pp,
           'new_price'=>$request->np,
           'discount'=>$request->discount,
       ]);
       Session::flash('success', 'Product added successfully');
       return redirect()->route('product.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $size = str_replace(str_split('[]""'),'',$product->size);
        $color = str_replace(str_split('[]""'),'',$product->color);
        $categories = Category::orderBy('id', 'DESC')->select('name')->distinct()->get();
        $sub_categories = Category::where('name', $product->category)->orderBy('id','DESC')->get();
        $offers = Offer::orderBy('id', 'DESC')->get();
        return view('backend.product.edit', compact('product','categories', 'sub_categories', 'offers', 'size', 'color'));
    }

    public function update(Request $request, $id)
    {
        $size = !empty($request->size) ? explode(',', $request->size) : null;
        $color = !empty($request->color) ? explode(',', $request->color) : null;

        $product = Product::find($id);
        $d = Product::find($id);
        if(!empty($request->file('photo'))){
            $product_images = explode(',',str_replace(str_split('[]""'),'',$d->image));
            if(!empty($product_images)){
                if(!empty($request->prev_photo)){
                    $result = array_values(array_diff($product_images,$request->prev_photo));
                    for($i=0;$i<count($result) ;$i++) {
                        unlink('assets/images/products/'.$d->category.'/'.$result[$i]);
                    }
                    }
                }
                else{
                    foreach ($product_images as $image){
                        unlink('assets/images/products/'.$d->category.'/'.$image);
                    }
                }
            foreach($request->file('photo') as $image){
                $name = rand().'.'.$image->getClientOriginalExtension();
                $document_name[] = $name;
                $image->move(public_path().'/assets/images/products/'.$request->category.'/',$name);
            }
            if(!empty($request->prev_photo)) {
                for ($i = 0; $i < count($request->prev_photo); $i++) {
                    $document_name[] = $request->prev_photo[$i];
                }
            }
            $product->update([
                'category'=>$request->category,
                'sub_category'=>$request->sub_category,
                'title'=>$request->title,
                'product_code'=>$request->p_code,
                'description'=>$request->description,
                'size'=>json_encode($size),
                'color'=>json_encode($color),
                'offer'=>$request->offer,
                'pf'=>$request->pf,
                'prev_price'=>$request->pp,
                'new_price'=>$request->np,
                'discount'=>$request->discount,
                'image'=>json_encode($document_name),
            ]);
        }
        else{
            $product_images = explode(',',str_replace(str_split('[]""'),'',$d->image));
            if(!empty($product_images)){
                if(!empty($request->prev_photo)){
                    $result = array_values(array_diff($product_images,$request->prev_photo));
                    for($i=0;$i<count($result) ;$i++) {
                        unlink('assets/images/products/'.$d->category.'/'.$result[$i]);
                    }
                }
            }
            else{
                foreach ($product_images as $image){
                    unlink('assets/images/products/'.$d->category.'/'.$image);
                }
            }
            if(!empty($request->prev_photo)) {
                for ($i = 0; $i < count($request->prev_photo); $i++) {
                    $document_name[] = $request->prev_photo[$i];
                }
            }
            $product->update([
                'category'=>$request->category,
                'sub_category'=>$request->sub_category,
                'title'=>$request->title,
                'product_code'=>$request->p_code,
                'description'=>$request->description,
                'size'=>json_encode($size),
                'color'=>json_encode($color),
                'offer'=>$request->offer,
                'pf'=>$request->pf,
                'prev_price'=>$request->pp,
                'new_price'=>$request->np,
                'discount'=>$request->discount,
                'image'=>json_encode($document_name),
            ]);
//            $product->update([
//                'category'=>$request->category,
//                'sub_category'=>$request->sub_category,
//                'title'=>$request->title,
//                'product_code'=>$request->p_code,
//                'description'=>$request->description,
//                'size'=>json_encode($size),
//                'color'=>json_encode($color),
//                'offer'=>$request->offer,
//                'pf'=>$request->pf,
//                'prev_price'=>$request->pp,
//                'new_price'=>$request->np,
//                'discount'=>$request->discount,
//            ]);
        }
        Session::flash('success', 'Product Updated Successfully');
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product_images = explode(',',str_replace(str_split('[]""'),'',$product->image));
        if(!empty($product_images)){
            foreach ($product_images as $image){
                unlink('assets/images/products/'.$product->category.'/'.$image);
            }
        }
        $product->delete();
        Session::flash('success', 'Product Deleted succesfully');
        return redirect()->route('product.index');
    }

    public function search(Request $request){
        $input = $request->item;
        $products = Product::where('category', 'like', "%$input%")
            ->orWhere('sub_category', 'like', "%$input%")
            ->orWhere('title', 'like', "%$input%")
            ->orWhere('product_code', 'like', "%$input%")
            ->orWhere('pf', 'like', "%$input%")
            ->orWhere('prev_price', 'like', "%$input%")
            ->orWhere('new_price', 'like', "%$input%")
            ->orWhere('discount', 'like', "%$input%")
            ->orderBy('id', 'DESC')->paginate(20);
        return view('backend.product.index', compact('products'));
    }

    public function sub_category($cname){
        $sub_categories = Category::where('name', $cname)->get();
        return response()->json($sub_categories);
    }
}

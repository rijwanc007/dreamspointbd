@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div id="PrintBill">
                <div class="card-body">
                    <br/><br/>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 text-center"><img src="{{asset('assets/images/dpb_logo-2.png')}}" style="width: 170px"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <p class="text-center" style="border: 1px darkgray; background-color: darkgray; color: #fff">Purchase List</p>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-6 text-right"><b>Order Number : {{$order->id}}</b></div>
                                <div class="col-md-6"></div>
                                <div class="col-md-6 text-right"><b>Order Date : {{date('d-m-y', strtotime($order->created_at))}}</b></div>
                            </div>
                            <br/><br/>
                            <div class="row text-left">
                                <div class="col-md-3"><b>Purchased By</b></div>
                                <div class="col-md-1"><b>:</b></div>
                                <div class="col-md-8">{{$order->customer_name}}</div>
                                <div class="col-md-3"><b>Address</b></div>
                                <div class="col-md-1"><b>:</b></div>
                                <div class="col-md-8">{{$order->customer_address}}</div>
                                <div class="col-md-3"><b>Phone</b></div>
                                <div class="col-md-1"><b>:</b></div>
                                <div class="col-md-8">{{$order->customer_phone}}</div>
                            </div>
                            <br/><br/>
                            <div class="row">
                                <div class="col-md-12 text-center"><h3>#Order List<hr/></h3></div>
                                <div class="col-md-1 text-center">S/L<hr/></div>
                                <div class="col-md-2 text-center">Product Code <hr/></div>
                                <div class="col-md-2 text-center">Items <hr/></div>
                                <div class="col-md-1 text-center">Size<hr/></div>
                                <div class="col-md-1 text-center">Color<hr/></div>
                                <div class="col-md-1 text-center">Quantity<hr/></div>
                                <div class="col-md-2 text-center">Unit Price(৳)<hr/></div>
                                <div class="col-md-2 text-center"> Line Price(৳)<hr/></div>
                                @for($i = 0 ; $i< count(json_decode($order->product_name)) ;$i++)
                                <div class="col-md-1 text-center">{{$i+1}}</div>
                                <div class="col-md-2 text-center">{{json_decode($order->product_code)[$i]}}</div>
                                <div class="col-md-2 text-center">{{json_decode($order->product_name)[$i]}}</div>

                                <div class="col-md-1 text-center">{{json_decode($order->size)[$i] != 'null' ? json_decode($order->size)[$i] : '-'}}</div>
                                <div class="col-md-1 text-center">{{json_decode($order->color)[$i] != 'null' ? json_decode($order->color)[$i] : '-'}}</div>
                                <div class="col-md-1 text-center">{{json_decode($order->product_qty)[$i]}}</div>
                                <div class="col-md-2 text-center">{{json_decode($order->product_price)[$i]}} .00</div>
                                <div class="col-md-2 text-center">{{json_decode($order->product_price)[$i] * json_decode($order->product_qty)[$i]}} .00</div>
                                    <br/><br/>
                                @endfor
                                <div class="col-md-12"><hr/></div>
                                <div class="col-md-7"></div>
                                <div class="col-md-3 text-left"><b>Sub Total(৳)</b></div>
                                <div class="col-md-2 text-center"><b>{{$order->product_sub_total}}.00</b></div>
                                <div class="col-md-7"></div>
                                <div class="col-md-3 text-left"><b>Delivery Charge(৳)</b></div>
                                <div class="col-md-2 text-center"><b>{{$order->delivery}}.00</b></div>
                                <div class="col-md-7"></div>
                                <div class="col-md-3 text-left"><b>Discount(-৳)</b></div>
                                <div class="col-md-2 text-center"><b>{{!empty($order->coupon_name) ? $order->total_without_coupon- $order->total_with_coupon : '0'}}.00</b></div>
                                <div class="col-md-7"></div>
                                <div class="col-md-5"><hr/></div>
                                <div class="col-md-7"></div>
                                <div class="col-md-3 text-left"><b>Grand Total(৳)</b></div>
                                <div class="col-md-2 text-center"><b>{{!empty($order->coupon_name) ? $order->total_with_coupon : $order->total_without_coupon}}</b></div>
                                <br/><br/><br/>
                                <div class="col-md-12"><h4>Note : </h4></div>
                                <br/><br/>
                                <div class="col-md-12"><b>Delivery Will Take Place within 2 - 4 Days</b></div>
                                <div class="col-md-12"><b>Cash On Delivery</b></div>
                                <br/><br/><br/>
                                <div class="col-md-6"></div>
                                <div class="col-md-6 text-center"><b>On Behalf Dreampoint Bd</b><hr/></div>
                                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

                            </div>
                            </div>
                    </div>
                </div>
                </div>
            </div>
            <br/><br/><br/>
            <div class="row text-center">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <br/>
                        <input type="button" class="print_button btn-gradient-primary btn-block form-control" onclick="printDiv('PrintBill')" value="print" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function printDiv(divName)
        {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection

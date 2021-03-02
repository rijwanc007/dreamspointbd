@extends('frontend.master')
@section('title', 'Dream Point | Cart')
@section('content')
{{--    @php--}}
{{--        $size = explode(',',str_replace(str_split('[]""'),'',$cart->size));--}}
{{--        $color = explode(',',str_replace(str_split('[]""'),'',$cart->color));--}}
{{--    @endphp--}}
    <div class="container">
        <div id="cat-nav">
            <div class="container">
                <nav class="navbar navbar-default">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#cat-nav-mega">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="cat-nav-mega">
                        <ul class="nav navbar-nav">
                            <li class="dropdown menu-large">There is nothing to show</li>
                            <li><a href="{{route('frontend.men.cloth')}}">MEN </a></li>
                            <li><a href="{{route('frontend.women.cloth')}}">WOMEN </a></li>
                            <li><a href="{{route('frontend.kids.cloth')}}">BABY & KIDS </a></li>
                            <li><a href="{{route('frontend.groceries')}}">GROCERIES </a></li>
                            <li><a href="{{route('frontend.accessories')}}">ACCESSORIES </a></li>
                            <li><a href="{{route('frontend.offer_zone')}}">OFFERS ZONE </a></li>
                            <li class="cat-img-off"><img src="{{asset('assets/images/offers.png')}}" alt="off"></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        @if(!empty($cart))
            <div class="container-fluid">
                {!! Form::open(['id' =>'multiphase','class' =>'form-sample','route' => 'cart.store','method' => 'POST']) !!}
                <div id="phase1" class="phase_one">
                    <div class="row table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr class="text-center">
                                <th>Image</th>
                                <th>Product</th>
                                <th>Price (৳)</th>
                                <th>Quantity</th>
                                <th>Remove</th>
                                <th>Total(৳)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $total = 0; @endphp
                                @foreach($products as $product)
                                    @php
                                    $total += $product->new_price;
                                    $sub_total = $product->new_price;
                                    @endphp
                                        <tr class="text-center">
                                            <td>
                                                @php
                                                    $product_images = explode(',',str_replace(str_split('[]""'),'',$product->image));
                                                @endphp
                                                @for($i=0;$i<count($product_images) ; $i++)
                                                    <img src="{{asset('assets/images/products/'.$product->category . '/'.$product_images[$i])}}" alt="">
                                                    @break
                                                @endfor
                                            </td>
                                            <td>
                                                <div class="product-title"><h4>{{$product->title}}</h4></div>
                                                <input type="hidden" name="product_name[]" value="{{$product->title}}"/>
                                            </td>
                                            <td>
                                                <div class="product-price" id="new_price_{{$product->id}}">{{$product->new_price}}.00</div>
                                                <input type="hidden" name="product_price[]" value="{{$product->new_price}}"/>
                                                <input type="hidden" name="cart_id" value="{{$cart->id}}"/>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" id="product_quantity_{{$product->id}}" name="product_qty[]" value="1" min="1" oninput="checkLength(this)">
                                            </td>
                                            <td><button class="btn btn-danger btn-sm btn-block" onclick="window.location='{{route('cart.remove',$product->id)}}'">Remove</button></td>
                                            <td>
                                                <div class="" id="line_price_{{$product->id}}">{{$sub_total}}.00</div>
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="text-center">
                                <td colspan="4">
                                    <div class="form-group">
                                        <label>Dhaka City Charge - ৳60</label>
                                        &nbsp;&nbsp;&nbsp;
                                        <input type="radio" id="delivery1" class="" value="60" name="delivery">
                                    </div>
                                    <div class="form-group"> &nbsp;
                                        <label>Inter City Charge - ৳120</label>
                                        &nbsp;&nbsp;&nbsp;
                                        <input type="radio" id="delivery2" class="" value="120" name="delivery">
                                    </div>
                                    <h4>Delivery Will Take Place within 2 - 4 Days</h4>
                                </td>
                                <td>
                                    <table class="table table-borderless">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <p>Subtotal</p>
                                                <p>Shipping</p>
                                                <p>Grand Total</p>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <div class="totals-value" id="cart_subtotal">{{$total}}</div>
                                    <input type="hidden" name="product_sub_total" id="product_sub_total" value="{{$total}}"/>
                                    <br/>
                                    <div class="totals-value" id="cart_shipping">0.00</div>
                                    <br/>
                                    <div class="totals-value" id="cart_total">{{$total}}</div>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <button type="button" class="btn btn-info btn-sm" style="float: right" onclick="processPhase2()" title="continue">>></button>
                </div>
                <div id="phase2" style="display: none">
                    <h3 class="text-center">Please Fill Out the Form to Proceed</h3>
                    <div class="row" style="background-color: #2B2A2F; border-radius: 10px">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="page-title text-center"></h3>
                                </div>
                                <div class="card-body">
                                    <h2 class="text-info text-center">Cash On Delivery</h2>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone" required>
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                                    </div>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="coupon_name">Coupon</label>
                                                <input type="text" class="form-control" id="coupon_name" name="coupon_name" placeholder="Coupon Name">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="coupon_name">&nbsp;</label>
                                                <button type="button" class="btn btn-success btn-sm btn-block" id="coupon_button">Apply</button>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="total_without_coupon">Total</label>
                                                <input type="text" class="form-control" id="total_without_coupon" name="total_without_coupon" value="{{$total}}.00" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="total_with_coupon">Total(After Using Coupon)</label>
                                                <input type="text" class="form-control" id="total_with_coupon" name="total_with_coupon" value="0.00" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <button type="button" class="btn btn-info btn-sm" style="float: left" onclick="processPhase1()" title="Back"><<</button>
                    <button class="btn btn-info btn-sm" style="float: right" onclick="submitForm()">Checkout</button>
                </div>
                {!! Form::close() !!}
            </div>
            <br/><br/>
            <div class="progress">
                <div class="progress-bar progress-bar-info" style="min-width: 20px;">0%</div>
            </div>
        @else
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12" style="margin-top: 70px">
                        <button type="button" class="btn btn-danger btn-block"> Cart Is Empty</button>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <br/><br/><br/><br/>

    <script>
        function checkLength(elem) {
            if (elem.value < 0) {
                toastr.error("Quantity can not be Neagative");
                elem.value = '';
            }
        }
        @foreach($products as $product)
        $(document).on('input', '#product_quantity_{{$product->id}}', function (){
            let qty = $(this).val();
                let price = parseFloat($('#new_price_{{$product->id}}').text());
                let lineprice = qty * price;
                $('#line_price_{{$product->id}}').text(lineprice.toFixed(2));

                let subtotal = 0;
                let shipping = parseFloat($('#cart_shipping').text());
                @foreach($products as $product)
                    subtotal += parseFloat($('#line_price_{{$product->id}}').text());
                @endforeach
                let total = shipping + subtotal;

                $('#cart_subtotal').text(subtotal.toFixed(2));
                $('#cart_total').text(total.toFixed(2));

        });
        @endforeach
        $(document).on('click', '#delivery1', function (){
            $('#cart_shipping').text($(this).val());

            let subtotal = 0;
            let shipping = parseFloat($('#cart_shipping').text());
            @foreach($products as $product)
                subtotal += parseFloat($('#line_price_{{$product->id}}').text());
            @endforeach
            let total = shipping + subtotal;
            $('#cart_subtotal').text(subtotal.toFixed(2));
            $('#cart_total').text(total.toFixed(2));
        });
        $(document).on('click', '#delivery2', function (){
            $('#cart_shipping').text($(this).val());

            let subtotal = 0;
            let shipping = parseFloat($('#cart_shipping').text());
            @foreach($products as $product)
                subtotal += parseFloat($('#line_price_{{$product->id}}').text());
            @endforeach
            let total = shipping + subtotal;
            $('#cart_subtotal').text(subtotal.toFixed(2));
            $('#cart_total').text(total.toFixed(2));
        });
    </script>
    <script>
        function _(x){
            return document.getElementById(x);
        }
        function processPhase1(){
            _("phase1").style.display = "block";
            _("phase2").style.display = "none";
            $(".progress-bar").css("width", 0 + "%").text(0 + " %");
        }
        function processPhase2(){
            let subtotal = $('#cart_subtotal').text();
            let cart_total = $('#cart_total').text();
            let shipping = parseFloat($('#cart_shipping').text());

            if(subtotal <= 0){
                toastr.error("Quantity can not be empty");
            }
            else if(shipping <=0){
                toastr.error("Please Select Delivery Method");
            }
            else {
                _("phase1").style.display = "none";
                _("phase2").style.display = "block";
                _("product_sub_total").value = subtotal;
                _("total_without_coupon").value = cart_total;
                $(".progress-bar").css("width", 50 + "%").text(50 + " %");

            }
        }
        $(document).on('click', '#coupon_button', function (){
           let coupon_name = _("coupon_name").value;
           let phone = _("phone").value;
            let coupon = coupon_name.concat('___', phone);
           if(phone == 0){
               toastr.error("Phone number is required");
           }
           else{
               let cart_total = $('#cart_total').text();
               $.ajax({
                   url : 'coupon_name/' + coupon,
                   method: 'GET',
                   success: function (data){
                       if(data != 0){
                           console.log(data);
                           let percent = data/100;
                           let discount = cart_total * percent;
                           _("total_with_coupon").value = (cart_total - discount) +'.00';
                       }
                       else{
                           _("total_with_coupon").value = '0.00';
                           _("phone").value = '';
                           toastr.error("Coupon is not valid!!!");
                       }
                   }
               })
           }

        });
        function submitForm(){
            let name = _('name').value;
            let phone = _('phone').value;
            let address = _('address').value;
            if(name.length != 0 && phone.length != 0 && address.length != 0){
                $(".progress-bar").css("width", 100 + "%").text(100 + " %");
                _("multiphase").method = "post";
                _("multiphase").action = "{{route('cart.store')}}";
                _("multiphase").submit();
            }
            else{
                toastr.error("Please Fill All the field");
            }

        }
    </script>
@endsection

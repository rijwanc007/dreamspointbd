@extends('frontend.master')
@section('title', 'Dream Point | Product')
@include('frontend.include.image_zoom')
@section('content')
    @php
        $product_size = explode(',',str_replace(str_split('[]""'),'',$product->size));
        $product_color = explode(',',str_replace(str_split('[]""'),'',$product->color));
        $p =0;
    @endphp
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
        <br/><br/><br/><br/>
        {!! Form::open(['class' =>'form-sample', 'id'=>'cart_form','route' => ['add-cart',$product->id],'method' => 'GET', 'enctype' => 'multipart/form-data']) !!}
        <section class="mb-5">
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h3 class="text-center">{{$product->title}}</h3>
                    <div class="row">
                        <div class="col-md-12"></div>
                        <div class="col-md-2"></div>
                        <div class="col-md-8 text-center">
                            @php
                                $product_images = explode(',',str_replace(str_split('[]""'),'',$product->image));
                            @endphp
                            @for($i=0;$i<count($product_images) ; $i++)
                                <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                                    <a href="{{asset('assets/images/products/'.$product->category . '/'.$product_images[$i])}}" class="image_zoom">
                                        <img src="{{asset('assets/images/products/'.$product->category . '/'.$product_images[$i])}}" alt="" width="300" height="300">
                                    </a>
                                </div>
                                @break
                            @endfor

                                <ul class="thumbnails">
                                    @for($i=0;$i<count($product_images) ; $i++)
                                    <li>
                                        <a href="{{asset('assets/images/products/'.$product->category . '/'.$product_images[$i])}}" data-standard="{{asset('assets/images/products/'.$product->category . '/'.$product_images[$i])}}">
                                            <img src="{{asset('assets/images/products/'.$product->category . '/'.$product_images[$i])}}" width="50" height="60" alt="" />
                                        </a>
                                    </li>
                                    @endfor
                                </ul>

                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row text-center">
                        <img src="{{asset('assets/images/icon/like.png')}}" id="product_view_wishlist" alt="pav" style="width: 12%;cursor: pointer" data-id="{{$product->id}}" title="Add To Wishlist">
                        <a href="#" onclick="document.getElementById('cart_form').submit();">
                            <img src="{{asset('assets/images/icon/favorite-cart.png')}}" id="" style="width: 9%;cursor: pointer" alt="bag" class="" title="Add To Cart">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="text-center">Description:</h3>
                    <div>{{$product->description}}</div>
                    <h3 class="text-center">Details</h3>
                    <div class="table-responsive">
                        <table class="table table-sm table-borderless">
                            <tbody>
                            <tr>
                                <td class="pl-0 w-25" scope="row"><strong>Product Code</strong></td>
                                <td>{{$product->product_code}}</td>
                            </tr>
                            <tr>
                                <td class="pl-0 w-25" scope="row"><strong>Price</strong></td>
                                <td><strike>{{$product->prev_price ? '৳'.$product->prev_price : ''}}</strike><div style="color: red;display: inline"> ৳{{$product->new_price}}</div></td>
                            </tr>
                            <tr>
                                <td class="pl-0 w-25" scope="row"><strong>Delivery</strong></td>
                                <td>Dhaka City<br/>Inter City</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive mb-2">
                        <table class="table table-sm table-borderless">
                            <tbody>
                            <tr>
                                <td class="text-center">Select size</td>
                                <td class="text-center">Select Color</td>
                            </tr>
                            <tr>
                                <td class="pl-0">
                                    @if($product->size != 'null')
                                        @for($i =0 ;$i<count($product_size); $i++)
                                            @if($product_size[$i] != 'null')
                                                <div class="form-check form-check-inline pl-0">
                                                    <input type="radio" class="form-check-input" id="size" name="size" value="{{$product_size[$i]}}" checked>
                                                    <label class="form-check-label small text-uppercase card-link-secondary" for="small">{{$product_size[$i]}}</label>
                                                </div>
                                            @else
                                                <button class="btn btn-danger btn-sm btn-block">Not Available</button>
                                            @endif
                                        @endfor
                                    @else
                                        <button class="btn btn-danger btn-sm btn-block">Not Available</button>
                                    @endif
                                </td>
                                <td>
                                    <div class="mt-1">
                                        @if($product->color != 'null')
                                            @for($i = 0 ;$i<count($product_color); $i++)
                                                @if($product_color[$i] != 'null')
                                                    <div class="form-check form-check-inline pl-0">
                                                        <input type="radio" class="form-check-input" id="color" name="color" value="{{$product_color[$i]}}" checked>
                                                        <label class="form-check-label small text-uppercase card-link-secondary" for="small">{{$product_color[$i]}}</label>
                                                    </div>
                                                @else
                                                    <button class="btn btn-danger btn-sm btn-block">Not Available</button>
                                                @endif
                                            @endfor
                                        @else
                                            <button class="btn btn-danger btn-sm btn-block">Not Available</button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        {!! Form::close() !!}
        <br/><br/><br/>
        <div class="row">
            <div class="col-md-12 text-info text-center"><h3>Products You May Like</h3> <hr/></div>
            @foreach($products as $product)
                @php
                    $p++;
                @endphp
            @if($p>3)
                @break;
            @endif
            <div class="col-md-3">
                <div class="product-fade">
                    <div class="product-fade-wrap">
                        <div id="product-image">
                            <div class="item">
                                @php
                                    $product_images = explode(',',str_replace(str_split('[]""'),'',$product->image));
                                @endphp
                                @for($i=0;$i<count($product_images) ; $i++)
                                    <img src="{{asset('assets/images/products/'.$product->category . '/'.$product_images[$i])}}" alt="" id="product_img" class="img-responsive">
                                    @break
                                @endfor
                            </div>
                        </div>
                        <div class="product-fade-ct">
                            <div class="product-fade-control">
                                <div class="to-left">
                                    <img src="{{asset('assets/images/icon/like.png')}}"  id="wishlist_cart" alt="pav" class="product_cart wishlist_cart" data-id="{{$product->id}}" title="Add To Wishlist">
                                </div>
                                <div class="clearfix"></div>
                                <a href="{{route('product_view', [$product->id])}}" class="btn btn-to-cart" id="btn-to-product">
                                    <img src="{{asset('assets/images/icon/view.png')}}" id="cart_design" alt="bag" class="product_cart" title="See More Details">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-name">
                    <a href="">{{$product->title}}</a>
                </div>
                <div class="product-price">
                    <span>{{$product->prev_price ? '৳'.$product->prev_price : ''}}</span> ৳{{$product->new_price}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script src="{{asset('assets/js/easyzoom.js')}}"></script>
    <script>
        // Instantiate EasyZoom instances
        var $easyzoom = $('.easyzoom').easyZoom();

        // Setup thumbnails example
        var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

        $('.thumbnails').on('click', 'a', function(e) {
            var $this = $(this);
            e.preventDefault();

            // Use EasyZoom's `swap` method
            api1.swap($this.data('standard'), $this.attr('href'));
        });

        // Setup toggles example
        var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

        $('.toggle').on('click', function() {
            var $this = $(this);

            if ($this.data("active") === true) {
                $this.text("Switch on").data("active", false);
                api2.teardown();
            } else {
                $this.text("Switch off").data("active", true);
                api2._init();
            }
        });
    </script>
@endsection

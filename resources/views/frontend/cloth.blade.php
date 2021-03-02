@extends('frontend.master')
@section('title', 'Dream Point | Cloths')
@section('content')
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
        <br/><br/>
        <div class="row">
            <div class="col-md-6">
                <a href="{{route('frontend.men.cloth')}}">
                    <div class="item animated wow fadeIn">
                        <div class="img-thumbnail"><img src="{{asset('assets/images/man.jpg')}}" class="img-responsive" id="cloth_image"/></div>
                        <div class="overlay fade-overlay">
                            <div class="text">BUY MEN CLOTHS</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <div class="women-layout">
                    <a href="{{route('frontend.women.cloth')}}">
                        <div class="item animated wow fadeIn">
                            <div class="img-thumbnail"><img src="{{asset('assets/images/women-model.jpg')}}" class="img-responsive" id="cloth_image"/></div>
                            <div class="overlay fade-overlay">
                                <div class="text"> BUY WOMEN CLOTHS</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="kids-layout">
                    <a href="{{route('frontend.kids.cloth')}}">
                        <div class="item animated wow fadeIn">
                            <div class="img-thumbnail"><img src="{{asset('assets/images/kids-model.jpg')}}" class="img-responsive" id="cloth_image"
                                /></div>
                            <div class="overlay fade-overlay">
                                <div class="text">BUY KIDS CLOTHS</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3 class="text-center">New Collection For Men</h3>
                <hr/>
            </div>
        </div>
        <div id="myTabContent" class="tab-content">
            <div class="row">
                @forelse($men_products as $men_product)
                    <div class="col-md-3 prdct-grid">
                        <div class="product-fade">
                            <div class="product-fade-wrap">
                                <div id="product-image">
                                    <div class="item2">
                                        @php
                                            $men_product_images = explode(',',str_replace(str_split('[]""'),'',$men_product->image));
                                        @endphp
                                        @for($i=0;$i<count($men_product_images) ; $i++)
                                            <img src="{{asset('assets/images/products/'.$men_product->category . '/'.$men_product_images[$i])}}" alt="" id="product_img" class="img-responsive">
                                            @break
                                        @endfor
                                    </div>
                                </div>
                                <div class="product-fade-ct">
                                    <div class="product-fade-control">
                                        <div class="to-left">
                                            <img src="{{asset('assets/images/icon/like.png')}}" id="wishlist_cart" alt="pav" class="product_cart wishlist_cart" data-id="{{$men_product->id}}" title="Add To Wishlist">
                                        </div>
                                        <div class="clearfix"></div>
{{--                                        <a href="{{route('add-cart', [$men_product->id])}}" class="btn btn-to-cart">--}}
{{--                                            <img src="{{asset('assets/images/icon/favorite-cart.png')}}" id="cart_design" alt="bag" class="product_cart" title="Add To Cart">--}}
{{--                                        </a>--}}
                                        <a href="{{route('product_view', [$men_product->id])}}" class="btn btn-to-cart" id="btn-to-product">
                                            <img src="{{asset('assets/images/icon/view.png')}}" id="cart_design" alt="bag" class="product_cart" title="See More Details">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-name">
                            <a href="">{{$men_product->title}}</a>
                        </div>
                        <div class="product-price">
                            <span>{{!empty($men_product->prev_price) ? '৳' .$men_product->prev_price : ''}}</span> ৳{{$men_product->new_price}}
                        </div>
                    </div>
                @empty
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h4 class="text-center">No Data Found !</h4>
                    </div>
                @endforelse
            </div>
        </div>
        <div id="women">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h3 class="text-center">New Collection For Women</h3>
                    <hr/>
                </div>
            </div>
            <div class="row">
                @forelse($women_products as $women_product)
                    <div class="col-md-3 prdct-grid">
                        <div class="product-fade">
                            <div class="product-fade-wrap">
                                <div id="product-image">
                                    <div class="item2">
                                        @php
                                            $women_product_images = explode(',',str_replace(str_split('[]""'),'',$women_product->image));
                                        @endphp
                                        @for($i=0;$i<count($women_product_images) ; $i++)
                                            <img src="{{asset('assets/images/products/'.$women_product->category . '/'.$women_product_images[$i])}}" alt="" id="product_img" class="img-responsive">
                                            @break
                                        @endfor
                                    </div>
                                </div>
                                <div class="product-fade-ct">
                                    <div class="product-fade-control">
                                        <div class="to-left">
                                            <img src="{{asset('assets/images/icon/like.png')}}" id="wishlist_cart" alt="pav" class="product_cart wishlist_cart" data-id="{{$women_product->id}}" title="Add To Wishlist">
                                        </div>
                                        <div class="clearfix"></div>
{{--                                        <a href="{{route('add-cart', [$women_product->id])}}" class="btn btn-to-cart">--}}
{{--                                            <img src="{{asset('assets/images/icon/favorite-cart.png')}}" id="cart_design" alt="bag" class="product_cart" title="Add To Cart">--}}
{{--                                        </a>--}}
                                        <a href="{{route('product_view', [$women_product->id])}}" class="btn btn-to-cart" id="btn-to-product">
                                            <img src="{{asset('assets/images/icon/view.png')}}" id="cart_design" alt="bag" class="product_cart" title="See More Details">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-name">
                            <a href="">{{$women_product->title}}</a>
                        </div>
                        <div class="product-price">
                            <span>{{!empty($women_product->prev_price) ? '৳' .$women_product->prev_price : ''}}</span> ৳{{$women_product->new_price}}
                        </div>
                    </div>
                @empty
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h4 class="text-center">No Data Found !</h4>
                    </div>
                @endforelse
            </div>
        </div>
        <div id="jeans">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h3 class="text-center">New Collection For Kids</h3>
                    <hr/>
                </div>
            </div>
            <div class="row">
                @forelse($kid_products as $kid_product)
                    <div class="col-md-3 prdct-grid">
                        <div class="product-fade">
                            <div class="product-fade-wrap">
                                <div id="product-image">
                                    <div class="item2">
                                        @php
                                            $kids_product_images = explode(',',str_replace(str_split('[]""'),'',$kid_product->image));
                                        @endphp
                                        @for($i=0;$i<count($kids_product_images) ; $i++)
                                            <img src="{{asset('assets/images/products/'.$kid_product->category . '/'.$kids_product_images[$i])}}" alt="" id="product_img" class="img-responsive">
                                            @break
                                        @endfor
                                    </div>
                                </div>
                                <div class="product-fade-ct">
                                    <div class="product-fade-control">
                                        <div class="to-left">
                                            <img src="{{asset('assets/images/icon/like.png')}}" id="wishlist_cart" alt="pav" class="product_cart wishlist_cart" data-id="{{$kid_product->id}}" title="Add To Wishlist">
                                        </div>
                                        <div class="clearfix"></div>
{{--                                        <a href="{{route('add-cart', [$kid_product->id])}}" class="btn btn-to-cart">--}}
{{--                                            <img src="{{asset('assets/images/icon/favorite-cart.png')}}" id="cart_design" alt="bag" class="product_cart" title="Add To Cart">--}}
{{--                                        </a>--}}
                                        <a href="{{route('product_view', [$kid_product->id])}}" class="btn btn-to-cart" id="btn-to-product">
                                            <img src="{{asset('assets/images/icon/view.png')}}" id="cart_design" alt="bag" class="product_cart" title="See More Details">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-name">
                            <a href="">{{$kid_product->title}}</a>
                        </div>
                        <div class="product-price">
                            <span>{{!empty($kid_product->prev_price) ? '৳' .$kid_product->prev_price : ''}}</span> ৳{{$kid_product->new_price}}
                        </div>
                    </div>
                @empty
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h4 class="text-center">No Data Found !</h4>
                    </div>
                @endforelse
            </div>
        </div>
@endsection

<?php

namespace App\Providers;

use App\Cart;
use App\Hotdeal;
use App\Product;
use App\Wishlist;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        view()->composer('frontend.include.footer', function($view) {
            $view->with('hotdeals', Hotdeal::orderBy('id', 'DESC')->skip(0)->take(6)->get());
        });
        view()->composer('frontend.include.header', function($view) {
            $view->with('wishlists', Wishlist::where('ip', $_SERVER['REMOTE_ADDR'])->orderBy('id', 'DESC')->get());
        });
        view()->composer('frontend.include.header', function($view) {
            $view->with('cart', Cart::where('ip', $_SERVER['REMOTE_ADDR'])->orderBy('id', 'DESC')->first());
        });
        view()->composer('frontend.include.header', function($view) {
            $view->with('products', Product::orderBy('id', 'DESC')->get());
        });
    }
}

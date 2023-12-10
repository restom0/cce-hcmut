<?php

namespace App\Providers;

use App\Models\ProductType;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        view()->composer("layouts.header", function ($view) {
            $loai_sanpham = ProductType::all();
            $view->with("loai_sanpham", $loai_sanpham);
        });
        view()->composer(['layouts.header', 'page.dathang'], function ($view) {
            if (Session('cart')) {
                $oldcart = Session::get('cart');
                $cart = new Cart($oldcart);
                Session::get('cart');

                $view->with([
                    'cart' => Session::get('cart'), 'product_cart' => $cart->items,
                    'totalprice' => $cart->totalPrice,
                    'totalqty' => $cart->totalQty
                ]);
            }
        });
    }
}

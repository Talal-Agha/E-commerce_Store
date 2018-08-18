<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       Schema::defaultStringLength(191);

        view()->composer('layouts.subas.elements.top-nav', function($view){
            $view->with('categories',\App\categories::all());
            $view->with('brands',\App\brands::orderBy('brandName', 'asc')->get());
             $view->with('cartCount',\App\Http\Controllers\carts::total());
             $view->with('cartProducts',\App\Http\Controllers\carts::totalProducts());
             $view->with('cartAmount',\App\Http\Controllers\carts::totalAmount());
             $view->with('totalProductsInWishListOfUser',\App\Http\Controllers\WishListController::totalProductsInWishListOfUser());
             $view->with('brands',\App\brands::get());
        });
         view()->composer('layouts.cart.cartmodel', function($view){
             $view->with('modalProducts',\App\Http\Controllers\carts::totalProducts());
             $view->with('modalAmount',\App\Http\Controllers\carts::totalAmount());
        });
         view()->composer('layouts.subas.elements.widget-categories', function($view){
            $view->with('categories',\App\categories::all());
        });
        view()->composer('layouts.subas.elements.cartTotalCard', function($view){
            $view->with('cartModelValue',\App\Http\Controllers\carts::totalBillAtributes());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

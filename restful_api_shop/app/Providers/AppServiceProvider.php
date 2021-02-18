<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Mail;
use App\Models\Product;
use App\Mail\UserCreated;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Product::updated(function($product){
            if($product->quantity==0 && $product->isAvailable()){
                $product->status = Product::UNAVAILABLE_PRODUCT;

                $product->save();
            };
        });
        User::created(function($user){
           Mail::to($user)->send(new UserCreated($user));
        });
    }
}

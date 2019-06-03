<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductType;
use App\Product;
use App\Cart;
use Session;

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
        view()->composer('page.header',function ($view){

            $loai_sp = ProductType::all();   

            $view->with('loai_sp',$loai_sp);
        });
        view()->composer(['page.header','page.checkout'],function($view)
        {
            if(Session('cart'))
            {
                $oldcart=Session::get('cart');
                $cart=new Cart($oldcart);
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,
                'totalQty'=>$cart->totalQty]);
            }
        });
        view()->composer('page.loai_sanpham',function ($view1){

            $loai_sp = ProductType::all();

            $view1->with('loai_sp',$loai_sp);
        });
        view()->composer('page.loai_sanphamall',function ($view2){

            $loai_sp = ProductType::all();

            $view2->with('loai_sp',$loai_sp);
        });
        view()->composer('page.loai_sanphamall',function ($view3){

            $sp_all = Product::all();

            $view3->with('sp_all',$sp_all);
        });

        view()->composer('page.loai_sanphamall',function ($view4){

            $new_product= Product::where('new',1)->paginate(8);

            $view4->with('new_product',$new_product);
        });
        
        

       

    }
}

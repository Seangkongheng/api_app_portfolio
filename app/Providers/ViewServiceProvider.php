<?php

namespace App\Providers;

use App\Models\Brand\Brand;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('layouts.master',function ($view){
            $brands=Brand::all();
            $view->with('brands',$brands);
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Validator::extend('alpha_spacex', function($attribute, $value)
        {   
            // exi('xxx');
            // return preg_match('/^[\pL\s]+$/u', $value);
            return preg_match('/^[-a-zA-Z0-9 .,"]+$/', $value)==1?true:false;

            // return true;
        });
        \Validator::extend('isDateId', function($attribute, $value)
        {   
            // return !isDateId($value) ;
            return isDateId($value) ;
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

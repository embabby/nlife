<?php

namespace App\Providers;
use App\Company;
use Illuminate\Support\Facades\Auth;
use View;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer([
            'layouts.companies',
        ], function($view)
        {
            $view->with('company', Auth::guard('employer')->user()->company);
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

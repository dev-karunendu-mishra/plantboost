<?php

namespace App\Providers;

use App\Models\DeliveryOption;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $siteData = Setting::first();
        $deliveryOptions = DeliveryOption::all();
        $states = DeliveryOption::select('state')->distinct()->get();
        View::share('siteData', $siteData);
        View::share('deliveryOptions', $deliveryOptions);
        View::share('states', $states);
    }
}

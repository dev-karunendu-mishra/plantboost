<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use App\Models\DeliveryOption;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Support\Facades\View;

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
        $sliders = Slider::all();
        $testimonials = Testimonial::with('images')->get();
        View::share('siteData', $siteData);
        View::share('deliveryOptions',$deliveryOptions);
        View::share('states',$states);
        View::share('sliders',$sliders);
        View::share('testimonials',$testimonials);
    }
}

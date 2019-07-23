<?php

namespace App\Providers;

use App\Event;
use App\Observers\EventObserver;
use Illuminate\Support\ServiceProvider;

class EloquetEventServicePrivider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Event::observe(EventObserver::class);
    }
}

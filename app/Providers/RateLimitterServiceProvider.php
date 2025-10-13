<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class RateLimitterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        RateLimiter::for('limiter', function (Request $request) {
            return Limit::perMinute(10)->by($request->user() ? $request->user()->id : $request->ip());
        });
    }
}

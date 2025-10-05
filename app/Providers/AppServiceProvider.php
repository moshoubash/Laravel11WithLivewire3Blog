<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Like;
use App\Observers\LikeObserver;
use Illuminate\Support\Facades\Event;
use App\Events\UserRegistered;
use App\Listeners\SendWelcomeMessage;

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
        Event::listen(UserRegistered::class, [SendWelcomeMessage::class, 'handle']);

        Like::observe(LikeObserver::class);
    }
}

<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\UserActivity;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use App\Listeners\UserActivityListener;
use App\Listeners\LoginActivityListener;
use App\Listeners\LogoutActivityListener;
use App\Listeners\RegistrationActivityListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            RegistrationActivityListener::class,
        ],
        Login::class => [
            LoginActivityListener::class,
        ],
        Logout::class => [
            LogoutActivityListener::class,
        ],
        UserActivity::class => [
            UserActivityListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

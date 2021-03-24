<?php

namespace App\Listeners;

use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class LoginActivityListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  LoginActivity  $event
     * @return void
     */
    public function handle(Login $event)
    {
        // DB::table('system_logs')->insert([
        //     'action' => 'login',
        //     'description' => 'Login by '.$event->user->username,
        //     'login_start' => Carbon::now(),
        //     'login_end' => null,
        //     'user_id' => $event->user->id,
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);
    }
}

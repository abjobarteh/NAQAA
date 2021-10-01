<?php

namespace App\Listeners;

use App\Events\RegistrationActivity;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class RegistrationActivityListener
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
     * @param  RegistrationActivity  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        // DB::table('system_logs')->insert([
        //     'action' => 'login',
        //     'description' => 'New Registration and login by '.$event->user->username,
        //     'login_start' => Carbon::now(),
        //     'login_end' => null,
        //     'user_id' => $event->user->id,
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);
    }
}

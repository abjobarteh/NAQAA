<?php

namespace App\Listeners;

use Carbon\Carbon;
use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class LogoutActivityListener
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
     * @param  LogoutActivity  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        if(DB::table('system_logs')->where('user_id',$event->user->id)->whereNull('login_end')->exists()){
            DB::table('system_logs')->where('user_id',$event->user->id)->whereNull('login_end')
                ->update([
                    'login_end' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
        }
        
    }
}

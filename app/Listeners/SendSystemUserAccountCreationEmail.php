<?php

namespace App\Listeners;

use App\Events\SystemUserAccountCreatedEvent;
use App\Mail\AccountCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendSystemUserAccountCreationEmail implements ShouldQueue
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
     * @param  SystemUserAccountCreatedEvent  $event
     * @return void
     */
    public function handle(SystemUserAccountCreatedEvent $event)
    {
        Mail::to('biranjobe69@gmail.com')->send(new AccountCreated($event->user));
    }
}

<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\Usermail;
use App\Notifications\NewUserNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;

class NewUserListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {   
         Notification::send($event->user, new NewUserNotification());
    }
}

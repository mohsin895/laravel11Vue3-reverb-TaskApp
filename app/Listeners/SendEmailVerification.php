<?php

namespace App\Listeners;

use App\Events\NewUserCreate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\SendMail;
use Mail;

class SendEmailVerification
{
    /**
     * Create the event listener.
     */

    public function __construct()
    {
      
    }

    /**
     * Handle the event.
     */
    public function handle(NewUserCreate $event): void
    {
        $user = $event->user;
        Mail::to($event->user->email)->send(new SendMail($user));
    }
}

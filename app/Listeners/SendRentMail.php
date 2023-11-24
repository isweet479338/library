<?php

namespace App\Listeners;

use App\Events\RentEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\RentMail;
use Illuminate\Support\Facades\Mail;


class SendRentMail
{
     use InteractsWithQueue;


    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
     public function handle(RentEvent $event)
    {
        // Send email to the registered user
        Mail::to($event->user->email)->send(new RentMail($event->user));
    }
}

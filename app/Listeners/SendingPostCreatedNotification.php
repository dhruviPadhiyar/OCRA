<?php

namespace App\Listeners;

use App\Events\SendPostCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendingPostCreatedNotification implements ShouldQueue
{
    // use InteractsWithQueue;
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
    public function handle(SendPostCreatedNotification $event)
    {
        $event->notification;
        logger("notification added successfully!");
    }
}

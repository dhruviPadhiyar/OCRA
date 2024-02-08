<?php

namespace App\Services;

use App\Events\SendPostCreatedNotification;
use App\Models\Notification;
use Auth;

class NotificationService
{
    
    public function __construct()
    {
        logger("NotificationService");
    }
    public function create($post,$subject)
    {
        $userId = Auth::user()->id;
        $isRead = 0;

        $notification = new Notification;
        $notification->user_id = $userId;
        $notification->post_id = $post->id;
        $notification->subject = $subject;
        $notification->is_read = $isRead;
        $notification->save();

        // calling the event with queue
        SendPostCreatedNotification::dispatch($notification);
        // calling the event
        // event(new SendPostCreatedNotification($notification));
    }
  
}

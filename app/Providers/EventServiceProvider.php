<?php

namespace App\Providers;

use App\Events\NewPost;
use App\Events\PostUpdated;
use App\Events\SendPostCreatedNotification;
use App\Listeners\ModifiedPost;
use App\Listeners\SendingPostCreatedNotification;
use App\Listeners\SendPostNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use function Illuminate\Events\queueable;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Event\PostCreated' => [
            'App\Listener\NewPost'
        ],
        
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        // manually register the eivents
        Event::listen(
            PostUpdated::class,
            ModifiedPost::class,
        );
        Event::listen(
            SendPostCreatedNotification::class,
            SendingPostCreatedNotification::class,
        );
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}

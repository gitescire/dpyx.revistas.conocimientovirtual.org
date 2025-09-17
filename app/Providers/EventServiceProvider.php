<?php

namespace App\Providers;

use App\Events\EvaluationFinishedEvent;
use App\Listeners\RequestEvaluatorListener;
use App\Models\Evaluation;
use App\Observers\EvaluationObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        EvaluationFinishedEvent::class => [
            RequestEvaluatorListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Evaluation::observe(EvaluationObserver::class);
    }
}

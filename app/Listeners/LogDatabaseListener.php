<?php

namespace App\Listeners;

use App\Services\DatabaseLogger;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Log\Events\MessageLogged;
use Illuminate\Queue\InteractsWithQueue;

class LogDatabaseListener
{
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
    public function handle(MessageLogged $event): void
    {
        DatabaseLogger::log($event->level, $event->message, $event->context);
    }
}

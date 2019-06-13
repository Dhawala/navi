<?php

namespace App\Providers\App\Listeners;

use App\Providers\App\Events\CancellationEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CancellationNotification
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
     * @param  CancellationEvent  $event
     * @return void
     */
    public function handle(CancellationEvent $event)
    {
        //
    }
}

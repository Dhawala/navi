<?php

namespace App\Listeners;

use App\Events\AllocationEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AllocationMessage
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
     * @param  AllocationEvent  $event
     * @return void
     */
    public function handle(AllocationEvent $event)
    {
        var_dump($event->allocation);
    }
}

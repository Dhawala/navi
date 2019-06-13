<?php

namespace App\Listeners;

use App\Events\ScheduleCancellationApprovalEventTrigger;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ScheduleCancellationApprovalEventListner
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
     * @param  ScheduleCancellationApprovalEventTrigger  $event
     * @return void
     */
    public function handle(ScheduleCancellationApprovalEventTrigger $event)
    {
        //
    }
}

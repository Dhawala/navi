<?php

namespace App\Providers\App\Listeners;

use App\Providers\App\Events\ApprovalEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApprovalNotificationListner
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
     * @param  ApprovalEvent  $event
     * @return void
     */
    public function handle(ApprovalEvent $event)
    {
        //
    }
}

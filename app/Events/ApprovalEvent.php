<?php

namespace App\Events;

use App\AllocationCancellation;
use App\Http\Controllers\CounterController;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ApprovalEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $allocationCancellation;
    public $cancellationCount;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(AllocationCancellation $allocationCancellation)
    {
        $this->cancellationCount = CounterController::scheduleCancellationRequestCount();
        $this->allocationCancellation = $allocationCancellation;
        $this->allocationCancellation->load('allocation.schedule','lecturer.user','user');

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('approve');
    }
}

<?php

namespace App\Events;

use App\Allocation;
use App\Http\Controllers\CounterController;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Auth;

class AllocationEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $allocation;
    public $allocationCount;

    /**
     * Create a new event instance.
     *
     * @param Allocation $allocation
     */
    public function __construct(Allocation $allocation)
    {
        $this->allocation = $allocation;
        $this->allocation->load('schedule','lecturer.user');
        $this->allocationCount = CounterController::allocationCount();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //admins get all notifications
            return new Channel('allocation');

        //return new Channel('allocation');
        //return new PrivateChannel('Allocation.'.$this->allocation->id);
    }
}

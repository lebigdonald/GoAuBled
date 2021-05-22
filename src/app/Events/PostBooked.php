<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PostBooked
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reservation;
    public $bookingType;
    public $bookingId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($booking, $bookingType, $bookingId)
    {
        $this->reservation = $booking;
        $this->bookingType = $bookingType;
        $this->bookingId = $bookingId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}

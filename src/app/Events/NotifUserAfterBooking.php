<?php

namespace App\Events;

use App\Models\Post\Reservation;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotifUserAfterBooking
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reservation;
    public $bookingType;

    /**
     * Create a new event instance.
     *
     * @param $reservation
     */
    public function __construct($reservation, $bookingType)
    {
        $this->reservation = $reservation;
        $this->bookingType = $bookingType;
    }
}

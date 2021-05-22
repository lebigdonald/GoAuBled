<?php

namespace App\Listeners;

use App\Events\BookingWasConfirmed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Snowfire\Beautymail\Beautymail;

class NotifyUserBookingWasConfirmed
{
    /**
     * @var Beautymail
     */
    private $beautify;

    /**
     * Create the event listener.
     *
     * @param Beautymail $beautify
     */
    public function __construct(Beautymail $beautify)
    {
        $this->beautify = $beautify;
    }

    /**
     * Handle the event.
     *
     * @param  BookingWasConfirmed  $event
     * @return void
     */
    public function handle(BookingWasConfirmed $event)
    {
        $event->booking->bookedObjects = json_decode($event->booking->bookedObjects);
        $data = array_merge($event->user->toArray(), $event->booking->toArray());

        $this->beautify->send('emails.post.booking.confirmedPost', $data, function($message) use ($event) {
            $message
                ->from('team@goaubled.com')
                ->to($event->user['email'], $event->user['name'])
                ->subject('Votre Reservation a été valider');
        });
    }
}

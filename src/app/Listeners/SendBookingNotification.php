<?php

namespace App\Listeners;

use App\Events\NotifUserAfterBooking;
use App\Events\PostBooked;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Snowfire\Beautymail\Beautymail;

class SendBookingNotification
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
     * @param PostBooked $event
     * @return void
     */
    public function handle(PostBooked $event)
    {
        $template = 'emails.post.booking.travel';

        if ($event->bookingType === 'travel') {
            $data = [
                'user' => $event->reservation['user']['name'],
                'owner' => $event->reservation['post']['user']['name'],
                'dateFrom' => $event->reservation['post']['dateFrom'],
                'objects' => json_decode($event->reservation['bookedObjects']),
                'from' => $event->reservation['post']['from'],
                'to' => $event->reservation['post']['to'],
                'bookingId' => $event->bookingId,
                'confirmLink' => route('booking.confirmation', ['id' => (int)$event->reservation['post']['id'], 'toNotifyUser' => (int)$event->reservation['user']['id'] ]),
                'cancelLink' => route('booking.confirmation', ['id' => (int)$event->reservation['post']['id'], 'toNotifyUser' => (int)$event->reservation['user']['id'] ])
            ];
        } else {
            $data = [
                'user' => $event->reservation['user']['name'],
                'owner' => $event->reservation['post']['user']['name'],
                'from' => $event->reservation['post']['from'],
                'to' => $event->reservation['post']['to'],
                'dateFrom' => $event->reservation['post']['dateFrom'],
                'url' => route('accueil'),
                'objects' => json_decode($event->reservation['bookedObjects']),
                'kilos' => $event->reservation['kilos'],
                'booking' => ''
            ];

            $template = 'emails.post.booking.coli';
        }
        $this->beautify->send($template, $data, function($message) use ($event) {
            $message
                ->from('team@goaubled.com')
                ->to($event->reservation['post']['user']['email'], $event->reservation['post']['user']['name'])
                ->subject('Nouvelle reservation');
        });
    }
}

<?php

namespace App\Listeners;

use App\Events\newMemberInvitation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Snowfire\Beautymail\Beautymail;

class sendEmailInvitation
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
     * @param  newMemberInvitation  $event
     * @return void
     */
    public function handle(newMemberInvitation $event)
    {
        $this->beautify->send('emails.invitation', ['name' => $event->request['to']['name']], function($message) use ($event) {
            $message
                ->from($event->request['from']['email'])
                ->to($event->request['to']['email'], $event->request['to']['name'])
                ->subject('Invitation!');
        });
    }
}

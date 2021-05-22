<?php

namespace App\Listeners;

use App\Events\userMessage;
use App\Mail\userMessage as UserEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Snowfire\Beautymail\Beautymail;

class userMessageSend
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
     * @param  userMessage  $event
     * @return void
     */
    public function handle(userMessage $event)
    {
        $this->beautify->send('emails.userMessage', ['name' => $event->data['name'], 'content' => $event->data['content']], function($message) use ($event) {
            $message
                ->from($event->data['email'])
                ->to('team@goaubled.com', 'goaubled, team')
                ->subject('Nouveau message Utilisateur');
        });

    }
}

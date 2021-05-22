<?php

namespace App\Listeners;

use App\Events\Registered;
use Illuminate\Contracts\Container\BindingResolutionException;
use Snowfire\Beautymail\Beautymail;
use Snowfire\Beautymail\BeautymailFacade;

class SendEmailWelcomeNotification
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
     * @param Registered $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $this->beautify->send('emails.welcome', ['name' => $event->data['name']], function($message) use ($event) {
            $message
                ->from('team@goaubled.com')
                ->to($event->data['email'], $event->data['name'])
                ->subject('Email de bienvenue');
        });
    }
}

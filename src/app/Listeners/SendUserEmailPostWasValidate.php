<?php

namespace App\Listeners;

use App\Events\UserNotifyPostValidate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Snowfire\Beautymail\Beautymail;

class SendUserEmailPostWasValidate
{
    /**
     * @var Beautymail
     */
    private $beautify;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Beautymail $beautify)
    {
        $this->beautify = $beautify;
    }

    /**
     * Handle the event.
     *
     * @param  UserNotifyPostValidate  $event
     * @return void
     */
    public function handle(UserNotifyPostValidate $event)
    {
        $this->beautify->send('emails.post.validation', ['user' => $event->user, 'post' => $event->post], function($message) use ($event) {
            $message
                ->from('team@goaubled.com')
                ->to($event->user['email'], $event->user['name'])
                ->subject('Votre Annonce a ete valider par les admins');
        });
    }
}

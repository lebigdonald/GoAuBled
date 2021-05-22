<?php

namespace App\Listeners;

use App\Events\PaymentCompleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUserPaymentSuccesfully
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PaymentCompleted  $event
     * @return void
     */
    public function handle(PaymentCompleted $event)
    {
        //
    }
}

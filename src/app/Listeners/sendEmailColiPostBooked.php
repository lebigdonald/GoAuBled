<?php

namespace App\Listeners;

use App\Events\PostBooked;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class sendEmailColiPostBooked
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
     * @param  PostBooked  $event
     * @return void
     */
    public function handle(PostBooked $event)
    {
        //
    }
}

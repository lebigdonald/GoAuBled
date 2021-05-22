<?php

namespace App\Providers;

use App\Events\BookingWasConfirmed;
use App\Events\newMemberInvitation;
use App\Events\NotifUserAfterBooking;
use App\Events\PaymentCompleted;
use App\Events\Post\PacketCreate;
use App\Events\Post\TravelCreate;
use App\Events\PostBooked;
use App\Events\Registered;
use App\Events\userMessage;
use App\Events\UserNotifyPostValidate;
use App\Listeners\NotifyUserBookingWasConfirmed;
use App\Listeners\NotifyUserPaymentSuccesfully;
use App\Listeners\Post\SavePacketCreate;
use App\Listeners\Post\SaveTravelPost;
use App\Listeners\SendBookingNotification;
use App\Listeners\sendEmailInvitation;
use App\Listeners\SendEmailWelcomeNotification;
use App\Listeners\SendUserEmailPostWasValidate;
use App\Listeners\userMessageSend;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailWelcomeNotification::class,
        ],
        NotifUserAfterBooking::class => [
            SendBookingNotification::class,
        ],
        userMessage::class => [
            userMessageSend::class,
        ],
        TravelCreate::class => [
            SaveTravelPost::class,
        ],
        PacketCreate::class => [
            SavePacketCreate::class,
        ],
        UserNotifyPostValidate::class => [
            SendUserEmailPostWasValidate::class,
        ],
        newMemberInvitation::class => [
            sendEmailInvitation::class
        ],
        PostBooked::class => [
            SendBookingNotification::class
        ],
        BookingWasConfirmed::class => [
            NotifyUserBookingWasConfirmed::class
        ],
        PaymentCompleted::class => [
            NotifyUserPaymentSuccesfully::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

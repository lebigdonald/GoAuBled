<?php


namespace App\Http\Controllers\Booking;


use App\Models\Post\Reservation;

class PayPalPaymentController
{
    public function thankYou(Reservation $reservation)
    {
        $newTotalKilo = $reservation->post->kilo - json_decode($reservation->bookedObjects)->kilo;

        //Update post
        $reservation->post()->update([
           'kilo' => $newTotalKilo
        ]);

        $reservation->update([
            'status' => 'payed'
        ]);

        if ($reservation->post->kilo <= 0) {
            $reservation->post()->update([
                'publish' => false
            ]);
        }

        return view('booking.confirmPayment', compact('reservation'));
    }

    public function cancel()
    {
        return 'rejetez';
    }

}

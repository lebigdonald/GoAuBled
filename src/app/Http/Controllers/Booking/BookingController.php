<?php

namespace App\Http\Controllers\Booking;

use App\Events\BookingWasConfirmed;
use App\Events\PostBooked;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Post\Reservation;
use App\Models\User;
use App\Payment\BuyWithPaypal;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
/**
 * Class BookingController
 * @package App\Http\Controllers\Booking
 */
class BookingController extends Controller
{
    /**
     * @param $slug
     * @param $user_id
     * @return Application|Factory|View
     */
    public function detail($slug, $user_id) {

        $post = Post::where('slug', $slug)->first();
        $user = User::find($user_id);

        if ($post->categorie_id == 2) {

            return view('booking.travel', compact('post', 'user'));
        }

        return view('booking.coli', compact('post', 'user'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function booking(Request $request)
    {
        if ($request->get('bookingType') === 'coli') {
            $data = [
                'user_id' => Auth::user()->id,
                'post_id' => $request->get('post'),
                'travel_id' => $request->get('form')['selectedPost'][0]['id'],
                'reservation_date' => Carbon::now(),
                'validation_date'  => Carbon::now(),
                'message'  => $request->get('form')['message'],
                'bookedObjects' => $request->get('form')['takenObjects'],
            ];
        } else {
            $data = [
                'user_id' => Auth::user()->id,
                'post_id' => $request->get('post'),
                'bookedObjects' => json_encode($request->get('form')),
                'reservation_date' => Carbon::now()
            ];
        }


        $booking = Reservation::create($data);

        Event::dispatch(new PostBooked($booking, $request->get('bookingType'), $booking->id));

        // notifier le proprietaire du post. que le post a ete reserver.

        return $booking;

    }

    /**
     * @throws \ErrorException
     */
    public function confirm($postId, $userId, Request $request)
    {
        // send Notiy message
        $user = User::find($userId);
        $post = Post::find($postId);
        $booking = Reservation::find($request->get('bookingId'));

        if ($booking->status !== 'confirmed') {

            //update Booking
            $booking->update([
                'status' => 'confirmed'
            ]);

            //notify User
            Event::dispatch(new BookingWasConfirmed($user, $booking));

            //redirect to post
            return redirect($post->path);
        }

        throw new \ErrorException('Cette reservation a deja été valider.');

    }

    public function cancel(Post $post, User $user)
    {
        // send Notify message

        dd($post, $user);
    }

    public function pay(User $user, Reservation $reservation)
    {
        $buyWithPaypal = new BuyWithPaypal($this->calculateSumToPay($reservation), $reservation);

        return redirect($buyWithPaypal->pay());
    }

    public function calculateSumToPay(Reservation $reservation): float
    {
        $ware = json_decode($reservation->bookedObjects);
        $post = json_decode($reservation->post->objects);
        $kiloPrice = $reservation->post->prix;

        $kilo = $ware->kilo ? ($ware->kilo * $kiloPrice) : 0;
        $envelopes = $ware->envelopes ? $this->getPriceWithId($post, 1, $ware->envelopes) : 0;
        $laptops = $ware->laptops ? $this->getPriceWithId($post, 2, $ware->envelopes) : 0;
        $phones = $ware->phones ? $this->getPriceWithId($post, 3, $ware->envelopes) : 0;

        return ($kilo + $envelopes + $laptops + $phones);
    }

    public function getPriceWithId(array $objects, $id, $quantity): float
    {
        Collection::make($objects)->each(function ($item) use ($id, $quantity) {
            return ($id == $item->id) ? ($item->price * $quantity) : 0;
        });

        return 0;
    }
}

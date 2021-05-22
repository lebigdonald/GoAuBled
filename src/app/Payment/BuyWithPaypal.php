<?php

namespace App\Payment;

use App\Models\Post\Reservation;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\Transactions;

class BuyWithPaypal
{
    /**
     * @var float
     */
    private $amount;
    /**
     * @var Reservation
     */
    private $reservation;

    /**
     * BuyWithPaypal constructor.
     * @param float $amount
     * @param Reservation $reservation
     */
    public function __construct(float $amount, Reservation $reservation)
    {
        $this->amount = $amount;
        $this->reservation = $reservation;
    }

    public function pay(): ?string
    {
        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                config('paypal','')['live']['client_id'],
                config('paypal','')['live']['client_secret'],
            )
        );
        $apiContext->setConfig(
            config('paypal','')['sandbox']
        );

        $details = (new Details())
            ->setSubtotal($this->amount);

        $amount = (new Amount())
            ->setCurrency('EUR')
            ->setDetails($details)
            ->setTotal($this->amount);

        $item = (new Item())
            ->setName('Goaubled')
            ->setCurrency('EUR')
            ->setPrice($this->amount)
            ->setQuantity(1);
        $list = new  ItemList();

        $list->addItem($item);

        $tansation = (new Transaction())
            ->setAmount($amount)
            ->setItemList($list)
            ->setDescription('Goaubled')
            ->setCustom('Demo - 1');

        $redirecturi = (new RedirectUrls())
            ->setReturnUrl(route('thankYou',['reservation' => $this->reservation->id]))
            ->setCancelUrl(route('cancel',['reservation' => $this->reservation->id]));

        $payment = new Payment();
        $payment->setTransactions(new Transactions([$tansation]));
        $payment->setIntent('sale');
        $payment->setRedirectUrls($redirecturi);
        $payment->setPayer((new Payer())->setPaymentMethod('paypal'));
        try {
            $payment->create($apiContext);
            return $payment->getApprovalLink();
        } catch (PayPalConnectionException $e) {
            // implement flash message
            var_dump(json_decode($e->getData()));
        }
    }

}

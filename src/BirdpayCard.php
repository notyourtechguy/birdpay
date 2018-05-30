<?php
/**
 * Created by PhpStorm.
 * User: falc
 * Date: 5/29/18
 * Time: 5:27 PM
 */

namespace Notyourtechguy\Birdpay;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7;

class BirdpayCard
{
    public $number;
    public $expMonth;
    public $expYear;
    public $cvc;

    public function __construct($number, $expMonth, $expYear, $cvc)
    {
        $this->number = $number;
        $this->expMonth = $expMonth;
        $this->expYear = $expYear;
        $this->cvc = $cvc;
    }

    public function charge()
    {
        $this->createTokenFromCard();
    }

    public function createTokenFromCard()
    {
        $service = resolve(BirdpayService::class);
        $response = $service->client->request('POST', 'payment-tokens', [
            'headers' => [
                'Authorization' => 'Basic ' . $service->getPublicKey()
            ],
            'json' => [
                'card' => $this,
            ]
        ]);

        return $response->getBody()->getContents();
//        try {
//
//        } catch (ClientException $e) {
//            echo Psr7\str($e->getRequest());
//            if ($e->hasResponse()) {
//                echo Psr7\str($e->getResponse());
//            }
//        }
    }
}

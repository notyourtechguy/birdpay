<?php
/**
 * Created by PhpStorm.
 * User: falc
 * Date: 5/29/18
 * Time: 3:22 PM
 */

namespace Notyourtechguy\Birdpay;

use GuzzleHttp\Client;

class BirdpayService
{
    public $client;

    protected $public_key;
    protected $secret_key;
    protected $environment;
    protected $endpoint;

    public function __construct()
    {
        if(config('birdpay.environment') === "SANDBOX")
        {
            $this->endpoint = "https://pg-sandbox.paymaya.com/payments/v1/";
        }
        else
        {
            $this->endpoint = "https://pg.paymaya.com/payments/v1/";
        }
        $this->client = new Client(['base_uri' => $this->endpoint]);
        $this->public_key = $this->encodeKeys(config('birdpay.public_key'));
        $this->secret_key = $this->encodeKeys(config('birdpay.secret_key'));
    }

    /**
     * @param $key
     * @return string
     */
    protected function encodeKeys($key)
    {
        return base64_encode($key . ':');
    }

    public function getSecret()
    {
        return $this->secret_key;
    }

    public function getPublicKey()
    {
        return $this->public_key;
    }
}

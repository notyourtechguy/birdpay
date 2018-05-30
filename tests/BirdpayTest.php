<?php

namespace Notyourtechguy\Birdpay;

use Notyourtechguy\Birdpay\Test\TestCase;

class BirdpayTest extends TestCase
{
    public function testCardCanCreateAToken()
    {
        $card = new BirdpayCard('5454545454545454', '05', '2019', '121');
        $response = $card->createTokenFromCard();

        $response->assertJsonStructure([
            'paymentTokenId',
            'state',
            'createdAt',
            'updatedAt',
            'issuer'
        ]);

    }
}

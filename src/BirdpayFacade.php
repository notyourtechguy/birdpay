<?php
namespace Notyourtechguy\Birdpay;

use Illuminate\Support\Facades\Facade;

class BirdpayFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'birdpay';
    }
}

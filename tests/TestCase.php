<?php
namespace Notyourtechguy\Birdpay\Test;

use Notyourtechguy\Birdpay\BirdpayFacade;
use Notyourtechguy\Birdpay\BirdpayServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    /**
     * Load package service provider
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [BirdpayServiceProvider::class];
    }
    /**
     * Load package alias
     * @param  \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Birdpay' => BirdpayFacade::class,
        ];
    }
}

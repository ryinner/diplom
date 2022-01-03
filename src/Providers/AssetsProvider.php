<?php

namespace App\Providers;

use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\Assets\Manager;

class AssetsProvider implements ServiceProviderInterface
{
    /**
     * @var string
     */
    protected $providerName = 'assets';

    /**
     * @param DiInterface $di
     *
     * @return void
     */
    public function register(DiInterface $di): void
    {
        $assetManager = new Manager();

        $di->setShared($this->providerName, function () use ($assetManager) {
            return $assetManager;
        });
    }
}
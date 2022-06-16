<?php

namespace App\Providers;

use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\Mvc\Model\Manager as ModelsManager;

class ModelsManagerProvider implements ServiceProviderInterface
{
    /**
     * @var string
     */
    protected $providerName = 'modelsManager';

    /**
     * @param DiInterface $di
     */
    public function register(DiInterface $di): void
    {
        $di->setShared($this->providerName, function () {
            return new ModelsManager();
        });
    }
}

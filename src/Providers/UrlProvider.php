<?php

namespace App\Providers;

use App\Application;
use Phalcon\Mvc\Url;
use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;

class UrlProvider implements ServiceProviderInterface
{
    /**
     * @var string
     */
    protected $providerName = 'url';

    /**
     * @param DiInterface $di
     *
     * @return void
     */
    public function register(DiInterface $di): void
    {
        $baseUri = $di->getShared('config')->path('application.baseUri');

        $di->setShared($this->providerName, function () use ($baseUri) {
            $url = new Url();
            $url->setBaseUri($baseUri);

            return $url;
        });
    }
}

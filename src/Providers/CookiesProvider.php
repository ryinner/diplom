<?php


namespace App\Providers;

use Phalcon\Di\DiInterface;
use Phalcon\Http\Response\Cookies;
use Phalcon\Di\ServiceProviderInterface;

class CookiesProvider implements ServiceProviderInterface
{
        /**
     * @var string
     */
    protected $providerName = 'cookies';

    /**
     * @param DiInterface $di
     */
    public function register(DiInterface $di): void
    {
        $salt = $di->getShared('config')->path('application.key');

        $di->set($this->providerName,
            function () use ($salt) {
                $cookies = new Cookies();
                $cookies->useEncryption(true);
                $cookies->setSignKey($salt);
                return $cookies;
            }
        );
    }
}

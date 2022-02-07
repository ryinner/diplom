<?php

namespace App\Providers;

use App\Plugins\Mailer;
use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;

class MailProvider implements ServiceProviderInterface
{
    /**
     * @var string
     */
    protected $providerName = 'mail';

    /**
     * @param DiInterface $di
     */
    public function register(DiInterface $di): void
    {
        $di->setShared($this->providerName, function () use ($di) {
            $config = $di->getShared('config')->get('mail');
            return new Mailer($config);
        });
    }
}

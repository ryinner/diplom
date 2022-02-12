<?php

namespace App\Providers;

use Exception;
use Phalcon\Events\Event;
use Phalcon\Di\DiInterface;
use Phalcon\Mvc\Dispatcher;
use App\Middleware\Authenticate;
use App\Plugins\AccessControllList;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\Mvc\Dispatcher\Exception as DispatchException;

class DispatcherProvider implements ServiceProviderInterface
{
    /**
     * @var string
     */
    protected $providerName = 'dispatcher';

    /**
     * @param DiInterface $di
     *
     * @return void
     */
    public function register(DiInterface $di): void
    {
        $di->set($this->providerName, function () use ($di) {
            $dispatcher = new Dispatcher();
            $dispatcher->setDefaultNamespace('App\Controllers');

            /** Middleware */ 
            $eventsManager = $di->getShared('eventsManager');
            $eventsManager->attach('dispatch', new Authenticate());
            $eventsManager->attach('dispatch', new AccessControllList($di));
            $eventsManager->attach('dispatch:beforeException', function (
                Event $event,
                $dispatcher,
                Exception $exception
            ) 
            {
                if ($exception instanceof DispatchException) {
                    $dispatcher->forward([
                        'controller' => 'error',
                        'action'     => 'error404'
                    ]);
                }
                return false;
            }
            );

            $dispatcher->setEventsManager($eventsManager);

            return $dispatcher;
        });
    }
}
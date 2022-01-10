<?php

namespace App\Providers;

use App\Application;
use Phalcon\Html\Escaper;
use Phalcon\Assets\Manager;
use Phalcon\Di\DiInterface;
use Phalcon\Html\TagFactory;
use Phalcon\Di\ServiceProviderInterface;

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
        /** @var Application $application */
        $application = $di->getShared(Application::APPLICATION_PROVIDER);
        /** @var string $rootPath */
        $rootPath = $application->getRootPath();

        $di->setShared($this->providerName, function () use ($rootPath) {
            return new Manager(new TagFactory(
                new  Escaper()
            ),
                [
                    'sourceBasePath' => $rootPath . '/assets/',
                    'targetBasePath' => $rootPath . '/public/assets/'
                ]
            );;
        });
    }
}
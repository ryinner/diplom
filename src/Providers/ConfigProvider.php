<?php

namespace App\Providers;

use Phalcon\Config;
use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;
use App\Application;

class ConfigProvider implements ServiceProviderInterface
{
    /**
     * @var string
     */
    protected $providerName = 'config';

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
            $config = include $rootPath . '/config/config.php';

            return new Config($config);
        });
    }
}

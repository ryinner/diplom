<?php

namespace App\Providers;

use App\Application;
use Phalcon\Di\DiInterface;
use ApiPackage\ApiController;
use Phalcon\Di\ServiceProviderInterface;

class ApiProvider implements ServiceProviderInterface
{
    /**
     * @var string
     */
    protected $providerName = 'api';

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

            return new ApiController($config['application']['publicUrl'].$config['api']['apiUri']);
        });
    }
}

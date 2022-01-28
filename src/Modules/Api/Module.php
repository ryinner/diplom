<?php

namespace App\Modules\Api;

use Phalcon\Di\DiInterface;
use Phalcon\Autoload\Loader;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $di = null)
    {

    }

    public function registerServices(DiInterface $di)
    {
        $dispatcher = $di->get('dispatcher');
        $dispatcher->setDefaultNamespace("App\Modules\Api\Controllers");
        $di->set('dispatcher', $dispatcher);
    }
}

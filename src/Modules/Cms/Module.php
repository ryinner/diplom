<?php

namespace App\Modules\Cms;

use Phalcon\Mvc\View;
use Phalcon\Di\DiInterface;
use Phalcon\Autoload\Loader;
use Phalcon\Mvc\View\Engine\Volt;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $di = null)
    {

    }

    public function registerServices(DiInterface $di)
    {
        $dispatcher = $di->get('dispatcher');
        $dispatcher->setDefaultNamespace("App\Modules\Cms\Controllers");  

        $viewsDir = $di->get('config')->path('application.viewsDir');
        $view = $di->get('view');
        $view->setViewsDir($viewsDir . '/cms/');

        $di->set('dispatcher', $dispatcher);
    }
}

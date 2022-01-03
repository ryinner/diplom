<?php
$router = new Phalcon\Mvc\Router();
$router->notFound(['controller' => 'error', 'action' => 'error404']);
// $router->mount(require 'api.php');
// $router->mount(require 'web.php');

return $router;
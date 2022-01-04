<?php
$router = new Phalcon\Mvc\Router(false);
$router->notFound(['controller' => 'error', 'action' => 'error404']);
require 'web.php';
// $router->mount(require 'api.php');

return $router;
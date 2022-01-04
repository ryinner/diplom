<?php
$router = new Phalcon\Mvc\Router();
$router->removeExtraSlashes(true);
// $router->add('/:controller', ['controller' => 1, 'action' => 'index']);
// $router->add('/:controller/:action/:params', ['controller' => 1, 'action' => 2, 'params' => 3]);
$router->notFound(['controller' => 'error', 'action' => 'error404']);
// Подключение всех уникальных маршрутов
require 'web.php';
// $router->mount(require 'api.php');

return $router;
<?php
// Создание маршрутов для модуля апи
$router->add('/Api/:controller/:action', [
    'module'     => 'api',
    'controller' => '1',
    'action'     => '2',
])->setName('api');

$router->add('/Api/:controller/:action/:params', [
    'module' => 'api',
    'controller' => 1,
    'action'     => 2,
    'params'     => 3,
])->setName('api-change-status');
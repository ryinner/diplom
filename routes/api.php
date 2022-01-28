<?php
// Создание маршрутов для модуля апи
$router->add('/api/:controller/:action', [
    'module'     => 'api',
    'controller' => '1',
    'action'     => '2',
])->setName('api');


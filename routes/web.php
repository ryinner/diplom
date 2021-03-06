<?php

// Base path
$router->add('/','Index::Index')->setName('Index');

// Base
$router->add('/:controller/:action/:params', [
    'controller' => 1,
    'action'     => 2,
    'params'     => 3,
])->setName('param-action');

// admin
$router->add('/Cms/:controller/:action', [
    'module'     => 'cms',
    'controller' => 1,
    'action'     => 2,
])->setName('Admin');

$router->add('/Cms/:controller/:action/:params', [
    'module' => 'cms',
    'controller' => 1,
    'action'     => 2,
    'params'     => 3,
])->setName('admin-change-status');
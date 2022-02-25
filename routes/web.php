<?php

// Base path
$router->add('/','Index::Index')->setName('Index');

// Base
$router->add('/:controller/Show/:params', [
    'controller' => 1,
    'action'     => 'Show',
    'params'     => 2,
])->setName('index-show');

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
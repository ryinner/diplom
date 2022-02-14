<?php

// Base path
$router->add('/','Index::index')->setName('index');

// admin
$router->add('/Cms/:controller/:action', [
    'module'     => 'cms',
    'controller' => '1',
    'action'     => '2',
])->setName('Admin');

$router->add('/cms/:controller/:action', [
    'module'     => 'cms',
    'controller' => '1',
    'action'     => '2',
])->setName('admin');
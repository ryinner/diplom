<?php

// Base path
$router->add('/','Index::Index')->setName('Index');

// admin
$router->add('/Cms/:controller/:action', [
    'module'     => 'cms',
    'controller' => '1',
    'action'     => '2',
])->setName('Admin');

<?php

namespace App\Controllers;

use App\Controllers\ControllerBase;

class IndexController extends ControllerBase
{
    public function initialize() 
    {
        parent::initialize();
    }

    public function indexAction()
    {
        var_dump("<h1>Hello!</h1>"); exit;
    }
}
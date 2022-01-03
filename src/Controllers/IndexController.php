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
        var_dump(1);exit;
    }

}
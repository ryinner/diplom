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
        $houses = $this->api->get('Houses/GetForIndex');

        $this->view->setVars(
            compact(
                'houses'
            ));
    }
}
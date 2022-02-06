<?php

namespace App\Modules\Api\Controllers;

use Phalcon\Mvc\Controller;

class ControllerApiBase extends Controller
{
    public function initialize()
    {
        $this->view->disable();
    }

    public function authAccess(): bool
    {
       return false; //check authentication
    }  
}

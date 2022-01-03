<?php

namespace App\Controllers;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize() 
    {
        $this->assets
            ->collection('main_css');

        $this->assets
            ->collection('main_js');
    }
}
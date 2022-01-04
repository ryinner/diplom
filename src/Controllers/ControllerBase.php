<?php

namespace App\Controllers;

use Phalcon\Mvc\Controller;

/**
 * ControllerBase родительский класс для всех контроллеров.
 */
class ControllerBase extends Controller
{
    public function initialize() 
    {
        $this->assets
            ->collection('main_css')
            ->setTargetPath('main.css')
            ->setTargetUri('assets/css/main.css')
            ->addCss('css/app.css')
            ->join(true);
        $this->assets
            ->collection('main_js')
            ->setTargetPath('main.js')
            ->setTargetUri('assets/js/main.js')
            ->addJs('js/app.js')
            ->join(true);
    }
}
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
            ->addCss('css/themes.css')
            ->addCss('css/fonts.css')
            ->addCss('css/app.css')
            ->join(true);
        $this->assets
            ->collection('main_js')
            ->addJs('js/app.js')
            ->join(true);
    }
}
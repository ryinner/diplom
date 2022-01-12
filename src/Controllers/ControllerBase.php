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
            ->addCss('css/layouts/public.css')
            ->join(true);
        $this->assets
            ->collection('main_js')
            ->addJs('js/app.js', null, true, ['type'=>'module'])
            ->join(true);
        // @todo Когда подключиться ACL сделать проверку от которой будет выбираться layout, либо как-то перенести на public и private контроллеры либо в модулях уже свои подключения, подумать
        $this->view->setTemplateAfter('public');
    }
}
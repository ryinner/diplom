<?php

namespace App\Controllers;

use stdClass;
use Phalcon\Mvc\Controller;
use Sinbadxiii\PhalconAuth\Middlewares\Accessicate;

/**
 * ControllerBase родительский класс для всех контроллеров.
 */
class ControllerBase extends Controller implements Accessicate
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

        $this->view->setTemplateAfter('public');

        $user = new stdClass;
        $user->auth = $this->auth->check();
        $user->login= $this->auth->user()->username;

        $this->view->setVar('user', json_encode($user));
    }

    public function authAccess(): bool
    {
       return false; //check authentication
    }  
}
<?php

namespace App\Modules\Cms\Controllers;

use stdClass;
use Phalcon\Mvc\Controller;

class ControllerCmsBase extends Controller
{
    public function initialize()
    {
        $this->assets
            ->collection('main_css')
            ->addCss('css/themes.css')
            ->addCss('css/fonts.css')
            ->addCss('css/app.css')
            ->addCss('css/layouts/private.css')
            ->join(true);
        $this->assets
            ->collection('main_js')
            ->addJs('js/app.js', null, true, ['type'=>'module'])
            ->join(true);

        $this->view->setTemplateAfter('private');

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

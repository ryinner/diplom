<?php

namespace App\Modules\Cms\Controllers;

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
            ->addCss('css/layouts/public.css')
            ->join(true);
        $this->assets
            ->collection('main_js')
            ->addJs('js/app.js', null, true, ['type'=>'module'])
            ->join(true);

        $this->view->setTemplateAfter('private');
    }

    public function authAccess(): bool
    {
       return false; //check authentication
    }  
}

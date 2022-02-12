<?php

namespace App\Modules\Cms\Controllers;

class IndexController extends ControllerCmsBase
{
    public function indexAction()
    {
        var_dump($this->acl);
    }
}

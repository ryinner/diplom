<?php

namespace App\Modules\Cms\Controllers;

use App\Models\Users;
use Phalcon\Paginator\Adapter\Model as Paginator;

class UsersController extends ControllerCmsBase
{
    public function indexAction()
    {
        $currentPage = $this->request->getQuery('page', 'int') ?? 1;

        $paginator = new Paginator([
            'model'  => Users::class,
            'limit' => 30,
            'page'  => $currentPage
        ]);

        $this->view->setVar('paginator', $paginator->paginate());
    }
}

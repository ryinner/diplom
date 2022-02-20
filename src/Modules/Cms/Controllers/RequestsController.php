<?php

namespace App\Modules\Cms\Controllers;

use App\Models\Requests;
use Phalcon\Paginator\Adapter\Model as Paginator;

class RequestsController extends ControllerCmsBase
{
    public function indexAction()
    {
        $currentPage = $this->request->getQuery('page', 'int') ?? 1;

        $paginator = new Paginator([
            'model'  => Requests::class,
            'limit' => 20,
            'page'  => $currentPage
        ]);

        $this->view->setVar('paginator', $paginator->paginate());
    }
}

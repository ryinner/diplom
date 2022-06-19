<?php

namespace App\Modules\Cms\Controllers;

use App\Models\Orders;
use App\Models\Statuses;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Throwable;

class OrdersController extends ControllerCmsBase
{
    public function indexAction()
    {
        $currentPage = $this->request->getQuery('page', 'int') ?? 1;

        $paginator = new Paginator([
            'model'  => Orders::class,
            'limit' => 30,
            'page'  => $currentPage
        ]);

        $this->view->setVar('paginator', $paginator->paginate());
    }
}

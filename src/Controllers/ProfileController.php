<?php

namespace App\Controllers;

use App\Models\Orders;
use Phalcon\Paginator\Adapter\Model as Paginator;

class ProfileController extends ControllerBase
{
    public function indexAction()
    {
        $currentPage = $this->request->getQuery('page', 'int') ?? 1;

        $paginator = new Paginator([
            'model'  => Orders::class,
            'parameters' => [
                'user_id = :id:',
                'bind' => ['id' => $this->auth->user()->id],
            ],
            'limit' => 30,
            'page'  => $currentPage
        ]);

        $this->view->setVar('paginator', $paginator->paginate());
    }
}

<?php

namespace App\Modules\Cms\Controllers;

use App\Models\Houses;
use Phalcon\Paginator\Adapter\Model as Paginator;

class HousesController extends ControllerCmsBase
{
    public function initialize() 
    {
        parent::initialize();
    }

    public function indexAction()
    {
        $currentPage = $this->request->getQuery('page', 'int') ?? 1;

        $paginator = new Paginator([
            'model'  => Houses::class,
            'limit' => 30,
            'page'  => $currentPage
        ]);

        $this->view->setVar('paginator', $paginator->paginate());
    }

    
    public function createAction()
    {
        
    }

    public function editAction($id)
    {
        
    }
}

<?php

namespace App\Controllers;

use App\Models\Houses;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Throwable;

class HousesController extends ControllerBase
{
    public function indexAction()
    {
        $currentPage = $this->request->getQuery('page', 'int', 1);
        $search = $this->request->get('search', 'string');

        $parametrs = ['status_id != 3'];
        
        if (!empty($search)) {
            $parametrs[0] .= ' AND adress LIKE (:search:)';
            $parametrs['bind'] = ['search' => '%'.$search.'%'];
        }

        $paginator = new Paginator([
            'model'  => Houses::class,
            'parameters' => $parametrs,
            'limit' => 8,
            'page'  => $currentPage
        ]);

        $this->view->setVar('paginator', $paginator->paginate());
    }

    public function showAction($id)
    {
        $house = Houses::findFirst($id);

        foreach ($house->images as $image) {
            $images[]['path'] = $image->path;
        }

        $this->view->setVar('house', $house);
        $this->view->setVar('images', json_encode($images));
    }
}

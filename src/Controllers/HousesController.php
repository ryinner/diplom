<?php

namespace App\Controllers;

use App\Models\Houses;
use Phalcon\Paginator\Adapter\Model as Paginator;

class HousesController extends ControllerBase
{
    public function indexAction()
    {
        $currentPage = $this->request->getQuery('page', 'int') ?? 1;

        $paginator = new Paginator([
            'model'  => Houses::class,
            'parameters' => [
                'status_id != 3'
            ],
            'limit' => 16,
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

<?php

namespace App\Modules\Cms\Controllers;

use App\Models\Houses;
use App\Models\Orders;
use Phalcon\Paginator\Adapter\Model as Paginator;

class OrdersController extends ControllerCmsBase
{
    public function indexAction()
    {
        $currentPage = $this->request->getQuery('page', 'int') ?? 1;

        $paginator = new Paginator([
            'model'  => Orders::class,
            'parameters' => [
                'manager_id = :id: AND status = "В работе"',
                'bind' => ['id' => $this->auth->user()->id],
            ],
            'limit' => 30,
            'page'  => $currentPage
        ]);

        $this->view->setVar('paginator', $paginator->paginate());
    }

    public function acceptAction($id)
    {
        $order = Orders::findFirst((int)$id);

        $order->status = "Принято";

        $house = Houses::findFirst($order->house_id);
        $house->status_id = 3;

        if ($house->save() && $order->save()) {
            return json_encode(['success' => true]);
        } else {
            return json_encode(['success' => false]);
        }
    }

    public function declineAction($id)
    {
        $order = Orders::findFirst((int)$id);

        $order->status = "Отклонено";

        if ($order->save()) {
            return json_encode(['success' => true]);
        } else {
            return json_encode(['success' => false]);
        }
    }
}

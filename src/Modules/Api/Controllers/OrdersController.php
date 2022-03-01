<?php

namespace App\Modules\Api\Controllers;

use App\Models\Orders;

class OrdersController extends ControllerApiBase
{
    public function createAction()
    {
        $post = $this->request->getPost();

        $orders = new Orders;

        $orders->user_id = $post['user_id'];
        $orders->manager_id = $post['manager_id'];
        $orders->house_id = $post['house_id'];

        if ($orders->save()) {
            return json_encode(['success' => true]);
        } else {
            return json_encode(['success' => false]);
        }
    }
}

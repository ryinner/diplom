<?php

namespace App\Modules\Api\Controllers;

use App\Models\Orders;
use App\Models\Statuses;

class OrdersController extends ControllerApiBase
{
    public function createAction(): string|false
    {
        $post = $this->request->getPost();

        $orders = new Orders;

        $orders->user_id = $post['user_id'];
        $orders->manager_id = $post['manager_id'];
        $orders->house_id = $post['house_id'];
        $orderCheck = Orders::findFirst([
            "conditions" => 'house_id = :house_id: AND user_id = :user_id:',
            'bind'  => [
                'user_id' => $post['user_id'],
                'house_id' => $post['house_id']
            ]
        ]);

        if ($orderCheck == null) {
            if ($orders->save()) {
                return json_encode(['success' => true]);
            } else {
                return json_encode(['success' => false, 'errors' => "Что-то пошло не так, повторите попытку позже"]);
            }
        } else {
            return json_encode(['success' => false, 'errors' => "Вы уже подали заявку"]);
        }
    }

    public function statusesAction()
    {
        $statuses = Statuses::find(['columns' => 'id, status',
        'id IN (4, 5, 6)'
        ]);

        return json_encode(['success' => true, 'statuses' => $statuses]);
    }

    public function changeStatusAction($id)
    {
        $status = Orders::findFirst($id);
        $status->status = json_decode(file_get_contents('php://input'))->status;
        $status->save();
    }
}

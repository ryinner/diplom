<?php

namespace App\Controllers;

use App\Models\Orders;

// @todo Выпилить и перенести все в норм место
class OrdersController extends ControllerBase
{
    public function deleteAction($id)
    {
        $order = Orders::findFirst((int)$id);

        if ($order->delete()) {
            return json_encode(['success' => true]);
        } else {
            return json_encode(['success' => false]);
        }
    }
}

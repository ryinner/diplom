<?php

namespace App\Modules\Api\Controllers;

use App\Models\Requests;
use App\Interfaces\CRUDInterface;

class RequestsController extends ControllerApiBase implements CRUDInterface
{
    public function getAction(): string|false
    {
        return json_encode([]);
    }

    public function createAction(): string|false
    {
        $data = json_decode(file_get_contents('php://input'));

        $request = new Requests();

        $request->name = $data->username;
        $request->phone = $data->phone;
        $request->problem = $data->message;

        $request->save();
        return json_encode(['success' => true]);
    }

    public function updateAction(int $id): string|false
    {
        return json_encode([]);
    }

    public function deleteAction(int $id): string|false
    {
        return json_encode([]);
    }
}

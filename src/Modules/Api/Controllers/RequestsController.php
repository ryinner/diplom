<?php

namespace App\Modules\Api\Controllers;

use App\Models\Requests;
use App\Interfaces\CRUDInterface;

class RequestsController extends ControllerApiBase implements CRUDInterface
{
    public function getAction(): string|false
    {
        $requests = Requests::find([
            "conditions" => "status = :status:",
            "bind"       => ["status" => Requests::NOTANSWERED],
            "limit"      => 8
        ]);

        return (json_encode([
            'success' => true,
            'requests' => $requests
        ]));
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

    public function updateAction($id): string|false
    {
        $request = Requests::findFirst((int)$id);

        $request->status = Requests::ANSWERED;
        $request->save();

        return json_encode([true]);
    }

    public function deleteAction(int $id): string|false
    {
        return json_encode([]);
    }
}

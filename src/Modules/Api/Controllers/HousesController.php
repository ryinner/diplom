<?php

namespace App\Modules\Api\Controllers;

use App\Interfaces\CRUDInterface;
use App\Models\Houses;
use stdClass;

class HousesController extends ControllerApiBase implements CRUDInterface
{
    public function initialize()
    {
        parent::initialize();
    }

    public function getAction(): string|false
    {
        return json_encode(Houses::find());
    }

    public function createAction(): string|false
    {
        $request = $this->request->get();
        $house = new Houses($request);
        $house->save();
        return json_encode([]);
    }

    public function updateAction(int $id): string|false
    {
        $house = Houses::findFirst($id);

        $house->save();
        return json_encode([]);
    }

    public function deleteAction(int $id): string|false
    {
        $house = Houses::findFirst($id);

        $house->delete();
        return json_encode([]);
    }

    public function getForIndexAction(): string|false
    {
        $houses = new stdClass;

        $houses->buyAble = Houses::find([
            'type = 2',
            'status = 1',
            'order' => 'created_at',
            'limit' => 4,
        ]);

        $houses->rentAble = Houses::find(
            [
                'type = 1',
                'status = 2',
                'order' => 'created_at',
                'limit' => 4,
            ]
        );

        return json_encode($houses);
    }
}

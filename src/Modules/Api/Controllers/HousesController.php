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

    public function createAction(): void
    {
        $request = $this->request->get();
        $house = new Houses($request);
        $house->save();
    }

    public function updateAction(int $id): void
    {
        $house = Houses::findFirst($id);

        $house->save();
    }

    public function deleteAction(int $id): void
    {
        $house = Houses::findFirst($id);

        $house->delete();
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

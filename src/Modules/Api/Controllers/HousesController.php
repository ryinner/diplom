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

    public function getForIndexAction(): void
    {
        $houses = new stdClass;

        $houses->buyAble = Houses::find([
            'type = 1',
            'status' => 'created_at'
        ]);

        $houses->rentAble = Houses::find(
            [
                'type = 2',
                'status' => 'created_at'
            ]
        );
    }
}

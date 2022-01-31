<?php

namespace App\Modules\Api\Controllers;

use App\Interfaces\CRUDInterface;
use App\Models\Houses;

class HousesController extends ControllerApiBase implements CRUDInterface
{
    public function initialize()
    {
        parent::initialize();
    }

    public function getAction(): void
    {
        echo json_encode(Houses::find());
    }

    public function createAction(): void
    {
        $request = $this->request->get();
        $house = new Houses($request);
        $house->save();
    }

    public function updateAction(int $id): void
    {
        
    }

    public function deleteAction(int $id): void
    {
        
    }
}

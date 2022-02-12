<?php

namespace App\Modules\Api\Controllers;

use App\Interfaces\CRUDInterface;

class RequestsController extends ControllerApiBase implements CRUDInterface
{
    public function getAction(): string|false
    {
        return json_encode([]);
    }

    public function createAction(): string|false
    {
        return json_encode([]);
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

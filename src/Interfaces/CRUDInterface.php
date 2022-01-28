<?php

namespace App\Interfaces;

use App\Models\BaseModel;

interface CRUDInterface
{
    public function getAction(): void;

    public function createAction(): void;

    public function updateAction(int $id): void;

    public function deleteAction(int $id): void;
}
<?php

namespace App\Interfaces;

use App\Models\BaseModel;

interface CRUDInterface
{
    public function getAction(): BaseModel;

    public function createAction(): void;

    public function updateAction(): void;

    public function deleteAction(): void;
}
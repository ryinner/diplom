<?php

namespace App\Interfaces;

interface CRUDInterface
{
    public function getAction(): string|false;

    public function createAction(): string|false;

    public function updateAction(int $id): string|false;

    public function deleteAction(int $id): string|false;
}
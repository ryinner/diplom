<?php

namespace App\Models;

class Roles extends BaseModel
{
    public int $id;

    public string $role;

    public function initialize()
    {
        $this->setSource('roles');
    }
}

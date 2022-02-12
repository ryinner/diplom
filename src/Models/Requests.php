<?php

namespace App\Models;

class Requests extends BaseModel
{
    public $id;

    public $name;

    public $phone;

    public $problem;

    public function initialize(): void
    {
        $this->setSource('requests');
    }
}

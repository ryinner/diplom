<?php

namespace App\Models;

class Requests extends BaseModel
{
    public const NOTANSWERED = 0; 

    public const ANSWERED = 1; 

    public $id;

    public $name;

    public $phone;

    public $problem;

    public $status;

    public function initialize()
    {
        $this->setSource('requests');
    }
}

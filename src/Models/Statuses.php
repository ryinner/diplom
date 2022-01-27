<?php

namespace App\Models;

class Statuses extends BaseModel
{
    public int $id;

    public string $status;

    public $created_at;
    
    public $updated_at;

    public function initialize()
    {
        $this->setSource('statuses');
    }
}
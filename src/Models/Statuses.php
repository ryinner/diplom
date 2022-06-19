<?php

namespace App\Models;

class Statuses extends BaseModel
{
    public $id;
    
    public $status;

    public $created_at;
    
    public $updated_at;

    public function initialize()
    {
        $this->setSource('statuses');
    }
}
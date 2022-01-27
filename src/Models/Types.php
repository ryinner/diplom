<?php

namespace App\Models;

class Types extends BaseModel
{
    public int $id;

    public string $type;

    public $created_at;
    
    public $updated_at;

    public function initialize()
    {
        $this->setSource('types');
    }
}

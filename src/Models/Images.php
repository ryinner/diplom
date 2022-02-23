<?php

namespace App\Models;

class Images extends BaseModel
{
    public $id;

    public $path;

    public $house_id;

    public $created_at;

    public $updated_at;

    public function initialize()
    {
        $this->setSource('images');
    }
}

<?php

namespace App\Models;

class Images extends BaseModel
{
    public int $id;

    public string $path;

    public string $alt;

    public int $house_id;

    public $created_at;

    public $updated_at;

    public function initialize()
    {
        $this->setSource('images');
    }
}

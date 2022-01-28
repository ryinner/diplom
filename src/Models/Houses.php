<?php

namespace App\Models;

class Houses extends BaseModel
{
    public int $id;

    public int $price;

    public string $description;

    public int $rooms;

    public string $adress;

    public int $square;

    public bool $is_new;

    public int $type_id;

    public int $status_id;

    public int $user_id;

    public $created_at;

    public $updated_at;

    public function initialize()
    {
        $this->setSource('houses');
    }
}

<?php

namespace App\Models;

class Houses extends BaseModel
{
    public const OLD_HOUSE = 0;
    public const NEW_HOUSE = 1;

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

        $this->hasMany('id', Images::class, 'houses_id', ['alias' => 'images']);
        $this->belongsTo('type_id', Types::class, 'id', ['alias' => 'types']);
        $this->belongsTo('status_id', Statuses::class, 'id', ['alias' => 'statuses']);
        $this->belongsTo('user_id', Users::class, 'id', ['alias' => 'users']);
    }
}

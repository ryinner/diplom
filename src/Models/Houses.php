<?php

namespace App\Models;

class Houses extends BaseModel
{
    public const OLD_HOUSE = false;
    public const NEW_HOUSE = true;

    public $id;

    public $price;

    public $description;

    public $rooms;

    public $adress;

    public $square;

    public $is_new;

    public $type_id;

    public $status_id;

    public $user_id;

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

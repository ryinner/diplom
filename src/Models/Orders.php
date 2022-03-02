<?php

namespace App\Models;

class Orders extends BaseModel
{
    public $id;

    public $user_id;

    public $house_id;

    public $manager_id;

    public $status;
    
    public $created_at;

    public $updated_at;

    public function initialize()
    {
        $this->setSource('orders');

        $this->belongsTo('user_id', Users::class, 'id', ['alias' => 'users']);
        $this->belongsTo('house_id', Houses::class, 'id', ['alias' => 'houses']);
    }

    public function getManager()
    {
        return Users::findFirst($this->manager_id);
    }
}

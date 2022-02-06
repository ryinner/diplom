<?php

namespace App\Models;

class ConfirmsEmails extends BaseModel
{
    public int $id;

    protected string $token;

    public bool $status;

    public int $user_id;

    public $created_at;

    public $updated_at;

    public function initialize()
    {
        $this->setSource('confirms_emails');

        $this->belongsTo('user_id', Users::class, 'id', ['alias' => 'users']);
    }

    public static function createToken()
    {
        return hash("sha256", date('d-m-y'));
    }
}

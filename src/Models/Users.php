<?php

namespace App\Models;

use Phalcon\Di\Di;
use Sinbadxiii\PhalconAuth\Contracts\RememberTokenInterface;
use Sinbadxiii\PhalconAuth\RememberToken\RememberTokenModel;

class Users extends BaseModel
{
    public int $id;

    public string $email;

    public string $username;

    public string $password;

    public string $first_name;

    public string $last_name;

    public $created_at;
    
    public $updated_at;

    public function initialize(): void
    {
        $this->setSource('users');

        $this->hasOne(
            'id',
            RememberTokenModel::class,
            'user_id',
            [
                'alias' => "remember_token"
            ]
        );
        $this->keepSnapshots(true);
    }

    public function setPassword(string $password): Users
    {
        $this->password = Di::getDefault()->getShared("security")->hash($password);
        return $this;
    }

    public function getAuthIdentifier(): int
    {
        return $this->id;
    }

    public function getAuthPassword(): string
    {
        return $this->password;
    }

    public function getRememberToken(string $token = null)
    {
        return $this->getRelated('remember_token', [
            'token=:token:',
            'bind' => ['token' => $token]
        ]);
    }

    public function setRememberToken(RememberTokenInterface $value): void
    {
        $this->remember_token = $value;
    }
}
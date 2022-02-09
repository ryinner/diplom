<?php

namespace App\Models;

use Phalcon\Di\Di;
use Sinbadxiii\PhalconAuth\Contracts\RememberTokenInterface;
use Sinbadxiii\PhalconAuth\RememberToken\RememberTokenModel;
use Sinbadxiii\PhalconAuth\Contracts\AuthenticatableInterface;

class Users extends BaseModel implements AuthenticatableInterface
{
    public $id;

    public $email;

    public $username;

    protected $password;

    public $first_name;

    public $last_name;

    public $phone;

    public $role_id;

    public $created_at;
    
    public $updated_at;

    public function initialize(): void
    {
        $this->setSource('users');

        $this->belongsTo(
            'role_id', 
            Roles::class, 
            'id', 
            [
                'alias' => 'roles'
            ]
        );

        $this->hasOne(
            'id',
            RememberTokenModel::class,
            'user_id',
            [
                'alias' => "remember_token"
            ]
        );

        $this->hasOne(
            'id',
            ConfirmsEmails::class,
            'user_id',
            [
                'alias' => 'confirms_emails'
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

    public function getRememberToken(string $token = null): null|false|RememberTokenInterface
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
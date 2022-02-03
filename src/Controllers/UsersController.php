<?php

namespace App\Controllers;

use App\Models\Users;

class UsersController extends ControllerBase
{
    public function createAction(): string|false
    {
        $data = $this->request->getPost();

        $email = $data->email;
        $login = $data->login;

        $checkUser = Users::find([
            'email' => $email,
            'login' => $login
        ]);

        if (count((array)$checkUser) > 0) {
            $answer['success'] = false;
            $answer['errors'][] = 'Такой пользователь уже есть.';
        }

        return json_encode($answer);
    }

    public function authAction()
    {
        
    }

    public function logoutAction()
    {
        
    }
}

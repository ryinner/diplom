<?php

namespace App\Modules\Api\Controllers;

use App\Models\Users;

class UsersController extends ControllerApiBase
{
    public function initialize()
    {
        parent::initialize();
    }

    public function createAction()
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
}

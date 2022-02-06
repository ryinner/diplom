<?php

namespace App\Modules\Api\Controllers;

use App\Models\Users;
use App\Models\ConfirmsEmails;

class UsersController extends ControllerApiBase
{
    public function initialize()
    {
        parent::initialize();
    }

    public function createAction()
    {
        $data = json_decode(file_get_contents('php://input'));

        $email = $data->email;
        $login = $data->login;

        $checkUser = Users::find([
            'email' => $email,
            'login' => $login
        ]);

        if (count((array)$checkUser) > 0) {
            return json_encode(
            ['success'=> false,
                'errors' => [
                    'loginError' => 'Такой пользователь уже есть.'
                ]
            ]);
        }
        
        $user = new Users;

        $user->assign((array)$data);
        $user->save();

        $emailVerify = new ConfirmsEmails;

        $emailVerify->user_id = $user->id;
        $emailVerify->status = 0;
        $emailVerify->token = ConfirmsEmails::createToken();

        $emailVerify->save();
        
        $answer = [
            'success' => true,
            'message' => 'На почту было отправлено письмо для подтверждения'
        ];
        return json_encode($answer);
    }
}

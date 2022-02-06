<?php

namespace App\Modules\Api\Controllers;

use App\Models\Users;
use App\Models\ConfirmsEmails;

class UsersController extends ControllerApiBase
{
    public function initialize(): void
    {
        parent::initialize();
    }

    public function createAction(): string|false
    {
        $data = json_decode(file_get_contents('php://input'));

        $email = $data->email;
        $username  = $data->username ;
        $checkUserEmail = Users::findFirst([
            'email' => $email,
        ]);

        $checkUserUsername = Users::findFirst([
            'username ' => $username 
        ]);

        if ($checkUserUsername?->id || $checkUserEmail?->id) {
            return json_encode(
            ['success'=> false,
                'errors' => [
                    'loginError' => 'Такой пользователь уже есть.'
                ]
            ]);
        } else {
            $user = new Users();
            $user->assign((array)$data);
            $user->setPassword($data->password);
            $user->create();

            $emailVerify = new ConfirmsEmails([
                'user_id' => $user->id,
                'status'  => 0,
                'token'   => ConfirmsEmails::createToken()
            ]);

            $emailVerify->save();

            return json_encode([
                'success' => true,
                'message' => 'На почту было отправлено письмо для подтверждения'
            ]);
        }
    }
}

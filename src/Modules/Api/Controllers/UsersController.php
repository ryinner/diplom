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
        $username  = $data->username;

        $checkUserEmail = Users::findFirst([
            "conditions" => "email = :email:",
            "bind"       => ["email" => $email]
        ]);

        $checkUserUsername = Users::findFirst([
            "conditions" => "username = :username:",
            "bind"       => ["username" => $username],
        ]);

        if ($checkUserUsername?->id !== null || $checkUserEmail?->id !== null) {
            return json_encode(
            ['success'=> false,
                'errors' => [
                    'usernameError' => 'Такой пользователь уже есть.'
                ]
            ]);
        } else {
            try {
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

            $message = "
                <h1>Спасибо, что прошли регистрацию</h1>
                <p>Пройдите по ссылке,чтобы подтвердить правильность указанной почты, $email</p>
                <p><a href='".$this->config->application->publicUrl."/Users/Emailconfirm?token=".$emailVerify->token."'>".$this->config->application->publicUrl."/Users/Emailconfirm?token=".$emailVerify->token."</a></p>
                <p></p>
                <p>** ЗАКЛЮЧЕНИЕ О КОНФИДЕНЦИАЛЬНОСТИ. Данное электронное сообщение, включая вложения, содержит конфиденциальную информацию, защищенную законодательством РФ. Оно предназначено исключительно адресату. Всем прочим лицам доступ к данному сообщению, включая вложения, запрещен. Несанкционированное его использование, распространение, публикация, воспроизведение или любые действия либо бездействие, повлекшее за собой это, запрещены и могут преследоваться по закону.</p>
            ";

            $this->mail->send($email, $username, "Подтверждение регистрации", $message);

            } catch (\Throwable $e) {
                var_dump($e->getMessage());
                var_dump($user->getMessages());
            }

            return json_encode([
                'success' => true,
                'message' => 'На почту было отправлено письмо для подтверждения'
            ]);
        }
    }

    public function emailconfirmAction(): void
    {
        $token = $this->request->getQuery("token");
        if (!empty($token)) {
            $emailVerify = ConfirmsEmails::findFirst(["token = '$token'"]);
            $emailVerify->status = ConfirmsEmails::EMAIL_CONFIRM;
            $emailVerify->save();
        } 
    }

    
    public function loginAction(): string|false
    {
        $data = json_decode(file_get_contents('php://input'));

        $username = $data->username;
        $password = $data->password;
        $remember = $data->remember ? true : false;

        $checkUserUsername = Users::findFirst([
            "conditions" => "username = :username:",
            "bind"       => ["username" => $username],
        ]);
        
        $emails_confirms = ConfirmsEmails::findFirst([
            "conditions" => "user_id = :user_id:",
            "bind"       => ["user_id" => $checkUserUsername->id],
        ]);

        if ($emails_confirms->status === ConfirmsEmails::EMAIL_CONFIRM) {
            if ($this->auth->attempt(['username' => $username, 'password' => $password], $remember)) {
                $answer = ['success' => true ,
                    'errors' => [
                        'loginError' => ''
                    ]
                ];
            } else {
                $answer = ['success' => false, 
                    'errors' => [
                        'loginError' => 'Неправильный логин или пароль.'
                    ]
                ];
            } 
        } else {
            $answer = ['success' => false, 
                'errors' => [
                    'loginError' => 'У вас неподтверждена почта.'
                ]
            ];
        }

        return json_encode($answer);
    }

    public function logoutAction(): void
    {
        $this->auth->logout();
    }
}

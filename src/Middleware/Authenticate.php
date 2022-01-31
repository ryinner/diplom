<?php

namespace App\Middleware;

use Sinbadxiii\PhalconAuth\Middlewares\Authenticate as AuthMiddleware;

class Authenticate extends AuthMiddleware
{
    protected function redirectTo()
    {
        if (isset($this->response)) {
            $this->response->redirect("/")->send();
        }
    }
}

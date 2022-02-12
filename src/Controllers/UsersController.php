<?php

namespace App\Controllers;

use App\Models\Users;

class UsersController extends ControllerBase
{
    public function initialize() 
    {
        parent::initialize();
    }
    
    public function createAction()
    {
        
    }

    public function emailconfirmAction()
    {
        $token = $this->request->getQuery("token");
        if (empty($token)) {
            $this->response->redirect("/Error/Error404")->send();
        } else {
            $this->api->get('Users/EmailConfirm?token='.$token);
        }
    }
}

<?php

namespace App\Modules\Cms\Controllers;

use App\Models\Roles;
use App\Models\Users;
use Phalcon\Paginator\Adapter\Model as Paginator;
use stdClass;

class UsersController extends ControllerCmsBase
{
    public function indexAction()
    {
        $currentPage = $this->request->getQuery('page', 'int') ?? 1;

        $paginator = new Paginator([
            'model'  => Users::class,
            'limit' => 30,
            'page'  => $currentPage
        ]);

        $roles = Roles::find();

        foreach ($roles as $role) {
            $json_roles[$role->id]['id']   = $role->id;
            $json_roles[$role->id]['role'] = $role->role;
        }

        $this->view->setVar('roles', json_encode($json_roles));
        $this->view->setVar('paginator', $paginator->paginate());
    }
}

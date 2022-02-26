<?php

namespace App\Modules\Cms\Controllers;

use App\Models\Users;

class RolesController extends ControllerCmsBase
{
    public function changeAction($id)
    {
        $post = $this->request->getPost();

        $user = Users::findFirst((int)$id);

        $user->role_id = $post['role_id'];

        if ($user->save()) {
            return json_encode(['success' => true]);
        } else {
            return json_encode(['success' => false]);
        }
    }
}

<?php

namespace App\Plugins;

use App\Models\Roles;
use Phalcon\Acl\Enum;
use Phalcon\Acl\Component;
use Phalcon\Acl\Adapter\Memory;

class AccessControllList
{
    protected Memory $acl;

    public function getAcl(): Memory
    {
        // Инициализация
        if (!$this->acl) {
            $acl = new Memory();

            // Базово стоит запрет
            $acl->setDefaultAction(Enum::DENY);
            
            $roles = Roles::find();
            
            $acl->addRole("guest");
            foreach ($roles as $role) {
                $acl->addRole($role->role);
            }

            $adminsResource = [
                '*'   => ['*']
            ];

            $managersResource  = [

            ];

            $usersResource  = [

            ];

            $publicResource = [
                '_Index'    =>  ['*'],
                '_Users'    =>  ['create', 'emailconfirm'],
                '_Error'    =>  ['*']
            ];

            foreach ($publicResource as $resource => $actions) {
                $acl->addComponent(new Component($resource), $actions);
                $acl->allow('*', $resource, '*');
            }
        }

        return $this->acl;
    }
}

<?php

namespace App\Plugins;

use App\Models\Roles;
use Phalcon\Acl\Enum;
use Phalcon\Acl\Role;
use Phalcon\Acl\Component;
use Phalcon\Acl\Adapter\Memory;

class AccessControllList
{
    protected Memory $_acl;

    public function __construct($dependencyInjector)
    {
        $this->_dependencyInjector = $dependencyInjector;
        $this->_acl = $this->getAcl();
    }

    public function getAcl()
    {
        // Инициализация
        $acl = new Memory();

        // Базово стоит запрет
        $acl->setDefaultAction(Enum::DENY);

        $roles = Roles::find();

        $acl->addRole(new Role("guest"));
        foreach ($roles as $role) {
            $acl->addRole(new Role($role->role));
        }

        $adminsResource = [
            'cms_Index'   => ['*']
        ];

        $managersResource  = [];

        $usersResource  = [];

        $publicResource = [
            '_Index'        =>  ['*'],
            '_Users'        =>  ['create', 'emailconfirm'],
            '_Error'        =>  ['*'],
            'api_Index'     =>  ['*'],
            'api_Houses'    =>  ['*'],
            'api_Requests'  =>  ['*'],
        ];

        foreach ($publicResource as $resource => $actions) {
            $acl->addComponent(new Component($resource), $actions);
            $acl->allow('*', $resource, '*');
        }

        foreach ($adminsResource as $resource => $actions) {
            $acl->addComponent(new Component($resource), $actions);
            $acl->allow('admin', $resource, '*');
        }

        return $acl;
    }

    public function beforeDispatch(\Phalcon\Events\Event $event, \Phalcon\Mvc\Dispatcher $dispatcher)
    {
        $user = $this->_dependencyInjector->get('auth')->user();

        $role = !$user ? 'guests' : $user->getRoles()->role;
        $acl  = $this->_acl;

        $controller = $dispatcher->getControllerName();
        $action     = $dispatcher->getActionName();
        $module     = $dispatcher->getModuleName();
        $namespace  = $module ? 'App\\Modules\\' . ucfirst($module) . '\\Controllers\\' : 'App\\Controllers\\';

        $controller_exists = class_exists($namespace . ucfirst($controller) . 'Controller');
        $action_exists     = method_exists($namespace . ucfirst($controller) . 'Controller', $action . 'Action');

        if ($controller_exists && $action_exists) { 
            $allowed = $acl->isAllowed($role, $module . '_' . ucfirst($controller), $action);
            if ($allowed === false) {
                $this->_dependencyInjector->get('response')->redirect("/Error/Error404")->send();
            }
        }
    }
}

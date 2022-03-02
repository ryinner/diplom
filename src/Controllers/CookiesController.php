<?php

namespace App\Controllers;

class CookiesController extends ControllerBase
{
    public function changeThemeAction()
    {
        if ($this->cookies->has('theme')) {
            $theme = $this->cookies->get('theme');
            $theme->delete();
        } else {
            $this->cookies->set('theme', 'dark', time() + 15 * 86400);
        }
    }
}

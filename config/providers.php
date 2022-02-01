<?php

use App\Providers\AssetsProvider;
use App\Providers\ConfigProvider;
use App\Providers\DbProvider;
use App\Providers\DispatcherProvider;
use App\Providers\RouterProvider;
use App\Providers\SessionProvider;
use App\Providers\UrlProvider;
use App\Providers\ViewProvider;
use Sinbadxiii\PhalconAuth\AuthProvider;

return [
    ConfigProvider::class,
    DispatcherProvider::class,
    DbProvider::class,
    RouterProvider::class,
    ViewProvider::class,
    UrlProvider::class,
    AssetsProvider::class,
    SessionProvider::class,
    AuthProvider::class,
];
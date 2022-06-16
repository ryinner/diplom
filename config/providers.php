<?php
use App\Providers\DbProvider;
use App\Providers\ApiProvider;
use App\Providers\UrlProvider;
use App\Providers\ViewProvider;
use App\Providers\AssetsProvider;
use App\Providers\ConfigProvider;
use App\Providers\CookiesProvider;
use App\Providers\RouterProvider;
use App\Providers\SessionProvider;
use App\Providers\DispatcherProvider;
use App\Providers\MailProvider;
use App\Providers\ModelsManagerProvider;
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
    CookiesProvider::class,
    AuthProvider::class,
    ApiProvider::class,
    MailProvider::class,
    ModelsManagerProvider::class
];
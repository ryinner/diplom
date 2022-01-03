<?php

use App\Providers\AssetsProvider;
use App\Providers\ConfigProvider;
use App\Providers\DbProvider;
use App\Providers\DispatcherProvider;
use App\Providers\RouterProvider;
use App\Providers\ViewProvider;

return [
    ConfigProvider::class,
    DispatcherProvider::class,
    DbProvider::class,
    RouterProvider::class,
    ViewProvider::class,
    AssetsProvider::class,
];
<?php

use App\Providers\ConfigProvider;
use App\Providers\DbProvider;
use App\Providers\DispatcherProvider;
use App\Providers\ViewProvider;

return [
    ConfigProvider::class,
    DispatcherProvider::class,
    DbProvider::class,
    ViewProvider::class,
];
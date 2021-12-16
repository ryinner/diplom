<?php

use Ryinner\ArtCrm\Providers\ConfigProvider;
use Ryinner\ArtCrm\Providers\DbProvider;
use Ryinner\ArtCrm\Providers\DispatcherProvider;
use Ryinner\ArtCrm\Providers\ViewProvider;

return [
    ConfigProvider::class,
    DispatcherProvider::class,
    DbProvider::class,
    ViewProvider::class,
];
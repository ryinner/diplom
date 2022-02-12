<?php

use App\Modules\Api\Module as ApiModule;
use App\Modules\Cms\Module as CmsModule;

return [
    'api' => [
        'className' => ApiModule::class,
        'path'      => '../src/Modules/Api/Module.php',
    ],
    'cms' => [
        'className' => CmsModule::class,
        'path'      => '../src/Modules/Cms/Module.php',
    ]
];
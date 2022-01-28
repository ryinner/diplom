<?php

use App\Modules\Api\Module as ApiModule;

return [
    'api' => [
        'className' => ApiModule::class,
        'path'      => '../src/Modules/Api/Module.php',
    ],
];
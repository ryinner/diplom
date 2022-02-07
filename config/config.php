<?php
use App\Models\Users;
use Phalcon\Logger\Logger;
use function App\root_path;

return [
    'database'    => [
        'adapter'  => getenv('DB_ADAPTER'),
        'host'     => getenv('DB_HOST'),
        'port'     => getenv('DB_PORT'),
        'username' => getenv('DB_USERNAME'),
        'password' => getenv('DB_PASSWORD'),
        'dbname'   => getenv('DB_NAME'),
    ],
    'application' => [
        'baseUri'         => getenv('APP_BASE_URI'),
        'publicUrl'       => getenv('APP_PUBLIC_URL'),
        'viewsDir'        => root_path('themes/base/'),
        'cacheDir'        => root_path('var/cache/'),
        'sessionSavePath' => root_path('var/cache/session/'),
    ],
    'api' => [
        'apiUri'    => getenv('APP_API_URI'),
    ],
    'auth' => [
        'defaults' => [
            'guard' => 'web',
            'passwords' => 'users',
        ],
        'guards' => [
            'web' => [
                'driver' => 'session',
                'provider' => 'users',
            ],
        ],
        'providers' => [
            'users' => [
                'driver' => 'model',
                'model'  => Users::class,
            ],
        ],
    ],    
    'mail'        => [
        'host'      => getenv('MAIL_HOST'),
        'username'  => getenv('MAIL_USERNAME'),
        'password'  => getenv('MAIL_PASSWORD'),
        'port'      => getenv('MAIL_PORT')
    ],
    'logger'      => [
        'path'     => root_path('var/logs/'),
        'format'   => '%date% [%type%] %message%',
        'date'     => 'D j H:i:s',
        'logLevel' => Logger::DEBUG,
        'filename' => 'application.log',
    ]
];
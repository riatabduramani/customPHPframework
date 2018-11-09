<?php

return [

    /*
     * Array of the config connection, configure your config connection based on your needs.
     * You can add also other option, postgresql, mongodb, etc.
     */

    'connections' => [

        'mysql' => [
            'driver'     =>  getenv('DB_CONNECTION'),
            'host'       =>  getenv('DB_HOST'),
            'user'       =>  getenv('DB_USERNAME'),
            'password'   =>  getenv('DB_PASSWORD'),
            'database'   =>  getenv('DB_DATABASE'),
            'port'       =>  getenv('DB_PORT'),
            'prefix'     =>  getenv('DB_PREFIX')
        ],

    ]

];
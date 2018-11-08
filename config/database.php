<?php

return [

    /*
     * Array of the config connection, configure your config connection based on your needs.
     * You can add also other option, postgresql, mongodb, etc.
     */

    'connections' => [

        'mysql' => [
            'driver'     =>  $_ENV['DB_CONNECTION'],
            'host'       =>  $_ENV['DB_HOST'],
            'user'       =>  $_ENV['DB_USERNAME'],
            'password'   =>  $_ENV['DB_PASSWORD'],
            'database'   =>  $_ENV['DB_DATABASE'],
            'port'       =>  $_ENV['DB_PORT'],
            'prefix'     =>  $_ENV['DB_PREFIX']
        ],

    ]

];
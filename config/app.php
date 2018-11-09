<?php
/**
 * Created by Riat Abduramani
 * Date: 11/1/2018
 * Time: 8:15 AM
 */

return [

    //Write your application name
    'app_name'  =>  getenv('APP_NAME'),

    //App is on production mode or in development
    'app_live' => getenv('APP_LIVE'),

    //Application main url
    'app_url'   =>  getenv('APP_URL')
];
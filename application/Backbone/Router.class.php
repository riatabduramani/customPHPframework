<?php
/**
 * Created by Riat Abduramani.
 * Date: 11/7/2018
 * Time: 8:18 AM
 */

namespace Customproject\Backbone;


class Router
{
    private $request;
    private $supportedHttpMethods  = [
        'GET',
        'POST'
    ];

    public static function get($url, $function) {
        $request_uri = explode('?', $_SERVER['REQUEST_URI']);


        if($request_uri[0] == $url) {
            if(is_callable( $function )) {
                $function();
            } else {
                echo $function;

            }
        } else {
            header('HTTP/1.0 404 Not Found');
            print "404 not found";
        }

        return $url;
    }
}
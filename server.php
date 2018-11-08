<?php
/**
 * Created by Riat Abduramani.
 * Date: 11/2/2018
 * Time: 9:35 PM
 */

/* This part of code has been taken from Taylor Otwell */
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

require_once __DIR__.'/public/index.php';
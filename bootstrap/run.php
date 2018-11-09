<?php
/**
 * Created by Riat Abduramani.
 * Date: 11/1/2018
 * Time: 8:25 AM
 */

//defining the project root
DEFINE('PROJECT_ROOT', dirname(dirname(__FILE__)));

include(PROJECT_ROOT.'/vendor/autoload.php');

/*
 * We use here the .env files, to call the library which helps us to convert environment file into global $_ENV
 * So the idea is to make a configuration file, so the users can define easy the application config values
 */
use Dotenv\Dotenv;
$dotenv = new Dotenv(PROJECT_ROOT);
$dotenv->load();

//Custom functions needed for the development of the application
include(PROJECT_ROOT.'/bootstrap/functions.php');

/* Including the configuration files from directory "config", the files only return array
 * This code will call every file which is inside the config "directory"
 * and make a variable based on the name of file.
 * Please make user friendly the file name, so later you can call it easily to run the array files
 */
$directories = scandir(PROJECT_ROOT.'/config');
$dir = array_slice($directories, 2);

foreach($dir as $key => $file) {
    if (preg_match('/\.php$/', $file)) {

        /*
         * The function "removeExtension" is used to remove the .php extension
         * and to generate a variable
        */
        ${removeExtension($file)} = include PROJECT_ROOT.'/config/'.$file;
    }
}

//Including the routing engine
include(PROJECT_ROOT.'/routes/web.php');

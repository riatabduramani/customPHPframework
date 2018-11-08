<?php
/**
 * Created by Riat Abduramani.
 * Date: 11/1/2018
 * Time: 12:51 PM
 */
namespace Customproject\Application;
use Customproject\Backbone\View;

class Main
{

    public function __construct()
    {

    }

    public function view($template, array $parameters = [])
    {
        $twig = new View();
        return $twig->render($template, $parameters);
    }

}
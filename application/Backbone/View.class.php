<?php
/**
 * Created by Riat Abduramani.
 * Date: 11/3/2018
 * Time: 7:56 AM
 */

namespace Customproject\Backbone;


class View
{
    public $twig_loader;
    public $twig;

    public function __construct()
    {
        $this->twig_loader = new \Twig_Loader_Filesystem(PROJECT_ROOT.'/views/');
        $this->twig = new \Twig_Environment($this->twig_loader, array(
            //'cache' => PROJECT_ROOT.'/cache/templates',
            'autoescape' => false,
        ));
    }

    public function render($templatename, array $parameters = [])
    {
        try {
                return $this->twig->render($templatename, $parameters);
          } catch (\Twig_Error_Loader $e) {
                return $this->twig->render("__MAIN__", $parameters); // this should be changed
          }
    }
}
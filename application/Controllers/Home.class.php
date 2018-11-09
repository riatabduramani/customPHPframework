<?php
/**
 * Created by Riat Abduramani.
 * Date: 11/9/2018
 * Time: 9:02 AM
 */

namespace Customproject\Application\Controllers;

use Customproject\Application\Main;

class Home extends Main
{
    public function welcome()
    {
        return $this->view('welcome.html',['title'=>'Welcome', 'text'=>'Welcome to customPHPframework']);
    }
}
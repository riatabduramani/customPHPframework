<?php
/**
 * Created by PhpStorm.
 * User: dev1
 * Date: 11/1/2018
 * Time: 4:12 PM
 */
namespace Customproject\Application\Controllers;
use Customproject\Application\Main;

class User extends Main
{

    public function users() {
        $users = [
            'username'  => 'riat',
            'password'  => 'test123',
            'active'    => true,
            'status'    => '<h1>available</h1>'
        ];

        return $this->view('users/user.html', $users);
    }
}
<?php


namespace MVC\controllers;

use MVC\core\controller;
use MVC\core\session;

use MVC\models\user;
use Rakit\Validation\Validator;


class usercontroller extends controller{

    public function __construct()
    {
        Session::Start();
        $user_data = Session::Get('user');
        if(empty($user_data)){
            echo "class not acess";die;
        }

    }

    public function index(){
        echo "user";
    }


}

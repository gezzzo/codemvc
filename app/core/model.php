<?php

namespace MVC\core;
use Dcblogdev\PdoWrapper\Database;
class model
{
## composer require dcblogdev/pdo-wrapper in commend##
    static function db(){
        // make a connection to mysql here
        $options = [
            //required
            'username' => USERNAME,
            'database' => DATABASE,
            //optional
            'password' => PASSWORD,
            'type' => DATABASE_TYPE,
            'charset' => 'utf8',
            'host' => HOST,
            'port' => '3306'
        ];

        return $db = new Database($options);
    }
}
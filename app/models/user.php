<?php
namespace MVC\models;
use MVC\core\model;
class user extends model
{
    public function GetAllUsers(){
        $data = model::db()->rows("SELECT * FROM user");
        return $data;
    }
    public function GetUser($email,$password){
        $data = model::db()->row("SELECT * FROM user WHERE `email`= ? && `passwd`=? ",[$email,$password]);
        return $data;
    }
    public function AddUser($name,$email,$password){
        $data = model::db()->run ("INSERT INTO `user`(`name`, `email`, `passwd`) VALUES (?,?,?) ",[$name,$email,$password]);
        return $data;
    }

}
<?php

namespace MVC\controllers ;

use MVC\core\helpers;
use MVC\core\Session;
use MVC\core\controller;
use MVC\models\user;
use Rakit\Validation\Validator;


class homecontroller extends controller {

    public function __construct()
    {
        Session::Start();
    }

    public function index(){
        $user = new user();
        $data = $user->GetAllUsers();
        $this->view("home".DS."index",['title'=>'index','h1'=>'index','data'=>$data]);
    }

    public function add(){
        $this->view("home".DS."add",['title'=>'add','h1'=>'Add']);
    }

    public function login(){

        $this->view("home".DS."login",['title'=>'login']);
    }
    public function PostLogin(){
        $validator = new Validator;
        $validation = $validator->make($_POST , [
            'email'=> 'required',
            'password'=> 'required'
        ]);
        $validation->validate();
        if ($validation->fails()) {
            // handling errors
            $errors = $validation->errors();
            echo "<pre>";
            print_r($errors->firstOfAll());die;

        } else {
            // validation passes
            $user = new user();
            $data = $user->GetUser($_POST['email'],$_POST['password']);
            if(!empty($data)){
                Session::Set('user',$data);
//                header('LOCATION: ../user/index ');
                helpers::redirect('user/index');
            }
            else{
                helpers::redirect('home/login');

            }

        }
    }
    public function Register(){

        $this->view("home".DS."register",['title'=>'register']);
    }
    public function PostRegister(){
        $validator = new Validator;
        $validation = $validator->make($_POST , [
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required'
        ]);
        $validation->validate();
        if ($validation->fails()) {
            // handling errors
            $errors = $validation->errors();
            echo "<pre>";
            print_r($errors->firstOfAll());die;

        } else {
            // validation passes
            $user = new user();
            $action = $user->AddUser($_POST['name'],$_POST['email'],$_POST['password']);
            $data = $user->GetUser($_POST['email'],$_POST['password']);
            if($action){
                Session::Set('user',$data);
                helpers::redirect('user/index');
            }
            else{
                helpers::redirect('login');
            }

        }
    }
    public function logout(){
        Session::Stop();
    }

}
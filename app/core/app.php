<?php
namespace MVC\core;

class app{

    private $controller="home";
    private $method="index";
    private $params=[];

    public function __construct()
    {
        $this->url();
        $this->render();
    }
    private function url(){
        if(!empty($_SERVER['QUERY_STRING'])) {
            $url = explode('/', $_SERVER['QUERY_STRING']);
            //this is controller
            $this->controller = isset($url[0])?$url[0]."controller" : "homecontroller";
            //this is method
            $this->method = isset($url[1])?$url[1]:"index";
            // to clear the array
            unset($url[0],$url[1]);
            //this is parameters
            $this->params = array_values($url);
        }
        else{
            //this is default controller
            $this->controller = "homecontroller";
            //this is default method
            $this->method ="index";
        }
    }

    private function render(){
        $controllers = "MVC\controllers\\".$this->controller;
        if(class_exists($controllers)){
            $controller = new $controllers;
            if(method_exists($controller,$this->method)){
                call_user_func_array([$controller,$this->method],$this->params);

            }
            else{
                echo "not found";
            }
        }else{
            echo "not found";
        }
    }

}
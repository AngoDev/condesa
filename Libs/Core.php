<?php

class Core {

    function __construct() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        
        if (empty($url[0])){
            require 'Controller/HomeController.php';
            $controller = new HomeController();
            $controller->index();
            
            return false;
        }
        
        $file = 'Controller/' . ucfirst($url[0]) . 'Controller.php';
        if (file_exists($file)){
            require $file;
        } else {
            throw new Exception("The file: $file Does not exists");
        }

        $controller_url = ucfirst($url[0]) . "Controller";
        $controller = new $controller_url;
        
        // Carregando o Modelo
        $controller->loadModel($controller_url);

        // Verificar se foi especificado um método (action)
        if (isset($url[2])) {
            // adicionar parametro no método
            $controller->{$url[1]}($url[2]);
        } else {
            if (isset($url[1])) {
                $controller->{$url[1]}();
            } else {
                $controller->index();
            }
        }
    }

}
<?php

class View {

    function __construct() {
        //echo "this is the view";
    }
    
    public function layout($name){
        //require 'View/' . $name . '.php';
        if (isset($name) && !empty($name)){
            require 'View/Layout/' . $name . '.php';
        } else {
            require 'View/Layout/default.php';
        }
        
    }
    
    public function content($name){
        require_once 'View/'. $name . '.php';
    }

}
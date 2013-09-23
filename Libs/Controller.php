<?php

class Controller {

    function __construct() {
        //echo "Main Controler<br><br>";
        
        // TODO - carregar model automaticamente...
        /*
        $expression = explode('Controller', get_called_class());
        $model_file = 'Model/' . ucfirst(strtolower($expression[0])) . 'Model.php';
        
        if (file_exists($model_file)){
            require $model_file;
        }
        */
        $this->view = new View();
    }
    
    public function loadModel($name){
        $expression = explode('Controller', $name);
        $path = 'Model/' . ucfirst(strtolower($expression[0])) . 'Model.php';
                
        if (file_exists($path)){
            require $path;
            
            $modelName = $expression[0] . 'Model';
            
            $this->model = new $modelName();
            var_dump($this->model);
        }
    }

}

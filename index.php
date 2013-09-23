<?php

require_once 'config/init.php';
require_once 'config/database.php';

function __autoload($name){
    $file_name = 'Libs/' . $name . '.php';
    require_once $file_name;    
}

$app = new Core();
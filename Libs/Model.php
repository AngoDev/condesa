<?php
class Model {

    function __construct() {
        $this->db = new Database();
        
        echo "<h1>Loading me from:" . get_called_class() . "</h1>";
    }

}
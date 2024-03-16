<?php
class Connect{
    public static function connect(){
        $host = "localhost";
        $usuario = "u393147787_celes";
        $password = "Cls26tino";
        $database = "u393147787_bd_escondida";

        $db = new mysqli($host,$usuario,$password,$database);
        $db->query("SET NAMES 'utf8'");
        return $db;


    }
}

?>
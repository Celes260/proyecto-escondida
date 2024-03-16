<?php
class Connect{
    public static function connect(){
        $host = "localhost";
        $usuario = "root";
        $password = "";
        $database = "bd_escondida";

        $db = new mysqli($host,$usuario,$password,$database);
        $db->query("SET NAMES 'utf8'");
        return $db;


    }
}

?>
<?php
class Utils{
    public static function deleteSession($name){
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = null;
         
        }
        return $name;

    }

    public static function crearSession($name, $rol){
        $_SESSION['estadoLoginAdmin'] = $rol ;
        return $_SESSION['estadoLoginAdmin'];
        var_dump($_SESSION['estadoLoginAdmin']);

    }
    public static function isAdmin(){
        if(!isset($_SESSION['estadoLoginAdmin'])){
            header("Location:".base_url);
        }else{
            return true;
        }

    }

    public static function obtenerOrden($id_mesa){
        require_once 'models/ordenes.php';
        $orden = new Ordenes();
        $orden = $orden->obtenerOrden($id_mesa);
        return $orden;
        

    }
    public static function adminPrincipal($rol){
        if($rol=="cajero"){
            echo"<script>alert('No tienes permisos para acceders');</script>";
            header("Location:".base_url."/administrador/administrar");
        }else{
            return true;
        }
        
    }
    
}


?>
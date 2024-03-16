<?php
require_once 'models/Menu.php';
class carritoController{

    public  function index(){
        if(isset($_SESSION['carrito'])){
            $carrito = $_SESSION['carrito'];
        }else{
            $carrito=array();
       
        }


        require_once 'views/clientes/carrito.php';
        
    }

    public function agregar(){

        if(isset($_SESSION['clienteLogin'])){

            if(isset($_GET['id_menu'])){
                $menu_id = $_GET['id_menu'];
                
            }else{
                header("location:".base_url);
            }      
            
            if(isset($_SESSION['carrito'])){
                $counter =0;
                foreach($_SESSION['carrito'] as $indice=>$elemento ){
                if($elemento['id_menu']==$menu_id){
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                
                }
                
                
            }
            $menu = new MenuController();
            $menu->platillos();
            echo"<script>alert('platillo agregado al carrito')</script>";
            
        }
        if(!isset($counter)||$counter==0){
            
            //conseguirproducto
            $menu = new Menu();
            $menu->setIdMenu($menu_id);
            $menu= $menu->getOne();
            
            //añadir al carrito
            if(is_object($menu)){
                
                $_SESSION['carrito'][] = array(
                    "id_menu"=>$menu->idMenu,
                    "nombre"=>$menu->nombreMenu,
                    "precio"=>$menu->precio,  
                    "unidades"=>1,
                    "imagen"=>$menu->imagen,
                    "menu"=>$menu
                    
                    
                );
                
            }
            $menu = new MenuController();
            $menu->platillos();
            echo"<script>alert('platillo agregado al carrito')</script>";
            
        }
        
    }else{
        echo"<script>alert('Primero debe inciar sesión')</script>";
        require_once'views/layout/login.php';
    }
        
    }
    
    public function vaciarCarrito(){
        unset($_SESSION['carrito']);
        $_SESSION['carrito']=null;
        $carr = new carritoController();
        $carr->index();

    }

    function eliminarProductoDelCarrito() {
      
        if (isset($_SESSION['carrito'])) {
           
            foreach ($_SESSION['carrito'] as $indice => $producto) {
               
                if ($producto['id_menu'] == $_GET['id_menu']) {
                   
                    unset($_SESSION['carrito'][$indice]);
                    
                    break;
                }
            }
        }

        $carr = new carritoController();
        $carr->index();
        
    }


}






?>
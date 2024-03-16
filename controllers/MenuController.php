<?php
require_once 'models/Menu.php';
class MenuController{
  
   
  public function menu(){
    Utils::isAdmin();
    Utils::adminPrincipal($_SESSION['infoAdmin']->rol);
    $menu = new Menu();
    $menu = $menu->mostrarTodos();
    require_once 'views/administrador/sidebar.php';
    require_once 'views/menu/menu.php';


  }

  public function crearMenu(){
    Utils::isAdmin();
    Utils::adminPrincipal($_SESSION['infoAdmin']->rol);
    require_once 'views/administrador/sidebar.php';
    require_once 'views/menu/crearPlatillo.php';

  }

    public function guardar(){
       
      $validacionMenu = array();

        if(isset($_POST)){
            $nombre = ($_POST['nombrePlatillo']!="")?$_POST['nombrePlatillo']:  $validacionMenu['nombre']="nombre vacio";

            $precio = ($_POST['precio']!="") && is_numeric($_POST['precio'])?$_POST['precio']: $validacionMenu['precio'] = "precio vacío";

            $categoria = $_POST['categoria'];

            $descripcion= ($_POST['descripcion']!="")?$_POST['descripcion']: $validacionMenu['descripcion'] = "descripcion vacía";
            if(count($validacionMenu)==0){
                 $menu = new Menu();
                 $menu->setNombre($nombre);
                 $menu->setPrecio($precio);
                 $menu->setCategoria($categoria);
                 $menu->setIdAdministrador($_SESSION['infoAdmin']->idAdministrador);
                 $menu->setDescripcion($descripcion);

                 if(isset($_FILES['imagen'])){

                  $file = $_FILES['imagen'];
                  $fileName = $file['name'];
                  $mimetype = $file['type'];
                  
                  
                  if($mimetype == "image/jpg" || $mimetype == 'image/png' || $mimetype == 'image/png' 
                  || $mimetype == 'image/jpeg' ){
                      
                  if(!is_dir('uploads/images')){
                      mkdir('uploads/images',0777,true);
                      
                  }
                  move_uploaded_file($file['tmp_name'], 'uploads/images/'.$fileName);
                    $menu->setImagen($fileName);
                    

                
                 
              }
                  
              }else{
                
              }




              if(!isset($_GET['idMenu'])){
                $menu->guardar();
                $_SESSION['platilloGuardado'] = "platillo guardado";
                header("location: menu");
              }else{
                $idMenu = $_GET['idMenu'];
                $menu->setIdMenu($idMenu);
                 if(isset($_GET['nombreImagen']) && $fileName==""){
                  $menu->setImagen($_GET['nombreImagen']);
                  header("location: menu");
                } 
                $menu->actualizar();
              
               
                
              }



            }else{
              $_SESSION['validacionMenu'] = $validacionMenu;
              require_once 'views/administrador/sidebar.php';
              require_once 'views/menu/crearPlatillo.php';
            }

          
  
          
       
  
        }
  
      
  
  
      }


      public function platillos(){
        $menu = new Menu();
        $snacks = $menu->mostrarSnacks();
        $desayunos = $menu->mostrarDesayunos();
        $comida = $menu->mostrarComidas();
        $cena = $menu->mostrarCena();
        $bebida = $menu->mostrarBebidas();
        require_once 'views/menu/platillos.php';

       }

       public function borrar(){
          $menu = new Menu();
        if(isset($_GET['idMenu'])){
            $idMenu = $_GET['idMenu'];
            $menu->setIdMenu($idMenu);
            $menu->borrar();
           $_SESSION['borrado'] = "producto borrado exitosamente";
            header("location: menu");

          }else{
            echo "no borrado";
            var_dump($_GET);
          }



       }

       public function editarMenu(){
        Utils::adminPrincipal($_SESSION['infoAdmin']->rol);
        Utils::isAdmin();
        $idMenu = $_GET['idMenu'];
        $menu = new Menu();
        $menu->setIdMenu($idMenu);
        $men = $menu->getOne();
        
        require_once 'views/administrador/sidebar.php';
        require_once 'views/menu/crearPlatillo.php';


       }
       
       
 

}




?>
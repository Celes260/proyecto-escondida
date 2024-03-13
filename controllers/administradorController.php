<?php
require_once 'models/administrador.php';
class AdministradorController{
  public function logout(){
    Utils::deleteSession("loginNombre");
    Utils::deleteSession("estadoLoginAdmin");
    header("location: inicio");

}
public function inicio(){
  require_once 'views/layout/inicio.php';
 
}

  
    public function loginVista(){
        $_SESSION['loginAdmin'] = "Administrador existente";
        require_once 'views/layout/login.php';
    }

    
    public function login(){
       
       
        if(isset($_POST)){
            
            $email = !empty($_POST['email'])?$_POST['email']:$_SESSION['validacionLoginEmail'] = 'campo vacio, ingrese email';
            $password = !empty($_POST['password'])?$_POST['password']:$_SESSION['validacionLoginPassword'] = 'campo vacio';

            if(!empty($email)){
                
                 if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $_SESSION['validacionLoginEmail'] = 'email invalido';
                require_once 'views/layout/login.php';
                  }else{
                $_SESSION['validacionLoginEmail'] = null;
              }
          

            }

            if(!isset($_SESSION['validacionLoginEmail'])&& !isset($_SESSION['validacionLoginPassword'])){
                     $administrador = new Administrador();
                     $administrador->setEmail($_POST['email']);
                     $administrador->setContraseña($_POST['password']);
                     $identity = $administrador->login();  

                     if($identity){
                
                      $_SESSION['infoAdmin'] = $identity;
                      $_SESSION['estadoLoginAdmin'] = $identity->rol;
                      $_SESSION['nombreLogin'] = $_SESSION['infoAdmin']->nombre; 

                      $db=connect::connect();
                      $sqlAdminMesas = "UPDATE mesas SET id_administrador = {$_SESSION['infoAdmin']->idAdministrador}";
                      $admMesas = $db->query($sqlAdminMesas);

                        header("location: administrar");
                        

                    
                     }else{
                        $_SESSION['loginError'] = "usuario no encontrado";
                        require_once 'views/layout/login.php';
                        
                     }



            }else{
              require_once 'views/layout/login.php';
            }
    }

    }

    public function administrar(){
      Utils::isAdmin();
      require_once 'views/administrador/sidebar.php';
      require_once 'views/administrador/mesas.php';

    }
    
    public function usuarios(){
      Utils::isAdmin();
      
      Utils::adminPrincipal($_SESSION['infoAdmin']->rol);
         
      
      $administrador = new Administrador();
      $admins= $administrador->mostrarUsuarios();

      require_once 'views/administrador/sidebar.php';
      require_once 'views/administrador/Usuarios.php';
      
    }
    public function crearUsuario(){
      Utils::isAdmin();
      require_once 'views/administrador/sidebar.php';
      require_once 'views/administrador/nuevoUsuario.php';

    }
    public function guardarUsuario(){
      Utils::isAdmin();
      Utils::adminPrincipal($_SESSION['infoAdmin']->rol);
      $validacionUsuarios = array();

      if(isset($_POST)){
        $nombre = ($_POST['nombre']!="")?$_POST['nombre']:  $validacionUsuarios['nombre']="nombre vacio";
        $apellidoP = ($_POST['apellidoP']!="")?$_POST['apellidoP']:  $validacionUsuarios['apellidoP']="Apellido paterno vacío";
        $apellidoM = ($_POST['apellidoM']!="")?$_POST['apellidoM']:  $validacionUsuarios['apellidoM']="Apellido materno vacío";
        $email = ($_POST['email']!="")?$_POST['email']:  $validacionUsuarios['email']="Email vacío";
        $contraseña = ($_POST['contraseña']!="")?$_POST['contraseña']:  $validacionUsuarios['contraseña']="Contraseña vacía";
        $confirmacionContraseña = ($_POST['confirmacionContraseña']!="")?$_POST['confirmacionContraseña']:  $validacionUsuarios['confirmacionContraseña']="confirmacion de contraseña  vacía";
        $rol = $_POST['categoria'];       

        if(count($validacionUsuarios)==0){
 
          if($contraseña == $confirmacionContraseña){
              $administrador = new Administrador();
              $administrador->setNombre($nombre);
              $administrador->setApellidoPaterno($apellidoP);
              $administrador->setApellidoMaterno($apellidoM);
              $administrador->setEmail($email);
              $administrador->setContraseña($contraseña);
              $administrador->setRol($rol);
              $verificarEmail = $administrador->verificarEmail();

              if($verificarEmail->num_rows==1 && !isset($_GET['idAdministrador'])){
                echo "<script>alert('correo electronico no disponible');</script>";
                require_once 'views/administrador/sidebar.php';
                 require_once 'views/administrador/nuevoUsuario.php';
                 
              
              }else{
                if(!isset($_GET['idAdministrador'])){
                  $administrador->agregarUsuario();
                  $_SESSION['creacionUsuario'] = "Usuario creado exitosamente";
                  header("location: usuarios");
                }else{
                  $administrador->setIdAdministrador($_GET['idAdministrador']);
                  $administrador->editarUsuario();
                  $_SESSION['actualizacionUsuarios'] = "actualizado";
                  header("location: usuarios");
                }

                  

                
              }

          
            
          }else{
            echo "<script>alert('contraseñas no coinciden');</script>";
            require_once 'views/administrador/sidebar.php';
            require_once 'views/administrador/nuevoUsuario.php';
            
          }

     
          
        }else{

          $_SESSION['validacionUsuarios'] = $validacionUsuarios;
          
          require_once 'views/administrador/sidebar.php';
          require_once 'views/administrador/nuevoUsuario.php';
        }

        
      }

    }

    public function borrarUsuario(){
      Utils::isAdmin();
      
      $idAdministrador = $_GET['idAdministrador'];
      $administrador = new Administrador();
      $administrador->setIdAdministrador($idAdministrador);
      $borrado = $administrador->borrarUsuario();

      if($borrado){

        $_SESSION['usuarioBorrado'] = "borrado";
        header("Location:usuarios");
      }
      

    }

    public function editarUsuario(){
      Utils::adminPrincipal($_SESSION['infoAdmin']->rol);
      Utils::isAdmin();
      $idAdministrador = $_GET['idAdministrador'];
      $administrador = new Administrador();
      $administrador->setIdAdministrador($idAdministrador);
      $upd = $administrador->getOne();

      require_once 'views/administrador/sidebar.php';
      require_once 'views/administrador/nuevoUsuario.php';


    }
   

    
}



?>
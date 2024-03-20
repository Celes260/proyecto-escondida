<?php
require_once 'models/cliente.php';
class clienteController{
    public static function inicio(){
     
         require_once 'views/layout/inicio.php';

       
    }
    public function contacto(){
        require_once 'views/layout/contacto.php';
    }

    public function loginVista(){
        Utils::deleteSession("loginAdmin"); 
        
        require_once 'views/layout/login.php';
    }
    public function registro(){
        require_once 'views/clientes/registro.php';
    }
    public function login(){
        if(isset($_POST)){
            
            $email = !empty($_POST['email'])?$_POST['email']:$_SESSION['validacionLoginEmail'] = 'campo vacio, ingrese email';
            $password = !empty($_POST['password'])?$_POST['password']:$_SESSION['validacionLoginPassword'] = 'campo vacio';

            if(!empty($email)){
                
                 if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $_SESSION['validacionLoginEmail'] = 'email invalido';

                  }else{
                $_SESSION['validacionLoginEmail'] = null;
              }
          

            }

            if(!isset($_SESSION['validacionLoginEmail'])&& !isset($_SESSION['validacionLoginPassword'])){
                    
                                                                                                                
                    $cliente = new cliente();
                    $cliente->setEmail($email);
                    $cliente->setContraseña($password);
                    $identify=$cliente->login();
                

                    if($identify && is_object($identify)){
                        $_SESSION['identity'] = $identify;
                        $_SESSION['clienteLogin']=true;
                        header("location: inicio");
                        
                    }else{
                        $_SESSION['error_login']='identificacion fallida';
                        require_once 'views/layout/login.php';
                       
                    }

                    
            }else{
              require_once 'views/layout/login.php';
            }    

        }else{
            echo "no llega post";
        }

    }
    public function guardarCliente(){
        $validacionUsuarios = array();
        $registro = array();

        if(isset($_POST)){
          $nombre = ($_POST['nombre']!="")?$_POST['nombre'] :  $validacionUsuarios['nombre']="nombre vacio";
          $apellidoP = ($_POST['apellidoP']!="")?$_POST['apellidoP']:  $validacionUsuarios['apellidoP']="Apellido paterno vacío";
          $apellidoM = ($_POST['apellidoM']!="")?$_POST['apellidoM']:  $validacionUsuarios['apellidoM']="Apellido materno vacío";
          $email = ($_POST['email']!="")?$_POST['email']:  $validacionUsuarios['email']="Email vacío";             
          $calle = ($_POST['calle']!="")?$_POST['calle']: $validacionUsuarios['calle']="Calle vacía";
          $ciudad = ($_POST['ciudad']!="")?$_POST['ciudad']: $validacionUsuarios['ciudad']="Ciudad vacía";
          $numeroCasa = ($_POST['numeroCasa']!="")?$_POST['numeroCasa']: $validacionUsuarios['numeroCasa']="Numero de casa vacío";

          if(!isset($_SESSION['identity'])){

            $contraseña = ($_POST['contraseña']!="")?$_POST['contraseña']:  $validacionUsuarios['contraseña']="Contraseña vacía";
            $confirmacionContraseña = ($_POST['confirmarContraseña']!="")?$_POST['confirmarContraseña']:  $validacionUsuarios['confirmarContraseña']="confirmacion de contraseña  vacía";  
          }else{
            $contraseña = "nadaa";
            $confirmacionContraseña ="nadaa";
          }
            
            
          if(count($validacionUsuarios)==0){
   
            if($contraseña == $confirmacionContraseña){
                $cliente = new cliente();
                $cliente->setNombre($nombre);
                $cliente->setApellidoPaterno($apellidoP);
                $cliente->setApellidoMaterno($apellidoM);
                $cliente->setEmail($email);
                $cliente->setContraseña($contraseña);
                $cliente->setCalle($calle);
                $cliente->setNumeroCasa($numeroCasa);
                $cliente->setCiudad($ciudad);
                $verificarEmail = $cliente->obtenerEmail();  
  
                if($verificarEmail->num_rows==1){
                  echo "<script>alert('correo electronico no disponible');</script>";
                  require_once 'views/clientes/registro.php';           
                  }else{
                  
                    if(!isset($_SESSION['identity'])){
                      //metodo que indica que los campos estan correctos para la creacion de usuario
                      //aqui se verifica el email
                      
                      $codigo= mt_rand(10000000, 99999999);
                      $cliente->guardarCodigo($codigo);
                      require_once 'mailer.php';
                      require_once 'views/clientes/verificacionCodigo.php';
                      


                    }else{
                      $cliente->setIdCliente($_SESSION['identity']->idCliente);
                      $cliente->actualizarCliente();
                      require_once 'views/layout/inicio.php';  

                    }
                    
                    }
                }else{
                  echo "<script>alert('contraseñas no coinciden');</script>";
                  require_once 'views/clientes/registro.php';
     
                }
          
            }else{
              $_SESSION['erroresRegistro'] = $validacionUsuarios;
              $_SESSION['registro'] = $registro;
         
              require_once 'views/clientes/registro.php';

            }
       
          }
        }

        public function logout(){
          if(isset($_SESSION['identity'])&&isset($_SESSION['clienteLogin'])){
            unset($_SESSION['identity']);
            unset($_SESSION['clienteLogin']);
            $_SESSION['identity'] = null;
            $_SESSION['clienteLogin']=null;
          }
          if(isset($_SESSION['carrito'])){
            unset($_SESSION['carrito']);
            $_SESSION['carrito']=null;
          }
            header("location: inicio");
          


        }

        public function perfil(){
          $idCliente = $_SESSION['identity']->idCliente;
          $cliente = new cliente();
          $cliente->setIdCliente($idCliente);
          $upd = $cliente->getOne();
          require_once 'views/clientes/registro.php';



        }


        public function verificacionCodigo(){
           $cliente = new cliente();


        }

      }     
          
  


    


    


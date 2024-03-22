<?php
class cliente{

        private $idCliente;
        private $nombre;
        private $apellidoPaterno;
        private $apellidoMaterno;
        private $ciudad;
        private $calle;
        private $numeroCasa;
        private $contraseña;
        private $email;
        private $db;

        public function __construct(){
            $this->db=connect::connect();
        }
    
        public function getIdCliente() {
            return $this->idCliente;
        }
    
        public function setIdCliente($idCliente) {
            $this->idCliente = $idCliente;
        }
    
        public function getNombre() {
            return $this->nombre;
        }
    
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
    
        public function getApellidoPaterno() {
            return $this->apellidoPaterno;
        }
    
        public function setApellidoPaterno($apellidoPaterno) {
            $this->apellidoPaterno = $apellidoPaterno;
        }
    
        public function getApellidoMaterno() {
            return $this->apellidoMaterno;
        }
    
        public function setApellidoMaterno($apellidoMaterno) {
            $this->apellidoMaterno = $apellidoMaterno;
        }
    
        public function getCiudad() {
            return $this->ciudad;
        }
    
        public function setCiudad($ciudad) {
            $this->ciudad = $ciudad;
        }
    
        public function getCalle() {
            return $this->calle;
        }
    
        public function setCalle($calle) {
            $this->calle = $calle;
        }
    
        public function getNumeroCasa() {
            return $this->numeroCasa;
        }
    
        public function setNumeroCasa($numeroCasa) {
            $this->numeroCasa = $numeroCasa;
        }
    
        public function getContraseña() {
            return password_hash($this->contraseña, PASSWORD_BCRYPT,['cost'=>4]);
        }
    
        public function setContraseña($contraseña) {
            $this->contraseña = $contraseña;
        }
    
        public function getEmail() {
            return $this->email;
        }
    
        public function setEmail($email) {
            $this->email = $email;
        }

        public function obtenerEmail(){
            $email =$this->db->query("SELECT * FROM clientes WHERE email = '{$this->getEmail()}'");
            return $email;

        }
        public function agregarCliente(){
            $nombre = $this->getNombre();
            $apellidoPaterno = $this->getApellidoPaterno();
            $apellidoMaterno = $this->getApellidoMaterno();
            $email = $this->getEmail();
            $calle = $this->getCalle();
            $numeroCasa = $this->getNumeroCasa();
            $contraseña = $this->getContraseña();
            $ciudad = $this->getCiudad();

            $agregar = $this->db->query( "INSERT INTO clientes VALUES(NULL, '$nombre', '$apellidoPaterno', '$apellidoMaterno', '$ciudad', '$calle','$numeroCasa', '$contraseña', '$email')");

            return $agregar;
        }

        public function login(){
            $email=$this->getEmail();
            $contraseña=$this->contraseña;
            $result = false;
    
            $sql="SELECT * from clientes WHERE email = '$email';";
              $login=$this->db->query($sql);
              
              if($login && $login->num_rows==1){
                $cliente = $login->fetch_object();
    
                $verify = password_verify($contraseña, $cliente->contraseña);
               
                if($verify){
                  $result = $cliente;
    
                }else{
                $result = $contraseña;
                }
              }
              return $result;
    



        }

        public function getOne(){
            $usuario = $this->db->query("SELECT * FROM clientes WHERE idCliente = '{$this->getIdCliente()}';");
            return $usuario->fetch_object();
            
      
          }

          public function actualizarCliente(){
            $nombre = $this->getNombre();
            $apellidoP = $this->getApellidoPaterno();
            $apellidoM = $this->getApellidoMaterno();
            $email = $this->getEmail();
            $ciudad = $this->getCiudad();
            $calle = $this->getCalle();
            $numeroCasa = $this->getNumeroCasa();
            $idCliente = $this->getIdCliente();

      
            $editar = $this->db->query("UPDATE clientes SET nombre='$nombre', apellidoPaterno='$apellidoP', apellidoMaterno='$apellidoM', email='$email', ciudad='$ciudad', calle='$calle', numeroCasa='$numeroCasa' WHERE idCliente = '$idCliente';");
            return $editar;

          }

          public function guardarCodigo($codigo){
            $email = $this->getEmail();

            $subir = $this->db->query("INSERT INTO codigos VALUES(NULL, '$email', '$codigo')");
            


          }


          public function verificarCodigo($codigo){
            $email = $this->getEmail();
            $nombre = $_GET['nmb'];
            $app = $_GET['app'];
            $apm = $_GET['apm'];
            $calle = $_GET['calle'];
            $ciudad = $_GET['ciudad'];
            $nm = $_GET['nm'];
            $password = $_GET['contra'];
            $contra = password_hash($password, PASSWORD_BCRYPT,['cost'=>4]);
            $verificar = $this->db->query("SELECT * FROM codigos WHERE email = '{$email}' AND codigo = '{$codigo}'");
            if($verificar->num_rows==1 ){
                echo "<script>alert('Usuario registrado con exito')</script>";
                
                if(isset($_SESSION['sbm-mal'])){
                    Utils::deleteSession("sbm-mal");
                }
                $agregar = $this->db->query( "INSERT INTO clientes VALUES(NULL, '$nombre', '$app', '$apm', '$ciudad', '$calle','$nm', '$contra', '$email')");
                
                require_once 'views/layout/login.php';

            }else{
               
                $email = $this->getEmail();
                $nombre = urlencode($_GET['nmb']);
                $app = urlencode($_GET['app']);
                $apm = urlencode($_GET['apm']);
                $calle = urlencode($_GET['calle']);
                $ciudad = urlencode($_GET['ciudad']);
                $nm = urlencode($_GET['nm']);
                $password = urlencode($_GET['contra']);
                $_SESSION['sbm-mal']="Codigo erroneo";
                header("Location: viewCodigo&email=$email&nmb=$nombre&app=$app&apm=$apm&calle=$calle&ciudad=$ciudad&nm=$nm&contra=$password");
                
            }
        

          }


          public function codigoRecuperacion($codigo){
            $email = $this->getEmail();

            $query= "INSERT INTO codigos VALUES(null, '$email', '$codigo');";

          }

          public function verificarCodigoPassword($codigo){
            $email = $this->getEmail();
           
            $verificar = $this->db->query("SELECT * FROM codigos WHERE email = '{$email}' AND codigo = '{$codigo}'");
            if($verificar->num_rows==1 ){
                

                require_once 'views/clientes/cambiandoContrasena.php';

            }else{
             
                $_SESSION['sbm-mal']="Codigo erroneo";
                header("Location: viewCodigoPass&email=$email");
                
            }


          }

          public function cambiandoContra(){
            $contraseña = $this->getContraseña();
            $update = $this->db->query("UPDATE clientes SET contraseña = '$contraseña' WHERE email = '{$this->getEmail()}';");

            if($update){
                echo "<script>alert('Contraseña actualizada con exito')</script>";
                require_once 'views/layout/login.php';
            }else{
                echo "error actualizando contraseña";
            }


          }
    }
    





?>
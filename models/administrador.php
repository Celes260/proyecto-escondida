<?php
class Administrador {
    private $idAdministrador;
    private $nombre;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $email;
    private $contraseña;
    private $rol;
    private $db;

    public function __construct(){
        $this->db=connect::connect();
    }
  
    // Getter y Setter para idAdministrador
    public function getIdAdministrador() {
      return $this->idAdministrador;
    }
  
    public function setIdAdministrador($idAdministrador) {
      $this->idAdministrador = $this->db->real_escape_string($idAdministrador);
    }
  
    // Getter y Setter para nombre
    public function getNombre() {
      return $this->nombre;
    }
  
    public function setNombre($nombre) {
      
      $this->nombre = $this->db->real_escape_string($nombre);
    }
  
    // Getter y Setter para apellidoPaterno
    public function getApellidoPaterno() {
      return $this->apellidoPaterno;
    }
  
    public function setApellidoPaterno($apellidoPaterno) {
      $this->apellidoPaterno = $this->db->real_escape_string($apellidoPaterno);
    }
  
    // Getter y Setter para apellidoMaterno
    public function getApellidoMaterno() {
      return $this->apellidoMaterno;
    }
  
    public function setApellidoMaterno($apellidoMaterno) {
      $this->apellidoMaterno = $this->db->real_escape_string($apellidoMaterno);
    }
  
    // Getter y Setter para email
    public function getEmail() {
      return $this->email;
    }
  
    public function setEmail($email) {
      $this->email = $this->db->real_escape_string($email);
    }
  
    // Getter y Setter para contraseña
    public function getContraseña() {
      return $this->contraseña;
    }
  
    public function setContraseña($contraseña) {
      $this->contraseña = $contraseña;
    }
  
    // Getter y Setter para rol
    public function getRol() {
      return $this->rol;
    }
  
    public function setRol($rol) {
     
      $this->rol = $this->db->real_escape_string($rol);
    }


    public function login(){
        $email = $this->getEmail();
        $password = $this->getContraseña();
        $result=false;

        $sql = "SELECT * from administradores WHERE email = '$email' and contraseña = '$password';";
       
        $login=$this->db->query($sql);

        if($login && $login->num_rows==1){
            $result = $login->fetch_object();

        }
          
        return $result;
    
    }

    public function mostrarUsuarios(){
      $usuarios = $this->db->query("SELECT * FROM administradores");
      return $usuarios;

    }

    public function agregarUsuario(){
      $agregar = $this->db->query("INSERT INTO administradores  VALUES(NULL,'{$this->getNombre()}', '{$this->getApellidoPaterno()}', '{$this->getApellidoMaterno()}', '{$this->getEmail()}', '{$this->getContraseña()}', '{$this->getRol()}');");

      return $agregar;
    }
    public function verificarEmail(){
      $verificar = $this->db->query("SELECT * FROM administradores WHERE email = '{$this->getEmail()}'");
      
      return $verificar;

    }

    public function borrarUsuario(){
        $borrar = $this->db->query("DELETE FROM administradores WHERE idAdministrador ='{$this->getIdAdministrador()}';");

        return $borrar;


    }

    public function getOne(){
      $usuario = $this->db->query("SELECT * FROM administradores WHERE idAdministrador = '{$this->getIdAdministrador()}';");
      return $usuario->fetch_object();
      

    }

    public function editarUsuario(){
      $nombre = $this->getNombre();
      $apellidoP = $this->getApellidoPaterno();
      $apellidoM = $this->getApellidoMaterno();
      $email = $this->getEmail();
      $contraseña = $this->getContraseña();
      $rol = $this->getRol();
      $idAdministrador = $this->getIdAdministrador();

      $editar = $this->db->query("UPDATE administradores SET nombre='$nombre', apellidoPaterno='$apellidoP', apellidoMaterno='$apellidoM', email='$email', contraseña='$contraseña', rol='$rol' WHERE idAdministrador = '$idAdministrador';");
      return $editar;

    }


  }

  



?>
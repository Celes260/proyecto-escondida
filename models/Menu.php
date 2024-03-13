<?php
class Menu{
    private $idMenu;
    private $nombre;
    private $precio;
    private $categoria;
    private $descripcion;
    private $imagen;
    private $db;
    private $idAdministrador;

    public function __construct(){
        $this->db=Connect::connect();
    }

    public function getIdMenu() {
        return $this->idMenu;
    }

    public function setIdMenu($idMenu) {
        $this->idMenu = $idMenu;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function getIdAdministrador() {
        return $this->idAdministrador;
    }

    public function setIdAdministrador($idAdministrador) {
        $this->idAdministrador = $idAdministrador;
    }

    public function guardar(){
        $sql="INSERT INTO menu VALUES(NULL,'{$this->getIdAdministrador()}', '{$this->getNombre()}', '{$this->getCategoria()}', '{$this->getPrecio()}','{$this->getDescripcion()}', '{$this->getImagen()}'); ";

        $this->db->query($sql);
        $result = false;

        if($sql){
            $result = true;
        }else{
            $result = false;
        }
        
        return $result;
        

    }
    public function actualizar(){
        $nombre=$this->getNombre();
        $categoria=$this->getCategoria();
        $precio=$this->getPrecio();
        $descripcion = $this->getDescripcion();
        $imagen=$this->getImagen();
        $idMenu = $this->getIdMenu();

        $actualizar = $this->db->query("UPDATE menu SET nombreMenu = '$nombre', categoria = '$categoria', precio = '$precio', descripcion = '$descripcion', imagen='$imagen' WHERE idMenu = '$idMenu';");

    }

    public function mostrarSnacks(){
        $platillo = $this->db->query("SELECT * FROM menu WHERE categoria = 'snacks';");
        return $platillo;



    }

    public function mostrarDesayunos(){
        $desayuno = $this->db->query("SELECT * FROM menu WHERE categoria = 'desayuno';");
        return $desayuno;



    }
    public function mostrarComidas(){
        $comida = $this->db->query("SELECT * FROM menu WHERE categoria = 'comida';");
        return $comida;

    }
    public function mostrarCena(){
        $cena = $this->db->query("SELECT * FROM menu WHERE categoria = 'cena';");
        return $cena;

    }
    public function mostrarBebidas(){
        $bebida = $this->db->query("SELECT * FROM menu WHERE categoria = 'bebidas';");
        return $bebida;

    }
    public function mostrarTodos(){
        $todos = $this->db->query("SELECT idMenu, nombreMenu, categoria, precio, descripcion FROM menu;");
        return $todos;


    }

    public function borrar(){
        $borrar = $this->db->query("DELETE FROM menu WHERE idMenu = '{$this->getIdMenu()}'");

        $result = false;

        if($borrar){
            $result = true;
        }else{
            $result = false;
        }

        return $result;
    }
    
    public function getOne(){
        $obtener = $this->db->query("SELECT * FROM menu WHERE idMenu = '{$this->getIdMenu()}'");
        return $obtener->fetch_object();

    }

}










?>
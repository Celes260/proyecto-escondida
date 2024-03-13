<?php 
class Ordenes{
    private $id_orden;
    private $id_mesa;
    private $db;
    private $id_menu;
    private $idCliente;
    private $id_menu_orden;
    private $time;
    private $fecha;
    private $estado;

    public function __construct(){
        $this->db=Connect::connect();
    }
    
    // Getter y Setter para id_orden
    public function getId_orden() {
        return $this->id_orden;
    }
    
    public function setId_orden($id_orden) {
        $this->id_orden = $id_orden;
    }
    public function getTime() {
        return $this->time;
    }
    
    public function setTime($time) {
        $this->time = $time;
    }

    public function getFecha() {
        return $this->fecha;
    }
    
    public function setfecha($fecha) {
        $this->fecha = $fecha;
    }


    public function getId_menu_orden() {
        return $this->id_menu_orden;
    }
    
    public function setId_menu_orden($id_menu_orden) {
        $this->id_menu_orden = $id_menu_orden;
    }


    public function getId_menu() {
        return $this->id_menu;
    }
    
    public function setId_menu($id_menu) {
        $this->id_menu = $id_menu;
    }

    public function getIdCliente() {
        return $this->idCliente;
    }
    
    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }
    public function getEstado() {
        return $this->estado;
    }
    
    public function setEstado($estado) {
        $this->estado = $estado;
    }
    
    // Getter y Setter para id_mesa
    public function getId_mesa() {
        return $this->id_mesa;
    }
    
    public function setId_mesa($id_mesa) {
        $this->id_mesa = $id_mesa;
    }

    public function obtenerOrden($id_mesa){
        $orden = $this->db->query("SELECT * FROM ordenes WHERE id_mesa=$id_mesa ORDER BY id_orden DESC LIMIT 1;");
        return $orden->fetch_object();

    
    }
    public function ingresarOrden(){
        $insercion = $this->db->query("INSERT INTO menu_ordenes VALUES(NULL,'{$this->getId_menu()}', '{$this->getId_orden()}', '1', '10', '{$this->getTime()}');");
        return $insercion;


    }
    public function obtenerNota(){
        $nota = $this->db->query("SELECT menu.nombreMenu, menu_ordenes.cantidad,menu_ordenes.id_menu_orden, menu.precio FROM menu_ordenes JOIN menu ON menu_ordenes.idMenu = menu.idMenu WHERE menu_ordenes.id_orden = {$this->getId_orden()};");
      
        return $nota;

    }
    public function cobrarCuenta(){
        $cobrar = $this->db->query("INSERT INTO ordenes VALUES(NULL, '{$_SESSION['infoAdmin']->idAdministrador}', '{$this->getId_mesa()}',NULL, NULL, NULL, NULL,NULL,NULL)");
        return $cobrar;
    }

    public function eliminarOrden(){
        $eliminar = $this->db->query("DELETE FROM menu_ordenes WHERE id_menu_orden = '{$this->getId_menu_orden()}'");
        return $eliminar;
    }
    public function ventas(){
        $ventas = $this->db->query("SELECT o.id_orden, a.nombre, a.apellidoPaterno, a.apellidoMaterno, o.id_mesa, o.horaTerminacion, o.totalOrden, o.fecha
        FROM ordenes o
        JOIN administradores a ON o.idAdministrador = a.idAdministrador
        WHERE o.horaTerminacion IS NOT NULL;");

        return $ventas;

    }

    public function ventasDia(){
        $ventasDia = $this->db->query("SELECT o.id_orden, a.nombre, a.apellidoPaterno, a.apellidoMaterno, o.id_mesa, o.horaTerminacion, o.totalOrden, o.fecha
        FROM ordenes o
        JOIN administradores a ON o.idAdministrador = a.idAdministrador
        WHERE o.horaTerminacion IS NOT NULL
        AND o.fecha = '{$this->getFecha()}'; ");

        return $ventasDia;


    }

    public function obtenerUltimaOrdenCliente(){
        $ultima = $this->db->query("SELECT * FROM ordenes
        WHERE idCliente = '{$this->getIdCliente()}'
        ORDER BY id_orden DESC
        LIMIT 1;
        ");

        return $ultima->fetch_object();

    }
    public function crearOrdenCliente(){
        $crear = $this->db->query("INSERT INTO ordenes VALUES(NULL, NULL, NULL, '{$this->getIdCliente()}',NULL, NULL,'sin confirmar', NULL, NULL)");

        return $crear;

    }
    public function mostrarPedidosCliente(){
        $pedidos= $this->db->query("SELECT *
        FROM ordenes
        WHERE idCliente = '{$this->getIdCliente()}' AND fecha IS NOT NULL
        ORDER BY id_orden DESC;
        ");

        return $pedidos;

    }
    public function mostrarPedidosAdministrador(){
        $pedidos= $this->db->query("SELECT c.nombre, c.apellidoPaterno, c.apellidoMaterno, o.totalOrden, o.cantidad, o.estado, o.horaTerminacion, o.fecha, o.id_orden
        FROM ordenes o
        JOIN clientes c ON o.idCliente = c.idCliente
        WHERE o.estado = 'sin confirmar' AND o.idCliente IS NOT NULL AND o.fecha IS NOT NULL;
         ");

        return $pedidos;

    }
    public function mostrarPedidosConfirmadosAdministrador(){
        $pedidos= $this->db->query("SELECT c.nombre, c.apellidoPaterno, c.apellidoMaterno, o.totalOrden, o.cantidad, o.estado, o.horaTerminacion, o.fecha, o.id_orden
        FROM ordenes o
        JOIN clientes c ON o.idCliente = c.idCliente
        WHERE o.estado = 'confirmado' AND o.idCliente IS NOT NULL AND o.fecha IS NOT NULL;
         ");

        return $pedidos;

    }

    public function mostrarContenidoPedidos(){
        $pedidosContenido= $this->db->query("SELECT m.imagen, m.nombreMenu, m.precio, mo.cantidad
        FROM menu_ordenes mo
        JOIN menu m ON mo.idMenu = m.idMenu
        WHERE mo.id_orden = '{$this->getId_orden()}';
        
        ");

        return $pedidosContenido;


    }

    public function confirmarOrden(){
        $confirmar = $this->db->query("UPDATE ordenes SET estado = '{$this->getEstado()}', horaTerminacion = '{$this->getTime()}' WHERE id_orden = '{$this->getId_orden()}' ");

        return $confirmar;
    }

    public function rechazarPedido(){
        $confirmar = $this->db->query("UPDATE ordenes SET estado = 'rechazado' WHERE id_orden = '{$this->getId_orden()}' ");

        return $confirmar;



    }



}






?>
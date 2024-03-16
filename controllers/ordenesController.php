<?php
require_once 'models/ordenes.php';
require_once 'models/Menu.php';


class OrdenesController{

    public static function cobrar(){
        Utils::isAdmin();

        $menu = new Menu();
        $snacks = $menu->mostrarSnacks();
        $desayunos = $menu->mostrarDesayunos();
        $comida = $menu->mostrarComidas();
        $cena = $menu->mostrarCena();
        $bebida = $menu->mostrarBebidas();

        if(!isset($_GET['id_mesa'])){
          require_once 'views/administrador/sidebar.php';
          require_once 'views/administrador/mesas.php'; 
        }
        
        if(isset($_GET['idMenu']) && isset($_GET['id_orden'])){
          $id_mesa = $_GET['id_mesa'];
          $idMenu = $_GET['idMenu'];
          $id_orden = $_GET['id_orden'];
          date_default_timezone_set('America/Mexico_City');
          $horaActual = date("H:i:s");
          
          $ordenes = new Ordenes();
          $ordenes->setId_menu($idMenu);
          $ordenes->setId_orden($id_orden);
          $ordenes->setTime($horaActual);
          $ordenes->ingresarOrden();

          // $num = $_POST['numero'];
	        // echo "El número ingresado fue: " . $num;

     
          echo "<script>alert('platillo agregado');</script>";

        }
        require_once 'views/administrador/sidebar.php';
          require_once 'views/menu/cobrar.php';

      
          

       }

       public static function nota(){
        Utils::isAdmin();
        $id_orden = $_GET['id_orden'];
        $ordenes = new Ordenes();
        $ordenes->setId_orden($id_orden);
        $ord = $ordenes->obtenerNota();
        $precioTotal= 0;

        require_once 'views/administrador/sidebar.php';
          require_once 'views/ordenes/notas.php';

       }

       public function cobrarCuenta(){
          $ordenes = new Ordenes();
          date_default_timezone_set('America/Mexico_City');
          $horaActual = date("H:i:s");
          $fechatActual = date("Y-m-d");
          $idAdministrador = $_SESSION['infoAdmin']->idAdministrador;
          var_dump($idAdministrador);
          $ordenes->setId_mesa($_GET['id_mesa']);
          $db=connect::connect();
          $horaTerminacion = "UPDATE ordenes SET horaTerminacion = '$horaActual', idAdministrador='$idAdministrador', fecha = '$fechatActual' WHERE id_orden = '{$_GET['id_orden']}';";
          
          $hrTerm = $db->query($horaTerminacion);
          
          
          $ordenes->cobrarCuenta();
          ordenesController::cobrar();
          
       
          
       }

       public function eliminar(){
        $ordenes = new Ordenes();
        $ordenes->setId_menu_orden($_GET['id_orden_menu']);
        $ordenes->eliminarOrden();
        ordenesController::nota();
      

       }
       
       public function ventas(){
        Utils::adminPrincipal($_SESSION['infoAdmin']->rol);
        $ordenes = new Ordenes();
        $ventas = $ordenes->ventas();
        $vendido = 0;
       
        require_once 'views/administrador/sidebar.php';
        require_once 'views/ordenes/ventas.php';

       }
       public function ventasDia(){
        if(isset($_POST)){
          $dia = $_POST['fecha'];
          $vendido = 0;
          $ordenes = new Ordenes();
          $ordenes->setFecha($dia);
          $ventas = $ordenes->ventasDia();
          



          require_once 'views/administrador/sidebar.php';
          require_once 'views/ordenes/ventas.php';
        }

       }

       public function vendidoPorOrden(){

        Utils::isAdmin();
        $id_orden = $_GET['id_orden'];
        $ordenes = new Ordenes();
        $ordenes->setId_orden($id_orden);
        $ord = $ordenes->obtenerNota();
        $precioTotal= 0;
          require_once 'views/administrador/sidebar.php';
          require_once 'views/ordenes/vendidoPorOrden.php';
       }

       public function confirmarOrden(){
       
          if(isset($_SESSION['carrito']) && $_SESSION['carrito'] != null){
            date_default_timezone_set('America/Mexico_City');
       
           $fechatActual = date("Y-m-d");

            $ordenes = new Ordenes();
            $ordenes->setIdCliente($_SESSION['identity']->idCliente);
            $orden=$ordenes->obtenerUltimaOrdenCliente();
            
            
            if($orden!=true) {
              echo"no hay registro";
              $ordenes->crearOrdenCliente();
              $ord=$ordenes->obtenerUltimaOrdenCliente();
              $id_orden =$ord->id_orden;
            }else{
              
              $id_orden = $orden->id_orden;
            }
            
            $total=0;
            $cantidadTotal = 0;
            $carrito = $_SESSION['carrito'];
            foreach($carrito as $indice => $elemento){
              $idMenu = $elemento['id_menu'];
              $unidades = $elemento['unidades'];
              $cantidadTotal +=$unidades;
              $db=connect::connect();
              $añadirCarrito = $db->query("INSERT INTO menu_ordenes VALUES(NULL,'$idMenu', '$id_orden','$unidades',NULL, NULL); ");
              $totalCuenta = $elemento['precio']*$elemento['unidades'];
              $total += $totalCuenta;
              
            }
            
            $ordenAcutalizada = $db->query("UPDATE ordenes SET totalOrden='$total',cantidad='$cantidadTotal', fecha='$fechatActual' WHERE id_orden='$id_orden' ");
            
            
            $ordenes->crearOrdenCliente();
            unset($_SESSION['carrito']);
            $_SESSION['carrito']=null;
            header("Location: carrito");
            
          }else{
            
            echo "<script>alert('carrito vacio');</script>";
              header("Location: carrito");
          }
            
          }
       public function carrito(){
         $carrito = new carritoController();
         $carrito->index();
         
         
        }

        public function mostrarPedidosCliente(){
          $ordenes = new Ordenes();
          $ordenes->setIdCliente($_SESSION['identity']->idCliente);
          $pedidos=$ordenes->mostrarPedidosCliente();
          require_once 'views/clientes/pedido.php';
        }

        public function mostrarProductosPedidosClientes(){
          $ordenes = new Ordenes();
          $ordenes->setId_orden($_GET['id_orden']);
          $pedidos=$ordenes->mostrarContenidoPedidos();

          require_once 'views/clientes/contenidoPedido.php';




        }

        public function mostrarPedidosAdministrador(){
          $ordenes = new Ordenes();      
          $pedidos=$ordenes->mostrarPedidosAdministrador();
          require_once 'views/administrador/sidebar.php';
          require_once 'views/administrador/confirmarPedidos.php';


        }
        public function mostrarPedidosConfirmados(){
          $ordenes = new Ordenes();      
          $pedidos=$ordenes->mostrarPedidosConfirmadosAdministrador();
          require_once 'views/administrador/sidebar.php';
          require_once 'views/administrador/pedidosConfirmados.php';

        }

        public function horaDeOrden(){
          require_once 'views/administrador/sidebar.php';
          require_once 'views/administrador/horaPedido.php';


        }
        public function confirmarOrdenAdministrador(){
          if($_POST){

            $horaActual = $_POST['hora'];
            $ordenes = new Ordenes();
            $ordenes->setId_orden($_GET['id_orden']);
            $ordenes->setTime($horaActual);
            $ordenes->setEstado($_GET['estado']);
            $ordenes->confirmarOrden();

            $ord = new ordenesController();
            $ord->mostrarPedidosAdministrador();

            
            
            
          }

        }
       
        public function rechazar(){
            $ordenes = new Ordenes();
            $ordenes->setId_orden($_GET['id_orden']);
            $ordenes->rechazarPedido();
            
            $ord = new ordenesController();
            $ord->mostrarPedidosAdministrador();




        }



}


?>
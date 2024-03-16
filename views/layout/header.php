
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?=base_url?>Javascript/main.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="<?=base_url?>assets/css/styleHeader.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/styleLoginVista1.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/styleAdministrar1.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/styleContacto1.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/styleFooter1.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/styleInicio.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/styleMesas.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/styleMenu1.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/styleCrearPlatillos.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/stylePlatillos1.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/styleCobrar.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/styleNotas.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/styleVentas.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/styleRegistroCliente2.css">
    <link rel="stylesheet" href="<?=base_url?>assets/css/styleCarrito4.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <title>La escondida</title>
</head>

<body>
    <!-- Inicio del header -->
    <header id="header" class="">
        <nav id="nav">
            
            <ul id="ul-menu">
                <li><a href="<?=base_url?>cliente/inicio">Inicio</a></li>
                <li><a href="<?=base_url?>Menu/platillos">Menú</a></li>
             

                <li id="ul-logo"><a href=""><img src="<?=base_url?>assets/imagenes/logoEscondida.jpeg" alt="imagen escondida" id="logo"></a>
                </li>

                <li><a href="<?=base_url?>cliente/contacto">Contacto</a></li>
           

                <?php if(isset($_SESSION['estadoLoginAdmin'])): ?>
                         <li><a href="<?=base_url?>#"><?=$_SESSION['nombreLogin']?></a>
                            <ul id="ulAdmin">
                                <li><a href="<?=base_url?>administrador/administrar">Gestionar</a></li>
                                <li><a href="<?=base_url?>administrador/logout ">Cerrar Sesión</a></li>
                                
                            </ul>
                        </li>
                    <?php elseif(isset($_SESSION['clienteLogin'])): ?>
                        <li><?=$_SESSION['identity']->nombre?>
                        <ul id="ulCliente">
                                <li><a href="<?=base_url?>carrito/index">Carrito</a></li>
                                <li><a href="<?=base_url?>ordenes/mostrarPedidosCliente">Pedidos</a></li>
                              
                                <li><a href="<?=base_url?>cliente/perfil">perfil</a></li>
                                <li><a href="<?=base_url?>cliente/logout ">Cerrar Sesión</a></li>
                                
                            </ul>
                        </li>

                    <?php else:?>
                        
                <li><a href="<?=base_url?>cliente/loginVista">Ingresa/registrate</a></li>
                <?php endif; ?>

                

            </ul>

            <img src="<?=base_url?>assets/imagenes/logoEscondida.jpeg" id="logo-menu" alt="logo">

        </nav>

       
            <i class='bx bx-menu' id="menu"></i>
        

    </header>
    <div id="header-f"></div>
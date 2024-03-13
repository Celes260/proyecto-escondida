 <div id="divCarrito">
        <h2>Carrito</h2>
      

        <div class="divTablaCarrito">


                <?if(isset($_SESSION['carrito'])):?>
                <?php $total=0;?>
                <?php foreach($carrito as $indice => $elemento):
                    $menu = $elemento['menu'];
                    $totalCuenta = $elemento['precio']*$elemento['unidades'];
                    $total += $totalCuenta;
                    ?>
               
                    <img class="imagenesCarrito" src="<?=base_url?>uploads/images/<?=$menu->imagen?>" alt="imagen">
                    
                    <div class="info-carrito">
                        <p><?=$menu->nombreMenu?> </p>
                    
                        <p>Precio:<?=$menu->precio?>$</p> 
                      
                        <p>Cantidad: <?=$elemento['unidades']?> </p>
                    </div>

                    <a href="<?=base_url?>carrito/eliminarProductoDelCarrito&id_menu=<?=$elemento['id_menu']?>" class="eliminarMenu">Eliminar</a>

                
                     <?php endforeach;?>
                 <?endif;?>

       
       
        </div>
          <span class="cuenta">Precio de la orden: <?=$total?>$</span>
          <div class="botonesCarrito">

              <a href="<?=base_url?>ordenes/confirmarOrden" class="boton">Confirmar</a>
              <a id="vaciarCarrito" href="<?=base_url?>carrito/vaciarCarrito" class="boton">Vaciar carrito</a>
            </div>          
    </div>
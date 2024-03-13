<div id="divMenu">
            <h2>Mesa <?=$_GET['id_mesa']?></h2>

            
            <div class="divTabla">


                <table>
                    <th>nombre</th>
                    <th>cantidad</th>
                    <th>precio</th>
                    
                    <?php while($notas = $ord->fetch_object()):?>
                        <?php
                       
                               $precioTotal += $notas->precio;
                                
                                  $db=connect::connect();
                                  $updatePrecio = "UPDATE ordenes SET totalOrden = '$precioTotal' WHERE id_orden = '{$_GET['id_orden']}'; ";
                                  $updPrecio = $db->query($updatePrecio);


                        ?>
                    <tr>
                        <td><?=$notas->nombreMenu?></td>
                        <td><?=$notas->cantidad?></td>
                        <td><?=$notas->precio?>$</td>
                    
                        <td><a class="eliminarMenu" href="<?=base_url?>ordenes/eliminar&id_orden_menu=<?=$notas->id_menu_orden?>&id_mesa=<?=$_GET['id_mesa']?>&id_orden=<?=$_GET['id_orden']?>">eliminar</a></td>
                    </tr>
                    <?php endwhile; ?>
                   
                    
                    
                </table>
           
            </div>
            <p class="cuenta">Precio total: <?=$precioTotal?></p>

             <div class="botonesNota">
                 <a href="<?=base_url?>ordenes/cobrarCuenta&id_mesa=<?=$_GET['id_mesa']?>&id_orden=<?=$_GET['id_orden']?>" class="boton">Cobrar cuenta</a>
                 <a href="<?=base_url?>ordenes/cobrar&id_mesa=<?=$_GET['id_mesa']?>" class="boton">Agregar platillo</a>

             </div>
            
            

        </div>
    </div>
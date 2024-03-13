<div id="divMenu">
            <h2>Mesa <?=$_GET['id_mesa']?></h2>
             <p>Atendido por <?=$_GET['nombre']?> el dia <?=$_GET['dia']?> </p>
            

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
                    
                    </tr>
                    <?php endwhile; ?>
                   
                    
                    
                </table>
           
            </div>
            <p class="cuenta">Precio total: <?=$precioTotal?>$</p>

          
            
            

        </div>
    </div>
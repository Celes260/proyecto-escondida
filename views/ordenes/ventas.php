<div id="divMenu">
            <h2>Ventas</h2>
            <form id="formCalendario" action="ventasDia" method="post">
            <p>Seleccione un dia en particular</p>
            <input id="calendario" type="date" name="fecha" id="fecha" value="<?php echo date('Y-m-d'); ?>">
             <input type="submit" value="Buscar ventas">
            </form>


            <div class="divTabla">


                <table>
                    <th>No. Orden</th>
                    <th>Nombre</th>
                    <th>Mesa</th>
                    <th>Hora</th>
                    <th>Fecha</th>
                    <th>total de la orden</th>

                    <?php while($vent = $ventas->fetch_object()):?>
                    <tr>
                        <td><a id="enlaceOrden "href="vendidoPorOrden&id_mesa=<?=$vent->id_mesa?>&id_orden=<?=$vent->id_orden?>&nombre=<?=$vent->nombre; echo " ".$vent->apellidoPaterno; echo " ".$vent->apellidoMaterno?>&dia=<?=$vent->fecha?>"><?=$vent->id_orden?></a></td>
                        <td><?=$vent->nombre; echo " ".$vent->apellidoPaterno; echo " ".$vent->apellidoMaterno  ?></td>
                        <td><?=$vent->id_mesa?></td>
                        <td><?=$vent->horaTerminacion?></td>
                        <td><?=$vent->fecha?></td>
                        <td><?=$vent->totalOrden?>$</td>
                    </tr>

                      <?php $vendido += $vent->totalOrden;?>

                    <?php endwhile; ?>
                 
                  
                    
                </table>
           
            </div>
            <p class="cuenta">Total vendido: <?=$vendido?>$</p>    
    </div>
</div>
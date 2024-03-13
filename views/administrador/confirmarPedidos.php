<div id="divMenu">
    <h2>Pedidos</h2>

   

    <div class="divTabla">


        <?php if(isset($_SESSION['borrado'])): ?>
                <span class="guardado">Producto borrado exitosamente</span>

            <?php endif; ?>
            <?php if(isset($_SESSION['platilloGuardado'])): ?>
                <span class="guardado" >Platillo guardado exitosamente</span>

            <?php endif; ?>

        <table>
            <th>Nombre del cliente</th>
            <th>Precio total de la orden</th>
            <th>Cantidad</th>
            <th>Estado</th>
            <th>Fecha</th>

            <?php while($ped= $pedidos->fetch_object()):?>
                    <tr>
                        <td><?=$ped->nombre." ".$ped->apellidoPaterno." ".$ped->apellidoMaterno  ?></td>
                        <td><a class="enlacePedido" href="<?=base_url?>ordenes/mostrarProductosPedidosClientes&id_orden=<?=$ped->id_orden?>"><?=$ped->totalOrden?>$</a></td>
                        <td><?=$ped->cantidad?></td>
                        <td><?=$ped->estado?></td>
                        <td><?=$ped->fecha?></td>
                        <td><a id="confirmar" href="<?=base_url?>ordenes/horaDeOrden&id_orden=<?=$ped->id_orden?>&estado=confirmado">Confirmar</a></td>
                        <td><a class="eliminarMenu" href="<?=base_url?>ordenes/rechazar&id_orden=<?=$ped->id_orden?>">Rechazar</a></td>
                    </tr>
                    <?php endwhile; ?>


        </table>

    </div>

    <a href="<?=base_url?>ordenes/mostrarPedidosConfirmados" class="boton">Pedidos confirmados</a>

    <?php 
    ?>
</div>
</div>
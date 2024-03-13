<div id="divCarrito">
        <h2>Pedidos</h2>
        <div class="divTablaCarrito div-pedido">
          <table>
                <th class="f-pedido">Precio total de la orden</th>
                <th class="f-pedido">Cantidad</th>
                <th class="f-pedido">Estado</th>
                <th class="f-pedido">Fecha</th>
                <th class="f-pedido">Hora de entrega</th>

                <?php while($ped= $pedidos->fetch_object()):?>
                <tr>
                    <td ><a class="enlacePedido f-pedido" href="<?=base_url?>ordenes/mostrarProductosPedidosClientes&id_orden=<?=$ped->id_orden?>"><?=$ped->totalOrden?>$</a></td>
                    <td class="f-pedido"><?=$ped->cantidad?></td>
                    <td class="f-pedido"><?=$ped->estado?></td>
                    <td class="f-pedido"><?=$ped->fecha?></td>
                    <td class="f-pedido"><?=$ped->horaTerminacion?></td>
                </tr>
                <?php endwhile; ?>
               
                
            </table>
        </div>
    </div>
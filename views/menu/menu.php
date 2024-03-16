<div id="divMenu">
    <h2>Menu</h2>

    <select name="" id=""  onchange="window.location.href = this.value;" >
        <option  value="<?=base_url?>Menu/platillos"><a href="<?=base_url?>menu/platillos">Desayunos</a></option>
        <option value="">Snacks</option>
        <option  value="">Bebidas</option>
        <option value="">Postres </option>
    </select>

    <div class="divTabla">


        <?php if(isset($_SESSION['borrado'])): ?>
                <span class="guardado">Producto borrado exitosamente</span>

            <?php endif; ?>
            <?php if(isset($_SESSION['platilloGuardado'])): ?>
                <span class="guardado" >Platillo guardado exitosamente</span>

            <?php endif; ?>

        <table>
          
            <th>Nombre</th>
            <th>Categoria</th>
            <th>Precio</th>
            <th>Descripcion</th>

            <?php while($platillos = $menu->fetch_object()):?>
            <tr>
                <td><a href="<?=base_url?>menu/editarMenu&idMenu=<?=$platillos->idMenu?>"><?=$platillos->nombreMenu; ?></a></td>
                <td><?=$platillos->categoria;?></td>
                <td><?=$platillos->precio; ?>$</td>
                <td><?=$platillos->descripcion; ?></td>
                <td>
                    <a href="<?=base_url?>Menu/borrar&idMenu=<?=$platillos->idMenu?>" class="eliminarMenu">Eliminar</a>
                   
                </td>



            </tr>

            <?php endwhile; ?>

        </table>

    </div>

    <a href="<?=base_url?>Menu/crearMenu" class="boton">crear platillo</a>

    <?php Utils::deleteSession("borrado"); 
          Utils::deleteSession("platilloGuardado"); 
    ?>
</div>
</div>
<div id="divMenu">
    <h2>Usuarios</h2>

    <div class="divTabla">

    <?php if(isset($_SESSION['creacionUsuario'])):?>
                <span class="guardado">Usuario guardado exitosamente</span>
            <?php endif; ?>
            <?php if(isset($_SESSION['usuarioBorrado'])):?>
                <span class="guardado">Usuario borrado exitosamente</span>
            <?php endif; ?>
            <?php if(isset($_SESSION['actualizacionUsuarios'])):?>
                <span class="guardado">Usuario actualizado exitosamente</span>
            <?php endif; ?>

        <table>
          
            <th>Nombre</th>
            <th>Categoria</th>
            

            <?php while($adm = $admins->fetch_object()):?>
            <tr>
                <td><a href="<?=base_url?>administrador/editarUsuario&idAdministrador=<?=$adm->idAdministrador?>"> <?=$adm->nombre; ?></a></td>
                <td><?=$adm->rol;?></td>
                
                <td>
                    <a href="<?=base_url?>administrador/borrarUsuario&idAdministrador=<?=$adm->idAdministrador?>" class="eliminarMenu">Eliminar</a>
                   
                </td>



            </tr>

            <?php endwhile; ?>

        </table>

    </div>

    <a href="<?=base_url?>administrador/crearUsuario" class="boton">crear usuario</a>

    <?php 
    Utils::deleteSession('creacionUsuario');
    Utils::deleteSession('usuarioBorrado');
    Utils::deleteSession('actualizacionUsuarios'); 
    ?>
</div>
</div>
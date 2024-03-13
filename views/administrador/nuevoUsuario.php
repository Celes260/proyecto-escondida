<div id="crearPlatillos">
            <h2>Crear usuario</h2>
            
            <?php if(isset($upd) && is_object($upd)):?>
            <?php $url_action= base_url."administrador/guardarUsuario&idAdministrador=".$upd->idAdministrador; ?>

            <?php else: ?>
           
                    <?php $url_action= base_url."administrador/guardarUsuario" ?>
            <?php endif;  ?>

            <form id="formCrearPlatillo"action="<?=$url_action?>" method="post">
               
                <?php if(!isset($_SESSION['validacionUsuarios']['nombre'])):?>
                    <input type="text" name="nombre" id="" class="inputsPlatillos" placeholder="Nombre" value="<?= isset($upd) && is_object($upd)?$upd->nombre:"" ?>">
                <?php else:?>
                    <input type="text" name="nombre" id="" placeholder="Nombre vacio" class="inputVacio">
                <?php endif;?>

                <?php if(!isset($_SESSION['validacionUsuarios']['apellidoP'])):?>
                    <input type="text" name="apellidoP" id="" class="inputsPlatillos"  placeholder="Apellido Paterno" value="<?= isset($upd) && is_object($upd)?$upd->apellidoPaterno:"" ?>">
                <?php else:?>
                    <input type="text" name="apellidoP" id="" placeholder="Apellido Paterno vacío" class="inputVacio">
                <?php endif;?>
                
                <?php if(!isset($_SESSION['validacionUsuarios']['apellidoM'])):?>
                    <input type="text" name="apellidoM" id="" class="inputsPlatillos"  placeholder="Apellido materno" value="<?= isset($upd) && is_object($upd)?$upd->apellidoMaterno:"" ?>">
                <?php else:?>
                    <input type="text" name="apellidoM" id="" placeholder="Apellido materno vacío" class="inputVacio">
                <?php endif;?>

                <?php if(!isset($_SESSION['validacionUsuarios']['email'])):?>
                    <input type="text" name="email" id="" class="inputsPlatillos"  placeholder="email" value="<?= isset($upd) && is_object($upd)?$upd->email:"" ?>">
                <?php else:?>
                    <input type="text" name="email" id="" placeholder="email vacío" class="inputVacio">
                <?php endif;?>
               
                <?php if(!isset($_SESSION['validacionUsuarios']['contraseña'])):?>
                    
                    <input type="password" name="contraseña" class="inputsPlatillos"  id="" placeholder="Contraseña" value="<?= isset($upd) && is_object($upd)?$upd->contraseña:"" ?>">
                <?php else:?>
                    <input type="text" name="contraseña" id="" placeholder="contraseña vacía" class="inputVacio">
                <?php endif;?>
               
                <?php if(!isset($_SESSION['validacionUsuarios']['confirmacionContraseña'])):?>
                    
                    <input type="password" class="inputsPlatillos"  name="confirmacionContraseña" id="" placeholder="Confirme la Contraseña" value="<?= isset($upd) && is_object($upd)?$upd->contraseña:"" ?>">
                <?php else:?>
                    <input type="text" name="confirmacionContraseña" id="" placeholder="confirmacion de contraseña vacia" class="inputVacio">
                <?php endif;?>

                

                
                
                
                
                
                
                <select name="categoria" id="" class="inputsPlatillos"  value="ff">
                    <?php if(isset($upd) && is_object($upd) && $upd->rol=="admin"):?>
                    <option value="admin" >Administrador</option>
                    <option value="cajero">cajero</option>
                    <?php endif; ?>

                    <?php if(isset($upd) && is_object($upd) && $upd->rol=="cajero"):?>
                        <option value="cajero">cajero</option>
                        <option value="admin" >Administrador</option>
                    <?php endif; ?>

                    <?php if(!isset($upd)):?>
                        <option value="admin" >Administrador</option>    
                        <option value="cajero">cajero</option>
                    <?php endif; ?>

                        
                        




                   
                </select>
              
                <?php Utils::deleteSession('validacionUsuarios'); 
                    
                ?>
                <input type="submit" name="" id="" value="<?= isset($upd) && is_object($upd)?'Actualizar usuario':'Crear usuario' ?>">
                
            </form>

        </div>
        
       
    </div>
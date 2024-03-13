<h2 id="titulo">Ingrese sus datos</h2>
    <div id="divPrincipalRegistro">

 
            <form action="<?=base_url?>cliente/guardarCliente" method="POST" id="registroFormulario">
                <div id="divGeneralCampos">

                    <div class="campos">
                        
                        <?php if(isset($_SESSION['erroresRegistro']['nombre'])): ?>
                            <input type="text" name="nombre"  placeholder="Nombre vacio" class="camposRegistro" class="inputVacio">
                        <?php else: ?>
                            <input id="inp-nbr" type="text" name="nombre"placeholder="Nombre" class="camposRegistro" value="<?= isset($upd) && is_object($upd)?$upd->nombre:"" ?>" >       
                       <?php endif;?>

                       <?php if(isset($_SESSION['erroresRegistro']['apellidoP'])): ?>
                        <input type="text" name="apellidoP" placeholder="Apellido paterno vacio" class="camposRegistro" class="inputVacio">
                        <?php else: ?>
                            <input type="text" name="apellidoP" value="<?= isset($upd) && is_object($upd)?$upd->apellidoPaterno:"" ?>"  placeholder="Apellido paterno" class="camposRegistro">      
                       <?php endif;?>
                    
                       <?php if(isset($_SESSION['erroresRegistro']['apellidoM'])): ?>
                        <input type="text" name="apellidoM"  placeholder="Apellido materno vacio" class="camposRegistro">
                        <?php else: ?>
                            <input type="text" name="apellidoM" value="<?= isset($upd) && is_object($upd)?$upd->apellidoMaterno:"" ?>"  placeholder="Apellido materno" class="camposRegistro">      
                       <?php endif;?>
                        
                       <?php if(isset($_SESSION['erroresRegistro']['ciudad'])): ?>
                        <input type="text" name="ciudad"  placeholder="Ciudad vacia" class="camposRegistro">
                        <?php else: ?>
                            <input type="text" name="ciudad" value="<?= isset($upd) && is_object($upd)?$upd->ciudad:"" ?>"  placeholder="ciudad" class="camposRegistro">      
                       <?php endif;?>
                        
                       <?php if(isset($_SESSION['erroresRegistro']['calle'])): ?>
                        <input type="text" name="calle"  placeholder="Calle vacia" class="camposRegistro">
                        <?php else: ?>
                            <input type="text" name="calle" value="<?= isset($upd) && is_object($upd)?$upd->calle:"" ?>"  placeholder="Calle" class="camposRegistro">   
                       <?php endif;?>
                        
                        
                    </div>
                    <div class="campos">
                        
                    <?php if(isset($_SESSION['erroresRegistro']['numeroCasa'])): ?>
                         <input type="number" name="numeroCasa"  placeholder="Numero de casa vacio" class="camposRegistro">
                        <?php else: ?>
                            <input type="number" name="numeroCasa" value="<?= isset($upd) && is_object($upd)?$upd->numeroCasa:"" ?>"   placeholder="Numero de casa" class="camposRegistro">
                       <?php endif;?>

                       

                       <?php if(!isset($_SESSION['identity'])): ?>
                        <?php if(isset($_SESSION['erroresRegistro']['email'])): ?>
                            <input type="email" name="email"  id="" placeholder="email vacia" class="camposRegistro">
                        <?php else: ?>
                            <input type="email" name="email" value="<?= isset($upd) && is_object($upd)?$upd->email:"" ?>"  id="" placeholder="email" class="camposRegistro">
                       <?php endif;?>
                       <?php if(isset($_SESSION['erroresRegistro']['contraseña'])): ?>
                          <input type="password" name="contraseña"  placeholder="Contraseña vacia" class="camposRegistro">

                        <?php else: ?>
                            <input type="password" name="contraseña"  placeholder="Contraseña" class="camposRegistro">
                       <?php endif;?>
                  
                       <?php if(isset($_SESSION['erroresRegistro']['confirmarContraseña'])): ?>
                             <input type="password" name="confirmarContraseña" placeholder="Confirmar contraseña vacia" class="camposRegistro">
                        <?php else: ?>
                            <input type="password" name="confirmarContraseña" placeholder="Confirmar contraseña" class="camposRegistro">
                       <?php endif;?>
                       <?php endif; ?>
                        
                        
                    </div>
                </div>
                <input type="submit" name="" id="submitRegistro" value="guardar">
            </form>
            
            <?php Utils::deleteSession('erroresRegistro');?>
        
        


    </div>
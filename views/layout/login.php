<article id="art-login">

        <h2 class="h2-login">Iniciar sesión o crear una cuenta</h2>
        <div id="divArticleLogin">

            <div id="divLogin">
                <?php if(isset($_SESSION['loginAdmin'])):?>
                <p>Administrador existente</p>
                <?php else:?>
                    <p>Cliente existente</p>

                    <?php endif;?>
                    <?php if(isset($_SESSION['error_login'])): ?>
                            <p>Datos incorrectos</p>
                        <?php endif; ?>

                <form id="formLogin" action="<?=base_url?><?=isset($_SESSION['loginAdmin'])?"administrador/login":"cliente/login"?> " method="post">

                    <?php if(isset($_SESSION['validacionLoginEmail'])):?>
                        <input type="email" placeholder="<?=$_SESSION['validacionLoginEmail']?>" name="email" class="inputVacio">
                    <?php else: ?>
                        <input class="inputLogin" type="email" placeholder="Correo electronico" name="email" class="inputsLogin">
                        <?php endif;?>

                        <?php if(isset($_SESSION['validacionLoginPassword'])):?>
                        <input type="password" placeholder="<?=$_SESSION['validacionLoginPassword']?>" name="password" class="inputVacio">
                    <?php else: ?>
                        <input class="inputLogin"  type="password" placeholder="Contraseña" name="password">
                        <?php endif;?>

                        <?php Utils::deleteSession("validacionLoginEmail"); 
                              Utils::deleteSession("validacionLoginPassword"); 
                              Utils::deleteSession("error_login");
                        ?>
                   
                    <input type="submit" value="ingresar" id="submitLogin">
                    
                    <a href="">¿Haz olvidado la contraseña?</a>
                    
                    <?php if(isset($_SESSION['loginAdmin'])):?>
                        <a href="<?=base_url?>cliente/loginVista" id="enlaceAdmin">iniciar como cliente</a>
                <?php else:?>
                    <a href="<?=base_url?>administrador/loginVista" id="enlaceAdmin">iniciar como administrador</a>
                    <?php endif;?>
                    
                    

                    
                </form>
                <a href="<?=base_url?>cliente/registro" id="btnCrear">Crear cuenta</a>
                
            </div>
        </div>
       
    </article>
  
    <!-- fin de article principal -->
<div id="bx-generalVerificacion">
    <h3>Cambiando Contraseña</h3>
    <p>Ingresa la nueva contraseña</p>
    
    <?php
        if(isset($_GET['email'])){
            $email = $_GET['email'];
            echo "<p>$email</p>";
        }else{
           echo "<p>$email</p>";

        }
    ?>
 
 <form action="<?=base_url?>cliente/cambioContra&email=<?=$email?>" method="POST" id="form-codigo">
        <input type="password" name="txtContra" id="txtCodigo" placeholder="<?=isset($_SESSION['sbm-mal'])?$_SESSION['sbm-mal'] :'Ingresar nueva contraseña '?>"  class="<?=isset($_SESSION['sbm-mal'])?'sbm-mal' :' '?>">
        <input type="password" name="txtConfirmacionContra" id="txtCodigo" placeholder="<?=isset($_SESSION['sbm-mal'])?$_SESSION['sbm-mal'] :'Confirmar contraseña '?>"  class="<?=isset($_SESSION['sbm-mal'])?'sbm-mal' :' '?>">
        <input type="submit" name="guardar" id="smb-guardar" value="Guardar" class="">
                                                              

    </form>

</div>
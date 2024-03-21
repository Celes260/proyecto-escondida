    <div id="bx-generalVerificacion">
    <h3>Verifica tu correo electronico</h3>
    <p>Te enviamos un correo a</p>
    
    <?php
        if(isset($_GET['email'])){
            $email = $_GET['email'];
            echo "<p>$email</p>";
        }else{
           echo "<p>$email</p>";

        }
    ?>
 
    <form action="<?=base_url?>cliente/verificacionCodigo&email=<?=$email?>&nmb=<?=$nombre?>&app=<?=$apellidoP?>&apm=<?=$apellidoM?>&calle=<?=$calle?>&ciudad=<?=$ciudad?>&nm=<?=$numeroCasa?>&contra=<?=$contraseña?>" method="POST" id="form-codigo">
        <input type="text" name="txtCodigo" id="txtCodigo" placeholder="<?=isset($_SESSION['sbm-mal'])?'Codigo erroneo' :'Codigo '?>"  class="<?=isset($_SESSION['sbm-mal'])?'sbm-mal' :' '?>">
        <input type="submit" name="guardar" id="smb-guardar" value="Guardar" class="">
                                                              

    </form>

</div>
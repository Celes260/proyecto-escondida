<div id="crearPlatillos">
            <h2>confirmar orden</h2>
             <form action="<?=base_url?>ordenes/confirmarOrdenAdministrador&id_orden=<?=$_GET['id_orden']?>&estado=<?=$_GET['estado']?>" method="post">
                <input type="time" name="hora">
                <input type="submit">


             </form>
            
         
        </div>
        
    </div>
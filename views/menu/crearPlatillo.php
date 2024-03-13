<div id="crearPlatillos">
            <h2>Crear platillo</h2>
            <?php if(isset($men) && is_object($men)):?>
            <?php $url_action = base_url."menu/guardar&idMenu=".$men->idMenu."&nombreImagen=".$men->imagen; ?>

            <?php else: ?>
           
                    <?php $url_action= base_url."menu/guardar" ?>
            <?php endif;  ?>

            <form id="formCrearPlatillo"action="<?=$url_action?>" method="POST" enctype="multipart/form-data">

                <?php if(isset($_SESSION['validacionMenu']['nombre'])): ?>
                    <input type="text" name="nombrePlatillo" id="" placeholder="nombre vacio" class="inputVacio" >
                    <?php else: ?>

                    <input type="text" class="inputsPlatillos" name="nombrePlatillo" id="" placeholder="Nombre" value="<?=isset($men)&&is_object($men)?$men->nombreMenu:"" ?>">
                <?php endif;?>
                
                <?php if(isset($_SESSION['validacionMenu']['precio'])): ?>
                        <input type="number"  name="precio" id="" placeholder="Precio vacío" class="inputVacio">
                    <?php else: ?>
                        <input type="number" class="inputsPlatillos" name="precio" id="" placeholder="Precio" value="<?=isset($men)&&is_object($men)?$men->precio:"" ?>">
                   
                <?php endif;?>
                
                <select name="categoria" id=""  class="inputsPlatillos">
                    <?php if(isset($men) && $men->categoria=="Desayuno"):?>
                        <option value="Desayuno">desayuno</option>
                        <option value="Snacks">Snacks</option>
                        <option value="Comida">comida</option>
                        <option value="Cena">Cena</option>
                        <option value="Bebidas">Bebidas</option>
                    <?php endif;?>
                    <?php if(isset($men) && $men->categoria=="Bebidas"):?>
                        <option value="Bebidas">Bebidas</option>
                        <option value="Desayuno">desayuno</option>
                        <option value="Snacks">Snacks</option>
                        <option value="Comida">comida</option>
                        <option value="Cena">Cena</option>
                        
                    <?php endif;?>
                    <?php if(isset($men) && $men->categoria=="Snacks"):?>
                        <option value="Snacks">Snacks</option>
                        <option value="Bebidas">Bebidas</option>
                        <option value="Desayuno">desayuno</option>
                        <option value="Comida">comida</option>
                        <option value="Cena">Cena</option>
                        
                    <?php endif;?>
                    <?php if(isset($men) && $men->categoria=="Comida"):?>
                        <option value="Comida">comida</option>
                        <option value="Snacks">Snacks</option>
                        <option value="Bebidas">Bebidas</option>
                        <option value="Desayuno">desayuno</option>
                        <option value="Cena">Cena</option>
                        
                    <?php endif;?>
                    <?php if(isset($men) && $men->categoria=="Cena"):?>
                        <option value="Cena">Cena</option>
                        <option value="Comida">comida</option>
                        <option value="Snacks">Snacks</option>
                        <option value="Bebidas">Bebidas</option>
                        <option value="Desayuno">desayuno</option>
                        
                        
                    <?php endif;?>
                    <?php if(!isset($men)):?>
                        <option value="Cena">Cena</option>
                        <option value="Comida">comida</option>
                        <option value="Snacks">Snacks</option>
                        <option value="Bebidas">Bebidas</option>
                        <option value="Desayuno">desayuno</option>
                        
                        
                    <?php endif;?>


                </select>
                <?php if(isset($_SESSION['validacionMenu']['descripcion'])): ?>
                    <textarea name="descripcion" id="" cols="30" rows="10" class="inputVacio" placeholder="Descripcion vacía"></textarea >
                    <?php else: ?>
                       
                        <textarea name="descripcion" id="" cols="30" rows="10" placeholder="Descripcion" ><?=isset($men)&&is_object($men)?$men->descripcion:"" ?></textarea>
                <?php endif;?>
                
                <input type="file" name="imagen">
                        
                <input type="submit" name="" id="" value="Crear platillo">
                <?php 
                
                $_SESSION['validacionMenu']=null; 
            ?>
            </form>
         
        </div>
        
    </div>
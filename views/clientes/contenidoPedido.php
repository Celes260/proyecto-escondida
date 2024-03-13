<div id="divCarrito">
        <h2>Carrito</h2>
      

        <div class="divTablaCarrito">


         
            
              
                
                <?php while($menu=$pedidos->fetch_object()): ?>
                  
             
                    <img class="imagenesCarrito" src="<?=base_url?>uploads/images/<?=$menu->imagen?>" alt="imagen"> 
        
                    <div class="info-carrito">
                        <p>  <?=$menu->nombreMenu?> </p>
                        <p>Precio: <?=$menu->precio?>$</p>
                        <p>Cantidad: <?=$menu->cantidad?></p>
                    </div>
                        
                  

                
                     <?php endwhile;?>
                

         
       
        </div>
          
               
    </div>
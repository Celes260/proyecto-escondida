<?php
$id_orden = Utils::obtenerOrden($_GET['id_mesa']);

?>

<div id="divCobrar">
            <a class="mesa" href="<?=base_url?>ordenes/nota&id_mesa=<?=$_GET['id_mesa']?>&id_orden=<?=$id_orden->id_orden?>" >Mesa <?=$_GET['id_mesa']?> </a>
            <div class="subCobrar">
<div class="cobrarCategorias">
                
    <div class="tituloCobrarCategoria-desayunos">
            <p class="tituloCat">Desayunos</p>
        </div>
    <!-- Comenzar a iterar en la base de dastos -->
        <?php while($des= $desayunos->fetch_object()): ?>
        
        <a onClick="pedirNumero()" href="<?=base_url?>ordenes/cobrar&id_orden=<?=$id_orden->id_orden; ?>&idMenu=<?=$des->idMenu?>&id_mesa=<?=$_GET['id_mesa']?>&precio=<?=$des->precio?>" class="platilloCobrarCategoria-desayunos">
        <?=$des->nombreMenu?>
        </a>
        <?php endwhile; ?> 
        <!-- javascript -->
        <!-- <script>
		function pedirNumero() {
			var num = prompt("Cantidad:");
			if (num != null) {
				$.ajax({
					type: "POST",
					url: "ordenes/cobrar",
					data: {numero: num},
					success: function(result){
						$('#resultado').html(result);
					}
				});
			}
		}
	</script> -->

        <!-- end javasript -->

    </div>

<div class="cobrarCategorias">
                
            <div class="tituloCobrarCategoria-snack">
                    <p class="tituloCat">Snacks</p>
                </div>
                <!-- Comenzar a iterar en la base de dastos -->
                <?php while($sna= $snacks->fetch_object()): ?>
        
                     <a href="<?=base_url?>ordenes/cobrar&id_orden=<?=$id_orden->id_orden; ?>&idMenu=<?=$sna->idMenu?>&id_mesa=<?=$_GET['id_mesa']?>&precio=<?=$sna->precio?>" class="platilloCobrarCategoria-snack">
                          <?=$sna->nombreMenu?>
                     </a>

                <?php endwhile; ?> 
               

            </div>

            <div class="cobrarCategorias">
                <div class="tituloCobrarCategoria-comidas">
                    <p class="tituloCat">Comidas</p>
                </div>
                <!-- Comenzar a iterar en la base de dastos -->
                <?php while($com= $comida->fetch_object()): ?>
        
                    <a href="<?=base_url?>ordenes/cobrar&id_orden=<?=$id_orden->id_orden; ?>&idMenu=<?=$com->idMenu?>&id_mesa=<?=$_GET['id_mesa']?>&precio=<?=$com->precio?>" class="platilloCobrarCategoria-comidas">
                         <?=$com->nombreMenu?>
                     </a>

                <?php endwhile; ?> 
                
                
            </div>
            <div class="cobrarCategorias">
                <div class="tituloCobrarCategoria-cena">
                    <p  class="tituloCat">Cena</p>
                </div>
                <!-- Comenzar a iterar en la base de dastos -->
                <?php while($cen= $cena->fetch_object()): ?>
        
                    <a href="<?=base_url?>ordenes/cobrar&id_orden=<?=$id_orden->id_orden; ?>&idMenu=<?=$cen->idMenu?>&id_mesa=<?=$_GET['id_mesa']?>&precio=<?=$cen->precio?>" class="platilloCobrarCategoria-cena">
                        <?=$cen->nombreMenu?>
                     </a>

                <?php endwhile; ?> 
                
                
                
            </div>
            <div class="cobrarCategorias">
                <div class="tituloCobrarCategoria-bebidas">
                    <p class="tituloCat" >bebidas</p>
                </div>
                <!-- Comenzar a iterar en la base de dastos -->
                <?php while($beb= $bebida->fetch_object()): ?>
        
                    <a href="<?=base_url?>ordenes/cobrar&id_orden=<?=$id_orden->id_orden; ?>&idMenu=<?=$beb->idMenu?>&id_mesa=<?=$_GET['id_mesa']?>&precio=<?=$beb->precio?>" class="platilloCobrarCategoria-bebidas">
                       <?=$beb->nombreMenu?>
                    </a>

                 <?php endwhile; ?> 
                
                
            </div>
            
          </div>
        </div>
    </div>
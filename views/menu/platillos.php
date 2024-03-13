<article id="generalPlatillos">
        <div class="tituloPlatillos">
            <h2>Menú</h2>
            <img id="adorno" src="<?=base_url?>assets/imagenes/adorno.png" alt="">
        </div>

        <div id="contenidoMenu">
            <div class="categoriasMenu">
                <h3>Desayuno</h3>
                <?php while($desa= $desayunos->fetch_object()): ?>
                <div class="divPlatillo">
                    <div class="divImagen">
                        <img src="<?=base_url?>uploads/images/<?=$desa->imagen?>" alt="platillo">
                    </div>

                    <div class="descripcionPlatillo">
                        <h4 class="h4-menu"><?=$desa->nombreMenu?></h4>
                        <p><?=$desa->descripcion?></p>
                        <p> Precio: <?=$desa->precio?>$</p>
                        <a href="<?=base_url?>carrito/agregar&id_menu=<?=$desa->idMenu?>" class="boton">Agregar </a>

                    </div>

                </div>
                
                <?php endwhile;?>

            </div>

            <div class="categoriasMenu">
                <h3>Snacks</h3>

                <?php while($plat= $snacks->fetch_object()): ?>
                <div class="divPlatillo">
                    <div class="divImagen">
                        <img src="<?=base_url?>uploads/images/<?=$plat->imagen?>" alt="platillo">
                    </div>

                    <div class="descripcionPlatillo">
                        <h4 class="h4-menu"><?=$plat->nombreMenu?></h4>
                        <p><?=$plat->descripcion?></p>
                        <p> Precio: <?=$plat->precio?>$</p>
                        <a href="<?=base_url?>carrito/agregar&id_menu=<?=$plat->idMenu?>" class="boton">Agregar</a>

                    </div>

                </div>
                
                <?php endwhile;?>
               

            </div>

            <div class="categoriasMenu">
                <h3>Comida</h3>

                <?php while($com= $comida->fetch_object()): ?>
                <div class="divPlatillo">
                    <div class="divImagen">
                        <img src="<?=base_url?>uploads/images/<?=$com->imagen?>" alt="platillo">
                    </div>

                    <div class="descripcionPlatillo">
                        <h4 class="h4-menu"><?=$com->nombreMenu?></h4>
                        <p><?=$com->descripcion?></p>
                        <p> Precio: <?=$com->precio?>$</p>
                        <a href="<?=base_url?>carrito/agregar&id_menu=<?=$com->idMenu?>" class="boton">Agregar</a>

                    </div>

                </div>
                
                <?php endwhile;?>

            </div>

            <div class="categoriasMenu">
                <h3>Cena</h3>

                <?php while($cen= $cena->fetch_object()): ?>
                <div class="divPlatillo">
                    <div class="divImagen">
                        <img src="<?=base_url?>uploads/images/<?=$cen->imagen?>" alt="platillo">
                    </div>

                    <div class="descripcionPlatillo">
                        <h4 class="h4-menu"><?=$cen->nombreMenu?></h4>
                        <p><?=$cen->descripcion?></p>
                        <p> Precio: <?=$cen->precio?>$</p>
                        <a href="<?=base_url?>carrito/agregar&id_menu=<?=$cen->idMenu?>" class="boton">Agregar</a>

                    </div>

                </div>
                
                <?php endwhile;?>

            </div>
            <div class="categoriasMenu">
                <h3>Bebidas</h3>

                <?php while($beb= $bebida->fetch_object()): ?>
                <div class="divPlatillo">
                    <div class="divImagen">
                        <img src="<?=base_url?>uploads/images/<?=$beb->imagen?>" alt="platillo">
                    </div>

                    <div class="descripcionPlatillo">
                        <h4 class="h4-menu"><?=$beb->nombreMenu?></h4>
                        <p><?=$beb->descripcion?></p>
                        <p> Precio: <?=$beb->precio?>$</p>
                        <a href="<?=base_url?>carrito/agregar&id_menu=<?=$beb->idMenu?>" class="boton">Agregar</a>

                    </div>

                </div>
                
                <?php endwhile;?>

            </div>

        </div>



    </article>

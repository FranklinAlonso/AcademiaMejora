<?php
function pintar_sidebar($select,$nombre)

{
?>
<div class="menu-sidebar2">
        <div class="logo">
            <a href="#">
                <img src="images/icon/logo-white2.png" alt="Mejora" />
            </a>
        </div>
        <div class="menu-sidebar2__content js-scrollbar1 ">
            <div class="account2 bg-white">
                <div class="image img-cir img-120">
                    <img src="images/icon/avatar-big-04.jpg" alt="John Doe" />
                </div>
                
                <h4 class="name"><?php echo $nombre;?></h4>
                <a href="salir.php">Cerrar Sesion</a>
            </div>
            <nav class="navbar-sidebar2">
                <ul class="list-unstyled navbar__list display: none; ">
                    
                    <li class=" <?php if ($select==="profesor") {
                                                echo "active";
                                            } ?>">
                        <a class="" href="profesor_panel.php">
                            <i class="fas fas fa-user"></i>Mi información
                        </a>
                    </li>
                    <li class="<?php if ($select==="material"||$select==="material-agregar") {
                                                echo "active";
                                            } ?>">
                        <a class="js-arrow" href="">
                            <i class="fas fa-list-alt"></i>Materiales
                            <span class="arrow">
                                <i class="fas fa-angle-down"></i>
                            </span>
                        </a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li  class="<?php if ($select==="material") {
                                                echo "active";
                                            } ?>">
                                <a href="profesor_material.php">
                                <i class="fas fa-table"></i>Material</a>
                            </li>
                            <li  class="<?php if ($select==="material-agregaar") {
                                                echo "active";
                                            } ?>">
                                <a href="profesor_agregar_material.php">
                                    <i class="far fa-file-text"></i>Agregar Material</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div> 
<?php
}
?>
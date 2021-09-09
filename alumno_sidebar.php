<?php
function pintar_sidebar($select,$nomAlu)
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
                    <img src="images/icon/avatar-big-03.jpg" alt="John Doe" />
                </div>
                
                <h4 class="name"><?php echo $nomAlu;?></h4>
                <a class="<?php if ($select==="alumno-perfil") {
                                        echo "text-primary";
                                    } ?>" href="alumno_perfil.php">Mi perfil</a>
                <a href="salir.php">Cerrar Sesion</a>
            </div>
            <nav class="navbar-sidebar2">
                <ul class="list-unstyled navbar__list display: none; ">
                    
                    <li class=" <?php if ($select==="alumno") {
                                                echo "active";
                                            } ?>">
                        <a class="" href="alumno_panel.php">
                            <i class="fas fa-file-text"></i>Mi información
                        </a>
                    </li>
                    <li class="<?php if ($select==="alumno-material") {
                                                echo "active";
                                            } ?>">
                        <a href="alumno_material.php">
                            <i class="fas fa-book"></i>Materiales</a>
                    </li>
                    <li class="<?php if ($select==="alumno-simulacro-notas"||$select==="alumno-simulacro-virtual") {
                                                echo "active";
                                            } ?>">
                        <a class="js-arrow" href="">
                            <i class="fas fa-list-alt"></i>Simulacro
                            <span class="arrow">
                                <i class="fas fa-angle-down"></i>
                            </span>
                        </a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li  class="<?php if ($select==="alumno-simulacro-notas") {
                                                echo "active";
                                            } ?>">
                                <a href="alumno_simulacro_notas.php">
                                <i class="fas fa-table"></i>Notas</a>
                            </li>
                            <li  class="<?php if ($select==="alumno-simulacro-virtual") {
                                                echo "active";
                                            } ?>">
                                <a href="alumno_simulacro_virtual.php">
                                    <i class="far fa-check-square"></i>Simulacro virtual</a>
                            </li>
                        </ul>
                    </li>
                    <li  class="<?php if ($select==="alumno-prematricula") {
                                        echo "active";
                                    } ?>">
                        <a href="alumno_prematricula.php">
                            <i class="far fa-pencil-square-o"></i>Matricula</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div> 
    <!-- /Sidebar -->
<?php
}
?>
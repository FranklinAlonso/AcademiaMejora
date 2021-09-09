<?php
function pintar_sidebar($select,$nombre)
{
?>
<aside class="menu-sidebar2">
    <div class="logo">
        <a href="#">
            <img src="images/icon/logo-white2.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar2__content js-scrollbar1">
        <div class="account2">
            <div class="image img-cir img-120">
                <img src="images/icon/avatar-big-02.jpg" alt="John Doe" />
            </div>
            <h4 class="name"><?php echo $nombre;?></h4>
            <a href="salir.php">Cerrar Sesion</a>
        </div>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
                <li class="<?php if ($select==="Inicio") {
                                                echo "active";
                                            } ?>">
                    <a href="admi_panel.php">
                        <i class="fas fa-home"></i>Inicio
                    </a>
                </li>
                <li class="<?php if ($select==="Administradores") {
                                                echo "active";
                                            } ?>">
                    <a href="admi_administradores.php" >
                        <i class="fas fa-group"></i>Administradores</a>
                </li>
                <li class="<?php if ($select==="Profesores") {
                                                echo "active";
                                            } ?>">
                    <a href="admi_profesores.php">
                        <i class="fas fa-suitcase"></i>Profesores</a>
                </li>
                <li class="<?php if ($select==="Alumnos") {
                                                echo "active";
                                            } ?>">
                    <a href="admi_alumnos.php">
                        <i class="fas fa-pencil-alt"></i>Alumnos</a>
                </li>
                <li class="<?php if ($select==="Cursos") {
                                                echo "active";
                                            } ?>">
                    <a href="admi_cursos.php">
                        <i class="fas fa-book"></i>Cursos</a>
                </li>
                <li class="<?php if ($select==="Ciclos") {
                                                echo "active";
                                            } ?>">
                    <a href="admi_ciclos.php">
                        <i class="fas fa-dot-circle-o"></i>Ciclos</a>
                </li>
                <li class="<?php if ($select==="Aulas") {
                                                echo "active";
                                            } ?>">
                    <a href="admi_aulas.php">
                        <i class="fas fa-archive"></i>Aulas</a>
                </li>
                <li class="<?php if ($select==="Clases") {
                                                echo "active";
                                            } ?>">
                    <a href="admi_clases.php">
                        <i class="fas fa-laptop"></i>Clases</a>
                </li>
                <li class="<?php if ($select==="Simulacros") {
                                                echo "active";
                                            } ?>">
                    <a href="admi_simulacros.php">
                        <i class="fas fa-file-text"></i>Simulacros</a>
                </li>
                <li class="<?php if ($select==="Matricula") {
                                                echo "active";
                                            } ?>">
                    <a href="admi_matricula.php">
                        <i class="fas fa-folder"></i>Matricula</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<?php
}
?>
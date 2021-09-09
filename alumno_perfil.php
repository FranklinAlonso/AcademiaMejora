
<!DOCTYPE html>
<html lang="en">

<?php
    include("head.php");
    include ('bd_Alumno.php');
?>
<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <?php
            include("alumno_sidebar.php");
            pintar_sidebar("alumno-perfil",$nomAlu);
        ?>
        <!-- END MENU SIDEBAR-->
        
        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <?php
                include("alumno_header.php");
            ?>
            <!-- END HEADER DESKTOP-->

            <!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <span class="au-breadcrumb-span">Tu estas aqui:</span>
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="#">Mi perfil</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <section class="statistic">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-xl-10">
                                <!-- RECENT REPORT 2-->
                                <aside class="profile-nav alt">
                                    <section class="card">
                                        <div class="card-header user-header alt bg-dark">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h3 class="text-light display-6">Informacion Personal</h3>
                                                    <p>Detalles</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col col-lg-4">
                                                    <div class="card-body">
                                                        <img class="card-img-top" src="images/icon/avatar-big-03.jpg" alt="Card image cap">
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-8 justify-content-center">
                                                    
                                                    <div class="col col-md-8">
                                                        <strong>Nombre:</strong> <?php echo $row['nombre'];?> 
                                                    </div>
                                                    <div class="col col-md-8">
                                                        <strong>Apellido:</strong> <?php echo $row['apellido'];?> 
                                                    </div>
                                                    <div class="col col-md-8">
                                                        <strong>DNI:</strong> <?php echo $row['DNIAlumno'];?> 
                                                    </div>
                                                    <div class="col-12 col-md-8">
                                                        <strong>Fecha de nacimiento:</strong> <?php echo $row['fechaNacimiento'];?> 
                                                    </div>
                                                    <div class="col col col-md-8">
                                                        <strong>Genero:</strong>  <?php echo $row['genero'];?> 
                                                    </div>
                                                    <div class="col col-md-8">
                                                        <strong>Correo electrónico:</strong> <?php echo $row['correo'];?> 
                                                    </div>
                                                    <div class="col col-md-8">
                                                        <strong>Telefono:</strong> <?php echo $row['telefono'];?> 
                                                    </div>
                                                    <div class="col-12 col-md-8">
                                                        <strong>Direccion:</strong> <?php echo $row['direccion'];?> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </section>
                                </aside>
                                <!-- END RECENT REPORT 2             -->

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2021 LOSFS. Todos los derechos reservados.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <?php
    include("footer.php");
    ?>
</body>

</html>
<!-- end document-->
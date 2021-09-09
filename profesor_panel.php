<?php
    include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php
    include("head.php");
?>

<?php
    include("bd_Profesor.php");
?>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <?php
            include("profesor_sidebar.php");
            pintar_sidebar("profesor",$nombre);
        ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <?php
                include("profesor_header.php");
            ?>
            <!-- END HEADER DESKTOP-->


            <div class="main-content">
                <div class="section__content section__content--p30"> 
                    <div class="container-fluid">
                        <div class="row">
                            
                            <div class="col-lg-7">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>ID Curso</th>
                                                <th>Nombre</th>
                                                <th class="text-right">N° materiales</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> <?php echo $idCur;?> </td>
                                                <td> <?php echo $nomCur;?> </td>
                                                <td> <?php echo $num_mat;?> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> 
                            <div class="col-lg-4">
                                <div class="au-card au-card--bg-blue au-card-top-countries m-b-30">
                                    <div class="au-card-inner">
                                        <div class="table-responsive">
                                            <table class="table table-top-countries">
                                                <tbody>
                                                    <tr>
                                                        <td>Nombre</td>
                                                        <td> <?php echo $nombre;?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Correo</td>
                                                        <td> <?php echo $correo;?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Telefono</td>
                                                        <td> <?php echo $telefono;?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Direccion</td>
                                                        <td> <?php echo $direccion;?> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Estado</td>
                                                        <td> <?php echo $estado;?> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTAINER-->
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
</body>
</html>
<!-- end document-->

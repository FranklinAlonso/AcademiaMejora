<?php
    include("bd_Admin.php");
?>
<!DOCTYPE html>
<html lang="en">

<?php
    include("head.php");
?>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <?php
            include("admi_sidebar.php");
            pintar_sidebar("Matricula",$nom);
        ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <?php
                include("admi_header.php");
            ?>
            <!--Por sea caso aqui va el sidebar-->
            <!-- END HEADER DESKTOP-->

            <!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <span class="au-breadcrumb-span">Te encuentras en:</span>
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="#">Matricula</a>
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
            <br><br>
            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Lista de Matricula</h3>
                                <div class="table-data__tool">
                                    <a href="admi_matricula_agregar.php" 
                                    class="au-btn au-btn-icon au-btn--black2 au-btn--small" >
                                    <i class="zmdi zmdi-plus"></i>Agregar Matricula</a>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>ID Matricula</th>
                                                <th>Alumno</th>
                                                <th>Ciclo</th>
                                                <th>Aula</th>
                                                <th>precio</th>
                                                <th>Estado</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $query = mysqli_query($conn,"SELECT * FROM prematricula");
                                                $nr = mysqli_num_rows($query);
                                                if($nr < 1){
                                                    echo "
                                                        <tr class=\"tr-shadow\">
                                                            <td>--</td>
                                                            <td>--</td>
                                                            <td>--</td>
                                                            <td>--</td>
                                                            <td>--</td>
                                                            <td>--</td>
                                                            <td>
                                                                <div class=\"table-data-feature\">
                                                                    <a class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Edit\">
                                                                        <i class=\"zmdi zmdi-edit\"></i>
                                                                    </a>
                                                                    <button class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Delete\">
                                                                        <i class=\"zmdi zmdi-delete\"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class=\"spacer\"></tr>
                                                        ";
                                                }else{
                                                    for ($i=0; $i <$nr; $i++){
                                                        $row = mysqli_fetch_array($query);
                                                        $query2 = mysqli_query($conn,"SELECT * FROM ciclo WHERE IdCiclo = '".$row['IdCiclo']."' ");
                                                        $row2 = mysqli_fetch_array($query2);
                                                        $query3 = mysqli_query($conn,"SELECT * FROM alumno WHERE DNIAlumno = '".$row['DNIAlumno']."' ");
                                                        $row3 = mysqli_fetch_array($query3);
                                                        echo "
                                                        <tr class=\"tr-shadow\">
                                                            <td>".$row['IdPrematricula']."</td>
                                                            <td>".$row3['nombre']." ".$row3['apellido']."</td>
                                                            <td>".$row2['nombre']."</td>
                                                            <td>".$row['IdAula']."</td>
                                                            <td>".$row['precio']."</td>
                                                            <td>".$row['estado']."</td>
                                                            <td>
                                                                <div class=\"table-data-feature\">
                                                                    <a href=\"admi_alumnos_editar.php?variable=".$row['IdPrematricula']."\" class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Edit\">
                                                                        <i class=\"zmdi zmdi-edit\"></i>
                                                                    </a>
                                                                    <button class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Delete\">
                                                                        <i class=\"zmdi zmdi-delete\"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class=\"spacer\"></tr>
                                                        ";
                                                    }
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
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

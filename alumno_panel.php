<?php
    include("bd_Alumno.php");
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
            include("alumno_sidebar.php");
            pintar_sidebar("alumno",$nomAlu);
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
                                                <a href="#">Mi información</a>
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

            <!-- STATISTIC-->
            <br><br>
            <!-- END STATISTIC-->

            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- RECENT REPORT 2-->
                                    <section class="card">
                                        <div class="card-header user-header alt bg-dark">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h3 class="text-light display-6">Ciclo Matriculado</h3>
                                                    <p>Información del aula</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="card-body text-white bg-primary">
                                            <div class="table-responsive">
                                                <table class="table table-top-countries">
                                                    <?php 
                                                        if($alumno_panel > 0){
                                                            ?>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><strong>Ciclo</strong></td>
                                                                        <td class="text-right"><?php echo $nomCiclo;?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Aula</strong></td>
                                                                        <td class="text-right"><?php echo $nAula;?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Fecha de Inicio</strong></td>
                                                                        <td class="text-right"><?php echo $fechaI;?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Fecha de Fin</strong></td>
                                                                        <td class="text-right"><?php echo $fechaF;?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Nro.Cursos:</strong></td>
                                                                        <td class="text-right">8</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Nro.Sesiones: </strong></td>
                                                                        <td class="text-right"><?php echo $nSesion;?></td>
                                                                    </tr>
                                                                </tbody>
                                                            <?php
                                                        }else{
                                                            ?>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><strong>Ciclo</strong></td>
                                                                        <td class="text-right">--</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Aula</strong></td>
                                                                        <td class="text-right">--</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Fecha de Inicio</strong></td>
                                                                        <td class="text-right">--</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Fecha de Fin</strong></td>
                                                                        <td class="text-right">--</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Nro.Cursos:</strong></td>
                                                                        <td class="text-right">-</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Nro.Sesiones: </strong></td>
                                                                        <td class="text-right">--</td>
                                                                    </tr>
                                                                </tbody>
                                                            <?php
                                                        }
                                                    ?>
                                                    
                                                </table>
                                            </div>
                                        </div>
                                </aside>
                            </div>
                            <div class="col-md-6">
                                <!-- TASK PROGRESS-->
                                <div class="card">
                                    <div class="card-header user-header alt bg-dark">
                                        <div class="media">
                                            <div class="media-body">
                                                <h3 class="text-light display-6">Proximos ciclos</h3>
                                                <p>Información de ciclos</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body text-white bg-warning">
                                        <div class="table-responsive">
                                            <table class="table table-top-countries">
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Ciclo</strong></td>
                                                        <td class="text-right"><strong>Fecha de inicio</strong></td>
                                                    </tr>
                                                    <?php
                                                        $query10 = mysqli_query($conn,"SELECT * FROM ciclo ");
                                                        $nr10 = mysqli_num_rows($query10);
                                                        if($nr10 > 0){
                                                            for($i=0;$i<$nr10;$i++){
                                                                $row10 = mysqli_fetch_array($query10);
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $row10['nombre'];?></td>
                                                                    <td class="text-right"><?php echo $row10['fechaInicio'];?></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        }else{
                                                            ?>
                                                                <tr>
                                                                    <td>---</td>
                                                                    <td class="text-right">---</td>
                                                                </tr>
                                                            <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- END TASK PROGRESS-->
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

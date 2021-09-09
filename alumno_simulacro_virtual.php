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
            pintar_sidebar("alumno-simulacro-virtual",$nomAlu);
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
                                                <a href="#">Simulacro / Simulacro Virtual</a>
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
            <section class="statistic">
                <div class="section__content section__content--p30">
                    <div class="row justify-content-center">
                        <div class="au-card m-b-30">
                            <div class="au-card-inner">
                                <h3 class="text-center title-2 m-b-40">Simulacro virtual</h3>
                                <?php
                                    $habilitado='false'; 
                                    if(isset($row2['IdCiclo'])){
                                        $query6 = mysqli_query($conn,"SELECT * FROM simulacro WHERE IdCiclo = ".$row2['IdCiclo']." ");
                                        $num_simulacro1= mysqli_num_rows($query6);
                                        
                                        if ($num_simulacro1>=1){
                                            date_default_timezone_set("America/Lima");
                                            $fechaActual= date("Y-m-d");
                                            $horaActual=date("H:i:s");
                                            while($habilitado == 'false'){
                                                $row6 = mysqli_fetch_array($query6);
                                                $fechaSim=$row6['fecha'];
                                                $horaIni=$row6['horaInicio'];
                                                $horaFin=$row6['horaFin'];
                                                

                                                if ($fechaActual==$fechaSim){
                                                    if ($horaIni<=$horaActual && $horaActual<=$horaFin){
                                                        $habilitado='true'; 
                                                    }
                                                }else{

                                                }
                                            }
                                            

                                            if ($fechaActual==$fechaSim){
                                                if ($horaIni<=$horaActual && $horaActual<=$horaFin){
                                                    echo '
                                                    <div class="text-center alert alert-primary" role="alert">
                                                        Simulacro Habilitado!
                                                    </div>
                                                    ';
                                                }
                                            }else{
                                                echo '
                                                <div class="text-center alert alert-danger" role="alert">
                                                    Simulacro fuera de fecha!
                                                </div>
                                                ';
                                            }
                                        }else{
                                            echo '
                                            <div class="text-center alert alert-danger" role="alert">
                                                Simulacro fuera de fecha!
                                            </div>
                                            ';
                                        }
                                    }else{
                                        echo '
                                            <div class="text-center alert alert-danger" role="alert">
                                                No te encuentras matriculado!
                                            </div>
                                            ';
                                    }
                                ?>
                                <div class="au-card au-card--bg-dark au-card-top-countries m-b-30 bg-dark">
                                    <div class="au-card-inner">
                                        <div class="table-responsive">
                                            <table class="table table-top-countries">
                                                <?php
                                                    if(isset($row6['nombre'])){
                                                        ?>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Nombre:</td>
                                                                    <td class="text-right"><?php echo $row6['nombre'];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Fecha:</td>
                                                                    <td class="text-right"><?php echo $fechaSim;?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Hora de inicio:</td>
                                                                    <td class="text-right"><?php echo $horaIni;?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Hora de fin:</td>
                                                                    <td class="text-right"><?php echo $horaFin;?></td>
                                                                </tr>
                                                            </tbody>
                                                        <?php
                                                    }else{
                                                        ?>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Nombre:</td>
                                                                    <td class="text-right">--</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Fecha:</td>
                                                                    <td class="text-right">--</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Hora de inicio:</td>
                                                                    <td class="text-right">--</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Hora de fin:</td>
                                                                    <td class="text-right">--</td>
                                                                </tr>
                                                            </tbody>
                                                        <?php
                                                    }
                                                ?>
                                                
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    if ($habilitado=='false'){
                                        echo '<button type="button" disabled class="btn btn-primary btn-lg btn-block">Iniciar Simulacro</button>';
                                    }else{
                                        ?>
                                            <button type="button" onclick="window.open('https://www.youtube.com/')" class="btn btn-primary btn-lg btn-block">Iniciar Simulacro</button>
                                        <?php
                                        
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->

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
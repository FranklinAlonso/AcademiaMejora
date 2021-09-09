
<!DOCTYPE html>
<html lang="en">

<?php
    include("head.php");

    include("bd_Alumno.php");
?>
<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <?php
            include("alumno_sidebar.php");
            pintar_sidebar("alumno-material",$nomAlu);
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
                                                <a href="#">Materiales</a>
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
                    <div class="card">
                        <div class="card-body">
                            <div class="default-tab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home"
                                            aria-selected="true">Teórico</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile"
                                            aria-selected="false">Práctico</a>
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="table-responsive">
                                            <table class="table table-top-campaign">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-dark"><strong>NOMBRE DEL CURSO</strong></td>
                                                        <td class="text-right text-dark"><strong>ENLACE</strong></td>
                                                    </tr>
                                                    <?php
                                                    //echo "$num_clase";
                                                        for ($i=0; $i<$num_clase; $i++) {
                                                            $row3 = mysqli_fetch_array($query3);//llamo cada clase
                                                            $query4 = mysqli_query($conn,"SELECT * FROM curso WHERE IdCurso = ".$row3['IdCurso']." ");
                                                            $num_curso= mysqli_num_rows($query4);


                                                            //echo $num_clase;
                                                            if($num_curso > 0) {
                                                                //echo 'curso'. $num_curso;
                                                                $row4 = mysqli_fetch_array($query4);
                                                                $query5 = mysqli_query($conn,"SELECT * FROM material WHERE IdCurso = ".$row4['idCurso']." AND tipo='Teoria'");
                                                                $num_material= mysqli_num_rows($query5);
                                                                $row5 = mysqli_fetch_array($query5);
                                                                if($num_material>0){
                                                                    echo '
                                                                    <tr>
                                                                        <td><strong>'.$row4['nombre'].'</strong></td>
                                                                        <td class="text-right enlace"><a target="_blank" href="'.$row5['linkMaterial'].' "><strong><i class="zmdi zmdi-link"></i></strong></a></td>
                                                                    </tr> ';
                                                                }
                                                                
                                                                
                                                            }
                                                        
                                                        } 
                                                    ?>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="table-responsive">
                                            <table class="table table-top-campaign">
                                                <tbody>
                                                    <tr>
                                                        <td class="text-dark"><strong>NOMBRE DEL CURSO</strong></td>
                                                        <td class="text-right text-dark"><strong>ENLACE</strong></td>
                                                    </tr>
                                                    <?php
                                                    if(isset($row1['IdAula'])){
                                                        $query8 = mysqli_query($conn,"SELECT * FROM clase WHERE IdAula = ".$row1['IdAula']." ");
                                                        $num_clase= mysqli_num_rows($query8);
                                                        for ($i=0; $i<$num_clase; $i++) {
                                                            $row8 = mysqli_fetch_array($query8);//llamo cada clase
                                                            $query6 = mysqli_query($conn,"SELECT * FROM curso WHERE IdCurso = ".$row8['IdCurso']." ");
                                                            $num_curso1= mysqli_num_rows($query6);
                                                            //echo $num_clase;
                                                            if($num_curso1 > 0) {
                                                                //echo 'curso'. $num_curso;
                                                                $row6 = mysqli_fetch_array($query6);
                                                                $query7 = mysqli_query($conn,"SELECT * FROM material WHERE IdCurso = ".$row6['idCurso']." AND tipo='Practico'");
                                                                $num_material1= mysqli_num_rows($query7);
                                                                $row7 = mysqli_fetch_array($query7);
                                                                if($num_material1>0){
                                                                    echo '
                                                                    <tr>
                                                                        <td><strong>'.$row6['nombre'].'</strong></td>
                                                                        <td class="text-right enlace"><a target="_blank" href="'.$row7['linkMaterial'].' "><strong><i class="zmdi zmdi-link"></i></strong></a></td>
                                                                    </tr> ';
                                                                }
                                                            }
                                                        }
                                                    } 
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

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
<!-- end document-->
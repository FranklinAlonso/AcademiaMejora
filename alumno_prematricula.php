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
            pintar_sidebar("alumno-prematricula",$nomAlu);
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
                                                <a href="#">Prematricula</a>
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
                    <div class="alert alert-warning" role="alert">
                                    <h4 class="alert-heading">Atención!</h4>
                                    <p>Cuando realiza la reserva de matricula, tiene como plazo máximo 1 día antes que comience el ciclo.</p>
                                    <hr>
                                    <p class="mb-0">Acercarse al local con codigo de alumno y el respectivo pago.</p>
                                </div>
                        <div class="au-card m-b-30">
                        
                            <div class="au-card-inner">
                                <h3 class="text-center title-2 m-b-40">Prematricula</h3>
                                
                                <?php
                                    $query6 = mysqli_query($conn,"SELECT * FROM ciclo");
                                    $nr_ciclo= mysqli_num_rows($query6);
                                    
                                    $fechaIni='---';
                                    $fechaFin='---';
                                    $habilitado='false';  
                                    $mensaje='false';

                                    $query9 = mysqli_query($conn,"SELECT * FROM prematricula where DNIAlumno=".$row['DNIAlumno']."");
                                    $nr_preA= mysqli_num_rows($query9);

                                    if ($nr_ciclo==0 || $nr_preA>=1){
                                        echo '
                                        <div class="alert alert-danger" role="alert">
                                            Prematricula inhabilitada!
                                        </div>
                                        ';
                                        if($nr_preA>=1){
                                            $mensaje='true';
                                        }
                                    }else{
                                        date_default_timezone_set("America/Lima");
                                        $fechaActual= date("Y-m-d");
                                        $horaActual=date("H:i:s");

                                        for($i=0;$i<$nr_ciclo;$i++){
                                            $row6 = mysqli_fetch_array($query6);
                                            $fechaIni=$row6['fechaInicio'];
                                            $fechaFin=$row6['fechaFin'];

                                            if ($fechaIni>= $fechaActual && $horaActual<=$fechaFin ){
                                                $habilitado='true';
                                            }
                                        }
                                        if ($habilitado=='true'){
                                            echo '
                                            <div class="text-center alert alert-primary" role="alert">
                                                Prematricula Habilitada!
                                            </div>
                                            ';
                                        }else{
                                            echo '
                                            <div class="text-center alert alert-danger" role="alert">
                                                Prematricula inhabilitada!
                                            </div>
                                            ';
                                        }
                                    }
                                    
                                ?>
                                <div class="au-card au-card--bg-dark au-card-top-countries m-b-30 bg-dark">
                                    <div class="au-card-inner">
                                        <div class="table-responsive">
                                            <table class="table table-top-countries">
                                                <tbody>
                                                    <tr>
                                                        <td>Inicio de Ciclo:</td>
                                                        <td class="text-right"><?php echo $fechaIni;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Fin de Ciclo:</td>
                                                        <td class="text-right"><?php echo $fechaFin;?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                            <?php
                                                if(isset($_POST['id_ciclo']) && isset($_POST['id_aula']) && isset($_POST['id_alumno'])){
                                                    if(strlen($_POST['id_ciclo']) >= 1 && strlen($_POST['id_aula']) >= 1 && strlen($_POST['id_alumno']) >= 1 ){
                                                        $idciclo = $_POST["id_ciclo"];
                                                        $idaula = $_POST["id_aula"];
                                                        $dnialumno = $_POST["id_alumno"];
                                                        $estado3 = "habilitado";
                                                        $estado4 = "activo";
                                                        $query = mysqli_query($conn,"SELECT * FROM ciclo WHERE IdCiclo = '".$idciclo."' ");
                                                        $row = mysqli_fetch_array($query);                                                  
                                                        $limite = $row['fechaInicio'];
                                                        $precio = $row['precio'];
                                                        if($row['estado'] == $estado3){
                                                            $sql ="INSERT INTO prematricula (IdCiclo, IdAula, DNIAlumno, precio, estado, dialimite) VALUES ('$idciclo','$idaula','$dnialumno','$precio','$estado4','$limite')";
                                                            $resultado= mysqli_query($conn, $sql);
                                                            $sql2 ="UPDATE alumno SET estado = 'matriculado' WHERE DNIAlumno = '".$dnialumno."'";
                                                            $resultado2= mysqli_query($conn, $sql2);
                                                            $sql3 ="UPDATE alumno SET IdAula = $idaula WHERE DNIAlumno = '".$dnialumno."'";
                                                            $resultado3= mysqli_query($conn, $sql3);
                                                            $sql4 ="SELECT * FROM aula WHERE idaula = '".$idaula."'";
                                                            $resultado4 = mysqli_query($conn, $sql4);
                                                            $row4 = mysqli_fetch_array($resultado4);
                                                            $nueva_cantidad = $row4['cantidad'] + 1;
                                                            $sql5 ="UPDATE aula SET cantidad = $nueva_cantidad WHERE idaula = '".$idaula."'";
                                                            $resultado5 = mysqli_query($conn, $sql5);
                                                            if(!$resultado){
                                                                ?>
                                                                    <br>
                                                                    <div class="text-center alert alert-danger" role="alert">
                                                                        ¡No se logro realizar el registro!
                                                                    </div>
                                                                <?php
                                                            }else{
                                                                ?> 
                                                                    <br>
                                                                    <div class="text-center alert alert-success" role="alert">
                                                                        ¡Se ha registrado exitosamente!
                                                                    </div>
                                                                <?php                    
                                                            }
                                                        }else{
                                                            ?>
                                                                <br>
                                                                <div class="text-center alert alert-warning" role="alert">
                                                                    ¡El Cilco ya esta en curso o finalizo!
                                                                </div>
                                                            <?php
                                                        }
                                                    }else{
                                                        ?> 
                                                            <br>
                                                            <div class="text-center alert alert-warning" role="alert">
                                                                ¡Por favor ingrese los datos!
                                                            </div>
                                                        <?php
                                                    }
                                                }    
                                            ?>
                                <?php
                                    if ($habilitado=='false'){
                                        echo '<button type="button" disabled class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#mediumModal">Reservar matricula</button>';
                                    }else{
                                        echo '<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#mediumModal">Reservar matricula</button>';
                                    }
                                    if($mensaje=='true'){
                                        echo '  <br>
                                        <div class="alert alert-primary" role="alert">
                                            Felicidades <b> ya reservaste </b> tu matrícula, <br> acercate 
                                            a la sede mas cercana para  <br> terminar el proceso
                                        </div>
                                        ';
                                    }
                                ?>
                                

                            </div>
                            <br>
                        </div>
                        
                    </div>
                    
                </div>
                
            </section>
            <!-- END STATISTIC-->
            <!-- modal medium -->
			<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="mediumModalLabel">Prematricula</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <form action="alumno_prematricula.php" method="post"  id="reservar" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label class=" form-control-label">Codigo</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <p class="form-control-static"><?php echo $row['codigo'];?></p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label class=" form-control-label">DNI Alumno</label>
                                                <input name="id_alumno" type="hidden" id="id_alumno" value="<?php echo $row['DNIAlumno']; ?>">
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <p class="form-control-static"><?php echo $row['DNIAlumno'];?></p>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="select" class=" form-control-label">Ciclo</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <select class="form-control" aria-label="Default select example" name="id_ciclo" id="id_ciclo">
                                                    <?php 
                                                        $estado2 = "habilitado";
                                                        $query = mysqli_query($conn,"SELECT * FROM ciclo WHERE estado = '".$estado2."'");
                                                        $nr = mysqli_num_rows($query);
                                                        if($nr < 1){
                                                            echo "<option selected>No hay Ciclos Disponibles</option>";
                                                        }else{
                                                            echo "<option selected>Escoger un Ciclo</option>";
                                                            for ($i=0; $i <$nr; $i++){
                                                                $row = mysqli_fetch_array($query);
                                                                echo "<option value='".$row['IdCiclo']."'>".$row['nombre']."</option>";
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="select" class=" form-control-label">Aula</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <select class="form-control" aria-label="Default select example" name="id_aula" id="id_aula">
                                                    <option selected>Escoger un aula</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-end">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Confirmar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
			<!-- end modal medium -->
                                    
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

<script>
    
    $(document).ready(function(){
    
        var aula = $('#id_aula');
       
        $('#id_ciclo').change(function(){
          var id_ciclo = $(this).val();        

            $.ajax({
              data: {id_ciclo:id_ciclo}, 
              dataType: 'html', 
              type: 'POST', 
              url: 'get_aula.php', 

              }).done(function(data){   
                aula.html(data);       
              });      
            
        });

    });
</script>
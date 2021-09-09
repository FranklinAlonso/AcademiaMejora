<?php
    include("bd_Admin.php");
    date_default_timezone_set("America/Lima");
    $hoy=date("Y-m-d"); 
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
            pintar_sidebar("Clases",$nom);
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
                                                <a href="#">Clases</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    <a class="au-btn au-btn-icon au-btn--black2" href="admi_clases.php">
                                        <i class="fa fa-arrow-left"></i>Regresar</a>
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
                            <div class="col-md-6 offset-md-3">
                                <div class="card">
                                    <div class="text-center card-header">Registrar Clase</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Clase</h3>
                                        </div>
                                        <hr>
                                        <form action="admi_clases_agregar.php" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label class="control-label mb-1">Ciclo</label>
                                                <select class="form-control" aria-label="Default select example" name="idciclo" id="id_ciclo">
                                                    <?php 
                                                        $estado = "habilitado";
                                                        $query = mysqli_query($conn,"SELECT * FROM ciclo WHERE estado = '".$estado."'");
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
                                            <div class="form-group has-success">
                                                <label class="control-label mb-1">Aula</label>
                                                <select class="form-control" aria-label="Default select example" name="idaula" id="id_aula">
                                                    <option selected>Escoger un aula</option>
                                                </select>
                                            </div>
                                            <div class="form-group has-success">
                                                <label class="control-label mb-1">Curso</label>
                                                <select class="form-control" aria-label="Default select example" name="idcurso" id="id_curso">
                                                    <?php 
                                                        $estado = "habilitado";
                                                        $query = mysqli_query($conn,"SELECT * FROM curso ");
                                                        $nr = mysqli_num_rows($query);
                                                        if($nr < 1){
                                                            echo "<option selected>No hay Cursos Disponibles</option>";
                                                        }else{
                                                            echo "<option selected>Escoger un Curso</option>";
                                                            for ($i=0; $i <$nr; $i++){
                                                                $row = mysqli_fetch_array($query);
                                                                echo "<option value='".$row['idCurso']."'>".$row['nombre']."</option>";
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group has-success">
                                                <label class="control-label mb-1">Profesor</label>
                                                <select class="form-control" aria-label="Default select example" name="idprofesor" id="id_profesor">
                                                    <option selected>Escoger un Profesor</option>
                                                </select>
                                            </div>
                                            <div class="form-group has-success">
                                                <label class="control-label mb-1">Fecha</label>
                                                <select class="form-control" aria-label="Default select example" name="fecha" id="fecha">
                                                    <option selected>Escoger una Fecha</option>
                                                    <option value="lunes">Lunes</option>
                                                    <option value="Martes">Martes</option>
                                                    <option value="Miercoles">Miercoles</option>
                                                    <option value="Jueves">Jueves</option>
                                                    <option value="Viernes">Viernes</option>
                                                    <option value="Sabado">Sabado</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Hora de Inicio</label>
                                                <input type="time" id="horai" name="horai" placeholder="Ingresar Fecha de Inicio" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Hora de Fin</label>
                                                <input type="time" id="horaf" name="horaf" placeholder="Ingresar Fecha de Fin" class="form-control">
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block ">
                                                    <span id="payment-button-amount">Crear Clase</span>
                                                </button>
                                            </div>
                                            <?php
                                                if(isset($_POST['idciclo']) && isset($_POST['idaula']) && isset($_POST['idcurso']) && isset($_POST['idprofesor'])
                                                    && isset($_POST['fecha']) && isset($_POST['horai']) && isset($_POST['horaf']) ){
                                                    if(strlen($_POST['idciclo']) >= 1 && strlen($_POST['idaula']) >= 1 && strlen($_POST['idcurso']) >= 1 && strlen($_POST['idprofesor']) >= 1
                                                        && strlen($_POST['fecha']) >= 1 && strlen($_POST['horai']) >= 1 && strlen($_POST['horaf']) >= 1){
                                                        $ciclo = $_POST["idciclo"];
                                                        $aula = $_POST["idaula"];
                                                        $curso = $_POST["idcurso"];
                                                        $profesor = $_POST["idprofesor"];
                                                        $fecha = $_POST["fecha"];
                                                        $horai = $_POST["horai"];
                                                        $horaf = $_POST["horaf"];
                                                        if(strtotime($horai) > strtotime($horaf)){
                                                            ?>
                                                                <br>
                                                                <div class="text-center alert alert-warning" role="alert">
                                                                    ¡La hora final debe ser posterior a la inicial!
                                                                </div>
                                                            <?php
                                                        }else{
                                                            $sql ="INSERT INTO clase (IdCurso, horaInicio, horaFin, fecha, IdAula, DNIProfesor) VALUES ('$curso','$horai','$horaf','$fecha','$aula','$profesor')";
                                                            $resultado= mysqli_query($conn, $sql);
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
                                        </form>
                                    </div>
                                </div>
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

<!--script src="js/jquery-1.10.2.min.js"></script-->
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

        var profesor = $('#id_profesor');
       
        $('#id_curso').change(function(){
          var id_curso = $(this).val();        

            $.ajax({
              data: {id_curso:id_curso}, 
              dataType: 'html', 
              type: 'POST', 
              url: 'get_profesor.php', 

              }).done(function(data){   
                profesor.html(data);       
              });      
            
        });

    });
</script>
<!-- end document-->

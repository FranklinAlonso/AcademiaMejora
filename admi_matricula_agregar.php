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
                                    <a class="au-btn au-btn-icon au-btn--black2" href="admi_matricula.php">
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
                                    <div class="text-center card-header">Crear Matricula</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Matricula</h3>
                                        </div>
                                        <hr>
                                        <form action="admi_matricula_agregar.php" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label class="control-label mb-1">Alumno</label>
                                                <select class="form-control" aria-label="Default select example" name="id_alumno" id="id_alumno">
                                                    <?php 
                                                        $estado1 = "nomatriculado";
                                                        $query = mysqli_query($conn,"SELECT * FROM alumno WHERE estado = '".$estado1."'");
                                                        $nr = mysqli_num_rows($query);
                                                        if($nr < 1){
                                                            echo "<option selected>No hay Alumnos Disponibles</option>";
                                                        }else{
                                                            echo "<option selected>Escoger un Alumno</option>";
                                                            for ($i=0; $i <$nr; $i++){
                                                                $row = mysqli_fetch_array($query);
                                                                echo "<option value='".$row['DNIAlumno']."'>".$row['nombre']." ".$row['apellido']."</option>";
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Ciclo</label>
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
                                            <div class="form-group has-success">
                                                <label class="control-label mb-1">Aula</label>
                                                <select class="form-control" aria-label="Default select example" name="id_aula" id="id_aula">
                                                    <option selected>Escoger un aula</option>
                                                </select>
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <span id="payment-button-amount">Crear Matricula</span>
                                                </button>
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
<!-- end document-->

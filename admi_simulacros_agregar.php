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
            pintar_sidebar("Simulacros",$nom);
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
                                                <a href="#">Simulacros</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    <a class="au-btn au-btn-icon au-btn--black2" href="admi_simulacros.php">
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
                                    <div class="text-center card-header">Crear Simulacro</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Simulacro</h3>
                                        </div>
                                        <hr>
                                        <form action="admi_simulacros_agregar.php" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label class="control-label mb-1">Ciclo</label>
                                                <select class="form-control" aria-label="Default select example" name="idciclo" id="idciclo">
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
                                                <label class="control-label mb-1">Nombre</label>
                                                <input type="text" id="nombre" name="nombre" placeholder="Ingresar nombre" class="form-control">
                                            </div>
                                            <div class="form-group has-success">
                                                <label class="control-label mb-1">Fecha</label>
                                                <input type="date" id="fecha" name="fecha" placeholder="Ingresar fecha" class="form-control">
                                            </div>
                                            <div class="form-group has-success">
                                                <label class="control-label mb-1">Hora Inicio</label>
                                                <input type="time" id="horai" name="horai" placeholder="Ingresar hora Inicial" class="form-control">
                                            </div>
                                            <div class="form-group has-success">
                                                <label class="control-label mb-1">Hora Fin</label>
                                                <input type="time" id="horaf" name="horaf" placeholder="Ingresar hora final" class="form-control">
                                            </div>
                                            <div class="form-group has-success">
                                                <label class="control-label mb-1">Link</label>
                                                <input type="text" id="link" name="link" placeholder="Ingresar link" class="form-control">
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <span id="payment-button-amount">Crear Simulacro</span>
                                                </button>
                                            </div>
                                            <?php
                                                if(isset($_POST['idciclo']) && isset($_POST['nombre']) && isset($_POST['fecha']) && isset($_POST['horai'])
                                                && isset($_POST['horaf']) && isset($_POST['link'])){
                                                    if(strlen($_POST['idciclo']) >= 1 && strlen($_POST['nombre']) >= 1 && strlen($_POST['fecha']) >= 1
                                                    && strlen($_POST['horai']) >= 1 && strlen($_POST['horaf']) >= 1 && strlen($_POST['link']) >= 1 ){
                                                        $id = $_POST["idciclo"];
                                                        $nombre = $_POST["nombre"];
                                                        $fecha = $_POST["fecha"];
                                                        $horai = $_POST["horai"];
                                                        $horaf = $_POST["horaf"];
                                                        $link = $_POST["link"];
                                                        $est = "habilitado";
                                                        $query = mysqli_query($conn,"SELECT * FROM ciclo WHERE IdCiclo = '".$id."' ");
                                                        $row = mysqli_fetch_array($query);
                                                        if($row['estado'] == $est){
                                                            $sql ="INSERT INTO simulacro (nombre, fecha, horaInicio, horaFin, link, IdCiclo) VALUES ('$nombre','$fecha','$horai','$horaf','$link','$id')";
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
<!-- end document-->

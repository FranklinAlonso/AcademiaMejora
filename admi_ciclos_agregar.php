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
            pintar_sidebar("Ciclos",$nom);
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
                                                <a href="#">Ciclos</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    <a class="au-btn au-btn-icon au-btn--black2" href="admi_ciclos.php">
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
                                    <div class="text-center card-header">Registrar Ciclo</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Ciclo</h3>
                                        </div>
                                        <hr>
                                        <form action="admi_ciclos_agregar.php" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label class="control-label mb-1">Nombre</label>
                                                <input type="text" id="nombre" name="nombre" placeholder="Ingresar Nombre" class="form-control">
                                            </div>
                                            <div class="form-group has-success">
                                                <label class="control-label mb-1">Precio</label>
                                                <input type="text" id="precio" name="precio" placeholder="Ingresar Precio" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Fecha de Inicio</label>
                                                <input type="date" required min=<?php echo $hoy; ?> id="fechai" name="fechai" placeholder="Ingresar Fecha de Inicio" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Fecha de Fin</label>
                                                <input type="date" required min=<?php echo $hoy; ?> id="fechaf" name="fechaf" placeholder="Ingresar Fecha de Fin" class="form-control">
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block ">
                                                    <span id="payment-button-amount">Crear Ciclo</span>
                                                </button>
                                            </div>
                                            <?php
                                                if(isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['fechai']) && isset($_POST['fechaf'])){
                                                    if(strlen($_POST['nombre']) >= 1 && strlen($_POST['precio']) >= 1 && strlen($_POST['fechai']) >= 1 && strlen($_POST['fechaf']) >= 1){
                                                        $nombre = $_POST["nombre"];
                                                        $precio = $_POST["precio"];
                                                        $fechai = $_POST["fechai"];
                                                        $fechaf = $_POST["fechaf"];
                                                        $estado = "habilitado";
                                                        if(strtotime($fechai) > strtotime($fechaf)){
                                                            ?>
                                                                <br>
                                                                <div class="text-center alert alert-warning" role="alert">
                                                                    ¡La fecha final debe ser posterior a la inicial!
                                                                </div>
                                                            <?php
                                                        }else{
                                                            $sql ="INSERT INTO ciclo (nombre, precio, estado, fechaInicio, fechaFin) VALUES ('$nombre','$precio','$estado','$fechai','$fechaf')";
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
<!-- end document-->

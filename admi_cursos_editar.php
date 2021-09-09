<?php
    include("bd_Admin.php");
    $IDCurso = $_GET['variable'];
    $query = mysqli_query($conn,"SELECT * FROM curso WHERE idCurso = '".$IDCurso."' ");
    $nr = mysqli_num_rows($query);
    if($nr == 1){
        $row = mysqli_fetch_array($query);
        $nombre = $row["nombre"];
        $DNIProfesor = $row["apellido"];
    }
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
            pintar_sidebar("Cursos",$nom);
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
                                                <a href="#">Cursos</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    <a class="au-btn au-btn-icon au-btn--black2" href="admi_cursos.php">
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
                                    <div class="card-header">Cambiar Profesor</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Curso</h3>
                                        </div>
                                        <hr>
                                        
                                        <form action="admi_profesores_editar.php?variable=<?php echo $IDCurso; ?>" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label class="control-label mb-1">Curso</label>
                                                <input type="text" disabled="" placeholder="<?php echo $nombre ?>" class="form-control">
                                            </div>
                                            <div class="form-group has-success">
                                                <label class="control-label mb-1">Profesor</label>
                                                <input type="text" disabled="" placeholder="<?php echo $apellido ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Nuevo Profesor</label>
                                                <select class="form-control" aria-label="Default select example" name="DNINuevo" id="DNINuevo">
                                                    <?php 
                                                        $estado = "espera";
                                                        $query = mysqli_query($conn,"SELECT * FROM profesor where estado = '".$estado."'");
                                                        $nr = mysqli_num_rows($query);
                                                        if($nr < 1){
                                                            echo "<option selected>No hay Profesor Disponibles</option>";
                                                        }else{
                                                            echo "<option selected>Escoger un Profesor</option>";
                                                            for ($i=0; $i <$nr; $i++){
                                                                $row = mysqli_fetch_array($query);
                                                                echo "<option value='".$row['DNIProfesor']."'>".$row['nombre']." ".$row['apellido']."</option>";
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <span id="payment-button-amount">Actualizar Profesor</span>
                                                </button>
                                            </div>
                                            <?php
                                                if(isset($_POST['DNINuevo']) ){
                                                    if(strlen($_POST['DNINuevo']) >= 1){
                                                        $profesor = $_POST["DNINuevo"];
                                                        if($clave == $clave2){
                                                            $sql ="UPDATE profesor SET Clave = $clave WHERE DNIProfesor = $DNI_Profesor";
                                                            $resultado= mysqli_query($conn, $sql);
                                                            if(!$resultado){
                                                                ?>
                                                                    <br>
                                                                    <div class="alert alert-danger" role="alert">
                                                                        ¡No se logro realizar el registro!
                                                                    </div>
                                                                <?php
                                                            }else{
                                                                ?> 
                                                                    <br>
                                                                    <div class="alert alert-success" role="alert">
                                                                        ¡Se logro realizar el cambio exitosamente!
                                                                    </div>
                                                                <?php
                                                            }
                                                        }else{
                                                            ?>
                                                                <br>
                                                                <div class="alert alert-warning" role="alert">
                                                                    ¡Las clabes no son iguales!
                                                                </div>
                                                            <?php
                                                        }
                                                    }else{
                                                        ?> 
                                                            <br>
                                                            <div class="alert alert-warning" role="alert">
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

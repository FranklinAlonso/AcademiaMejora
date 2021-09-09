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
            pintar_sidebar("Profesores",$nom);
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
                                                <a href="#">Profesores</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    <a class="au-btn au-btn-icon au-btn--black2" href="admi_profesores.php">
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
                                    <div class="text-center card-header">Registrar Profesor</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Profesor</h3>
                                        </div>
                                        <hr>
                                        <form action="admi_profesores_agregar.php" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label class="control-label mb-1">Nombre</label>
                                                <input type="text" id="nombre" name="nombre" placeholder="Ingresar Nombre" class="form-control">
                                            </div>
                                            <div class="form-group has-success">
                                                <label class="control-label mb-1">Apellido</label>
                                                <input type="text" id="apellido" name="apellido" placeholder="Ingresar Apellido" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">DNI</label>
                                                <input type="text" id="DNI" name="DNI" placeholder="Ingresar DNI" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Correo</label>
                                                <input type="text" id="Correo" name="Correo" placeholder="Ingresar Correo" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Telefono</label>
                                                <input type="text" id="Telefono" name="Telefono" placeholder="Ingresar Telefono" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Direccion</label>
                                                <input type="text" id="Direccion" name="Direccion" placeholder="Ingresar Direccion" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Clave</label>
                                                <input type="password" id="Clave" name="Clave" placeholder="Ingresar Clave" class="form-control">
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    <span id="payment-button-amount">Registrar</span>
                                                </button>
                                            </div>
                                            <?php
                                                if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['DNI']) && isset($_POST['Clave']) && isset($_POST['Correo'])
                                                    && isset($_POST['Telefono']) && isset($_POST['Direccion'])){
                                                    if(strlen($_POST['nombre']) >= 1 && strlen($_POST['apellido']) >= 1 && strlen($_POST['DNI']) >= 1
                                                    && strlen($_POST['Correo']) >= 1 && strlen($_POST['Clave']) >= 1 && strlen($_POST['Telefono']) >= 1 && strlen($_POST['Direccion']) >= 1){
                                                        $nombre = $_POST["nombre"];
                                                        $apellido = $_POST["apellido"];
                                                        $dni = $_POST["DNI"];
                                                        $correo = $_POST["Correo"];
                                                        $telefono = $_POST["Telefono"];
                                                        $direccion = $_POST["Direccion"];
                                                        $clave = $_POST["Clave"];
                                                        $estado = "libre";
                                                        $cargo = "profesor";
                                                        $query = mysqli_query($conn,"SELECT * FROM persona WHERE DNIPersona = '".$dni."' ");
                                                        $nr = mysqli_num_rows($query);
                                                        if($nr > 0){
                                                            ?>
                                                                <br>
                                                                <div class="text-center alert alert-warning" role="alert">
                                                                    ¡El DNI ya esta registrado!
                                                                </div>
                                                            <?php
                                                        }else{
                                                            $sql ="INSERT INTO profesor (DNIProfesor, nombre, apellido, correo, telefono, clave, direccion, estado) VALUES ('$dni','$nombre','$apellido','$correo','$telefono','$clave','$direccion','$estado')";
                                                            $resultado= mysqli_query($conn, $sql);
                                                            $sql2 ="INSERT INTO persona (DNIPersona, cargo, clave) VALUES ('$dni','$cargo','$clave')";
                                                            $resultado2= mysqli_query($conn, $sql2);
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

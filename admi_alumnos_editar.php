<?php
    include("bd_Admin.php");
    $DNI_Alumno = $_GET['variable'];
    $query = mysqli_query($conn,"SELECT * FROM alumno WHERE DNIAlumno = '".$DNI_Alumno."' ");
    $nr = mysqli_num_rows($query);
    if($nr == 1){
        $row = mysqli_fetch_array($query);
        $nombre = $row["nombre"];
        $apellido = $row["apellido"];
        $correo = $row["correo"];
        $telefono = $row["telefono"];
        $direccion = $row["direccion"];
        $sexo = $row["genero"];
        $fecha = $row["fechaNacimiento"];
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
            pintar_sidebar("Alumnos",$nom);
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
                                                <a href="#">Alumnos</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    <a class="au-btn au-btn-icon au-btn--black2" href="admi_alumnos.php">
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
                                    <div class="text-center card-header">Informacion de Alummno</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Alumno</h3>
                                        </div>
                                        <hr>
                                        
                                        <form action="" method="" novalidate="novalidate">
                                            <div class="form-group">
                                                <label class="control-label mb-1">Nombre</label>
                                                <input type="text" disabled="" placeholder="<?php echo $nombre ?>" class="form-control">
                                            </div>
                                            <div class="form-group has-success">
                                                <label class="control-label mb-1">Apellido</label>
                                                <input type="text" disabled="" placeholder="<?php echo $apellido ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">DNI</label>
                                                <input type="text" disabled="" placeholder="<?php echo $DNI_Alumno ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Correo</label>
                                                <input type="text" disabled="" placeholder="<?php echo $correo ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Sexo</label>
                                                <input type="text" disabled="" placeholder="<?php echo $sexo ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Fecha de Nacimiento</label>
                                                <input type="text" disabled="" placeholder="<?php echo $fecha ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Telefono</label>
                                                <input type="text" disabled="" placeholder="<?php echo $telefono ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Direccion</label>
                                                <input type="text" disabled="" placeholder="<?php echo $direccion ?>" class="form-control">
                                            </div>
                                            <div>
                                                <button id="payment-button" type="button" class="btn btn-lg btn-info btn-block" data-toggle="modal" data-target="#smallmodal">
                                                    Cambiar Contraseña
                                                </button>
                                            </div>
                                            <?php
                                                if(isset($_POST['Clave']) && isset($_POST['Clave2'])){
                                                    if(strlen($_POST['Clave']) >= 1 && strlen($_POST['Clave2'])){
                                                        $clave = $_POST["Clave"];
                                                        $clave2 = $_POST["Clave2"];
                                                        if($clave == $clave2){
                                                            $sql ="UPDATE alumno SET Clave = $clave WHERE DNIAlumno = $DNI_Alumno";
                                                            $resultado= mysqli_query($conn, $sql);
                                                            $sql2 ="UPDATE persona SET Clave = $clave WHERE DNIPersona = $DNI_Alumno";
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
                                                                        ¡Se logro realizar el cambio exitosamente!
                                                                    </div>
                                                                <?php
                                                            }
                                                        }else{
                                                            ?>
                                                                <br>
                                                                <div class="text-center alert alert-warning" role="alert">
                                                                    ¡Las clabes no son iguales!
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
                                                
        <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="smallmodalLabel">Cambio Contraseña</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
                        <form action="admi_profesores_editar.php?variable=<?php echo $DNI_Alumno; ?>" method="post" novalidate="novalidate">
                            <div class="form-group">
                                                <label class="control-label mb-1">Nueva Clave</label>
                                <input type="password" id="Clave" name="Clave" placeholder="Ingresar Clave" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-1">Confirmar Clave</label>
                                <input type="password" id="Clave2" name="Clave2" placeholder="Ingresar Clave" class="form-control">
                            </div>
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    <span id="payment-button-amount">Actualizar contraseña</span>
                                </button>
                            </div>
						</div>
					</div>
				</div>
		</div>

    </div>

    <?php
    include("footer.php");
    ?>
</body>

</html>
<!-- end document-->

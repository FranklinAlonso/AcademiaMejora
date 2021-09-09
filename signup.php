<!DOCTYPE html>
<html lang="en">

<?php 
        include('conexion.php');
?>

<head>
<?php 
    include('head.php');
?>
<script src="scripts.js"></script>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="index.php">
                                <img src="images/icon/logo3.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="signup.php" method="post" onsubmit="return validar();">
                                <div class="form-group">
                                    
                                    <input class="au-input au-input--full" type="text" name="nombre" placeholder="Ingresar Nombre">
                                </div>
                                <div class="form-group">
                                    
                                    <input class="au-input au-input--full" type="text" name="apellido" placeholder="Ingresar Apellido">
                                </div>
                                <div class="form-group">
                                    
                                    <input class="au-input au-input--full" type="text" name="dni" placeholder="Ingresar DNI">
                                </div>
                                <div class="form-group">
                                    
                                    <input class="au-input au-input--full" type="email" name="correo" placeholder="Ingresar Correo">
                                </div>
                                <div class="form-group">
                                    
                                    <input class="au-input au-input--full" type="password" name="clave" placeholder="Ingresar Contraseña">
                                </div>
                                <div class="form-group">
                                    
                                    <input class="au-input au-input--full" type="password" name="clave2" placeholder="Confirmar Contraseña">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Registrar</button>
                            </form>
                            <?php
                            if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['dni']) && isset($_POST['correo'])
                            && isset($_POST['clave']) && isset($_POST['clave2'])){
                                if(strlen($_POST['nombre']) >= 1 && strlen($_POST['apellido']) >= 1 && strlen($_POST['dni']) >= 1
                                && strlen($_POST['correo']) >= 1 && strlen($_POST['clave']) >= 1 && strlen($_POST['clave2']) >= 1){
                                    $name = $_POST["nombre"];
                                    $ape = $_POST["apellido"];
                                    $dni = $_POST["dni"];
                                    $correo = $_POST["correo"];
                                    $clave = $_POST["clave"];
                                    $clave2 = $_POST["clave2"];
                                    $cargo = "alumno";
                                    $query = mysqli_query($conn,"SELECT * FROM persona WHERE DNIPersona = '".$dni."' ");
                                    $nr = mysqli_num_rows($query);
                                    if($nr > 0){
                                        ?>
                                            <br>
                                            <div class="alert alert-danger" role="alert">
                                                ¡El DNI ya esta registrado!
                                            </div>
                                        <?php
                                    }else{
                                            if(strcmp($clave,$clave2) == 0){
                                                $sql ="INSERT INTO alumno (DNIAlumno, nombre, apellido, correo, clave) VALUES ('$dni','$name','$ape','$correo','$clave')";
                                                $resultado= mysqli_query($conn, $sql);
                                                if(!$resultado){
                                                    ?>
                                                        <br>
                                                        <div class="alert alert-danger" role="alert">
                                                            ¡No se logro realizar el registro!
                                                        </div>
                                                    <?php
                                                }else{
                                                    $sql ="INSERT INTO persona (DNIPersona, cargo, clave) VALUES ('$dni','$cargo','$clave')";
                                                    $resultado= mysqli_query($conn, $sql);
                                                    ?> 
                                                        <br>
                                                        <div class="alert alert-success" role="alert">
                                                            ¡Se ha registrado exitosamente!
                                                        </div>
                                                    <?php
                                                }
                                            }else{
                                                ?> 
                                                    <br>
                                                    <div class="alert alert-warning" role="alert">
                                                        ¡No coincide la contraseña de confirmacion!
                                                    </div>
                                                <?php
                                            }
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
                            <div class="register-link">
                                <p>
                                    ¿Tienes una cuenta?
                                    <a href="login.php">Ingresar</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php 
        include('footer.php');
    ?>

</body>

</html>
<!-- end document-->
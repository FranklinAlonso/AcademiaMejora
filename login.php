<!DOCTYPE html>
<html lang="en">

<?php 
        include('conexion.php');
?>

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

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
                            <form action="login.php" method="post" onsubmit="return validar();">
                                <div class="form-group">
                                    <label>DNI</label>
                                    <input class="au-input au-input--full" type="text" name="dni" id="dni" placeholder="Ingresar DNI">
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input class="au-input au-input--full" type="password" name="clave" id="clave" placeholder="Ingresar Contraseña">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Recordarme
                                    </label>
                                    <label>
                                        <a href="#">¿Olvidaste contraseña?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                            </form>
                            <?php
                            if(isset($_POST['dni']) && isset($_POST['clave'])){
                                if(strlen($_POST['dni']) >= 1 && strlen($_POST['clave']) >= 1 ){
                                    $dni = $_POST["dni"];
                                    $pass = $_POST["clave"];
                                    //$query = mysqli_query($conn,"SELECT * FROM persona WHERE usuario = '".$nombre."' and clave = '".$pass."'");
                                    $query = mysqli_query($conn,"SELECT * FROM persona WHERE DNIPersona = '".$dni."'");
                                    $nr = mysqli_num_rows($query);
                                    //La condicional
                                    if($nr == 1){
                                        $row = mysqli_fetch_array($query);                                       
                                        //strcmp($row["clave"],$pass) == 0
                                        if(strcmp($row["clave"],$pass) == 0){
                                            session_start();
                                            $_SESSION['usuario'] = $dni;
                                            $admi = "administrador";
                                            $prof = "profesor";
                                            $alum = "alumno";
                                            if(strcmp($row["cargo"],$admi) == 0){
                                                header("location: admi_panel.php");
                                            }else if(strcmp($row["cargo"],$prof) == 0){
                                                header("location: profesor_panel.php");
                                            }else if(strcmp($row["cargo"],$alum) == 0){
                                                header("location: alumno_panel.php");
                                            }else{
                                                ?>
                                                    <br>
                                                    <div class="alert alert-danger" role="alert">
                                                        ¡Error!,Comunicarse con soporte
                                                    </div>
                                                <?php
                                            }
                                                
                                        }else{
                                            ?>
                                                <br>
                                                <div class="alert alert-danger" role="alert">
                                                    ¡Datos incorrecto!
                                                </div>
                                            <?php
                                        }     
                                    }else{
                                        ?>
                                            <br>
                                            <div class="alert alert-warning" role="alert">
                                                ¡No estas Registrado!
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
                            <div class="register-link">
                                <p>
                                    ¿No tienes una cuenta?
                                    <a href="signup.php">Registrate</a>
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
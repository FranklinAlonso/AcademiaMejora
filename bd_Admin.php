<?php 
    session_start();
    $usuario = $_SESSION['usuario'];
    if(isset($_SESSION['usuario'])){

        include("conexion.php");

        $query = mysqli_query($conn,"SELECT * FROM administrador WHERE DNIAdmin= ".$usuario." ");

        $row = mysqli_fetch_array($query);
        
        $nom = $row['Nombre'];
        

    }else{
        header("location: login.php");
        exit();
    }
?>
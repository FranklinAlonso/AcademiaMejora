<?php 
    session_start();
    $usuario = $_SESSION['usuario'];
    if(isset($_SESSION['usuario'])){
?>
<?php
    include("conexion.php");
?>
<?php

        $query = mysqli_query($conn,"SELECT * FROM profesor WHERE DNIProfesor = ".$usuario." ");
        $num_prof= mysqli_num_rows($query);
        $row = mysqli_fetch_array($query);

        $query2 = mysqli_query($conn,"SELECT * FROM curso WHERE idCurso = ".$row['IdCurso']." ");
        $num_curso= mysqli_num_rows($query2);
        $row2 = mysqli_fetch_array($query2);

        $query2 = mysqli_query($conn,"SELECT * FROM material WHERE autorDNI = ".$row['IdCurso']." ");
        $num_mat= mysqli_num_rows($query2);

        
        //Datos profesor
        $DNI = $row['DNIProfesor'];
        $nombre = $row['nombre'];
        $correo = $row['correo'];
        $telefono = $row['telefono'];
        $direccion = $row['direccion'];
        $estado = $row['estado'];

        //Datos curso
        $idCur = $row2['idCurso'];
        $nomCur = $row2['nombre'];

?>

<?php
    }else{
        header("location: pagina/index.php");
        exit();
    }
?>
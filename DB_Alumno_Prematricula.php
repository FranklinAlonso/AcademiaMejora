
<?php
include ('conexion.php');
include ('bd_Alumno.php');
    if(strlen($_POST['sede']) >= 1 && strlen($_POST['aula']) >= 1 && strlen($_POST['ciclo']) >= 1){
        
        $ciclo = $_POST["ciclo"];
        $aula = $_POST["aula"];

        $query4 = mysqli_query($conn,"SELECT * FROM ciclo where nombre = '".$ciclo."'");
        $nr_ciclo4 = mysqli_num_rows($query4);
        $row4 = mysqli_fetch_array($query4);
        
        if ($nr_ciclo4 < 1){
            ?>
                <p>Ciclo no disponible</p>
            <?php
        }else{
            $idCiclo=$row4['IdCiclo'];
            $precioCiclo=$row4['precio'];
            $query5 = mysqli_query($conn,"SELECT * FROM aula WHERE IdCiclo = '".$row4['IdCiclo']."' ");
            $nr_aula = mysqli_num_rows($query5);
            if($nr_aula < 1){
                ?>
                    <p>¡El aula seleccionada no existe!</p>
                <?php
            }else{
                $row5 = mysqli_fetch_array($query5);
                $idAula=$row5['IdAula'];
                $dniAlum=$row['DNIAlumno'];
                $sql ="INSERT INTO prematricula (IdCiclo, IdAula, DNIAlumno, precio, estado, tiempo) VALUES ($idCiclo,$idAula,$dniAlum,$precioCiclo,'pendiente','06:00:00')";
                $resultado= mysqli_query($conn, $sql);
                if(!$resultado){
                    ?>
                        <p>¡No se logro realizar el registro!</p>
                    <?php
                }else{
                    ?> 
                        <p>¡Se ha registrado exitosamente!</p>
                    <?php
                    header("location: Alumno_Prematricula.php");
                }
            }
        }
        
    }else{
        ?> 
            <p>¡Por favor ingrese los datos!</p>
        <?php
    }
?>
<?php
include 'conexion.php';

$id_ciclo = filter_input(INPUT_POST, 'id_ciclo'); 

$query = mysqli_query($conn,"SELECT * FROM aula where IdCiclo = '".$id_ciclo."'");
$nr = mysqli_num_rows($query);

if($nr < 1){
        echo '<option value="0">No hay aulas disponibles</option>';
}
else{
    echo '<option selected>Escoger un aula</option>';
    for($i=0;$i<$nr;$i++){
        $row = mysqli_fetch_array($query);
        echo "<option value='".$row['IdAula']."'>".$row['IdAula']."</option>";  
    }
}                   


?>
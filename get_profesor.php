<?php
include 'conexion.php';

$id_curso = filter_input(INPUT_POST, 'id_curso'); 

$query = mysqli_query($conn,"SELECT * FROM profesor where IdCurso = '".$id_curso."'");
$nr = mysqli_num_rows($query);

if($nr < 1){
        echo '<option value="0">No hay profesores disponibles</option>';
}
else{
    echo '<option selected>Escoger un profesor</option>';
    for($i=0;$i<$nr;$i++){
        $row = mysqli_fetch_array($query);
        echo "<option value='".$row['DNIProfesor']."'>".$row['nombre']." ".$row['apellido']."</option>";  
    }
}                   


?>
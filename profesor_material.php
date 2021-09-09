
<?php
    include("conexion.php");
?>

<?php
    include("bd_Profesor.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php
    include("head.php");
?>

<body class="animsition">
    <div class="page-wrapper">
        
        <?php
            include("profesor_sidebar.php");
            pintar_sidebar("material",$nombre);
        ?>
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php 
                include('profesor_header.php');
            ?>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">         
                            <form enctype="multipart/form-data" class="form-horizontal" method="get" action="tablaMaterial.php">

                                <div class="col-md-12">
                                    <!-- DATA TABLE -->
                                    <h3 class="title-5 m-b-35">Materiales</h3>
                                    <div class="table-responsive table-responsive-data2">
                                        <table class="table table-data2">
                                            <thead>
                                                <tr id="DNI"> <!--crear filas-->
                                                    <th>Id</th>
                                                    <th>IdCurso</th>
                                                    <th>Tema</th>
                                                    <th>Semana</th>
                                                    <th>Tipo</th>
                                                    <th>Link</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $tem= $DNI;
                                                $query = mysqli_query($conn,"SELECT * FROM material WHERE autorDNI = '$tem' ");
                                                $nr = mysqli_num_rows($query);
                                                if($nr < 1){
                                                    echo "<option value='No hay Especialidades'>No hay Especialidades</option>";
                                                }else{
                                                    for ($i=0; $i <$nr; $i++){
                                                        $n = $i + 1;
                                                        $row = mysqli_fetch_array($query);
                                                        echo "
                                                        <tr class=\"tr-shadow\">
                                                            <td>".$row['IdMaterial']."</td>
                                                            <td>".$row['IdCurso']."</td>
                                                            <td>".$row['tema']."</td>
                                                            <td>".$row['semana']."</td>
                                                            <td>".$row['tipo']."</td>
                                                            <td>".$row['linkMaterial']."</td>
                                                            <td>
                                                                <div class=\"table-data-feature\">
                                                                    <button class=\"item\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Delete\">
                                                                        <i class=\"zmdi zmdi-delete\"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class=\"spacer\"></tr>";
                                                    }
                                                }
                                            ?>  
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- END DATA TABLE -->
                                </div>
                            </form>
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
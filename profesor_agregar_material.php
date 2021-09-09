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
                pintar_sidebar("material-agregar",$nombre);
            ?>
            <!-- PAGE CONTAINER-->
            <div class="page-container">
                <?php
                    include("profesor_header.php");
                ?>
 

                <!-- MAIN CONTENT-->
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="alert alert-warning" role="alert">
                                                <h4 class="alert-heading">Información Importante</h4>
                                                <p>Buen día Profesores!, como lo podran ver este es el formulario 
                                                    donde ustedes podran subir los materiales (Teoricos o Prácticos) del curso.
                                                    Solo llenen el formulario de la derecha y le dan "Enviar", si quieren corregir 
                                                    solo presionen "Limpiar".</p>
                                                <p class="mb-0">MEJORA le desea exitos en su rol como educadores y confía en sus capacidades de enseñanza</p>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">   <strong>Añadir nuevo material</strong>  </div>
                                        <div class="card-body card-block">
                                            
                                            <form method="get" enctype="multipart/form-data" class="form-horizontal" action="profesor_agregar_material.php">
                                                
                                                <div class="row form-group">
                                                    <div class="col col-md-3"> <label class=" form-control-label">ID Curso</label> </div>
                                                    <input type='hidden' name='idcur' value='<?php echo $idCur;?>' />
                                                    <div class="col-12 col-md-9"> <p class="form-control-static" name="idcurso" ><?php echo $idCur;?></p> </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3"> <label class=" form-control-label">DNI</label> </div>
                                                    <input type='hidden' name='dniprof' value='<?php echo $DNI;?>' />
                                                    <div class="col-12 col-md-9"> <p class="form-control-static" name="dniprofe"><?php echo $DNI;?></p> </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tema</label></div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="text-input" name="tema" placeholder="Tema" class="form-control">
                                                        <small class="form-text text-muted">Ingrese el tema de este material a subir</small>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-sm-3"><label for="email-input" class=" form-control-label">Semana</label></div>
                                                    <div class="col-12 col-sm-3"><input id="email-input" name="semana" class="form-control"></div>
                                                    <small class="help-block form-text">Numero de semana</small>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label class=" form-control-label">Tipo</label>
                                                    </div>
                                                    <div class="col col-md-9">
                                                        <select name="tipo" id="select" class="form-control">
                                                            <option value="0">Teoria</option>
                                                            <option value="1">Practica</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="textarea-input" class=" form-control-label">Link</label>
                                                    </div>
                                                    <div class="col-12 col-md-12">
                                                        <textarea name="link" id="textarea-input" rows="3" placeholder="Ingrese el link del material" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-dot-circle-o"></i> Enviar
                                                    </button>

                                                    <button type="reset" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-ban"></i> Limpiar
                                                    </button>
                                                </div>
                                                
                                                <?php
                                                    if(isset($_REQUEST['tema']) && isset($_REQUEST['semana']) && isset($_REQUEST['link']) && isset($_REQUEST['tipo']) ){
                                                        if(strlen($_REQUEST['tema']) >= 1 && strlen($_REQUEST['semana']) >= 1 && strlen($_REQUEST['link']) >= 1){
                                                            
                                                            $v1 = $_REQUEST['idcur'];
                                                            $v2 = $_REQUEST['dniprof'];
                                                            $v3 = $_REQUEST['tema'];
                                                            $v4 = $_REQUEST['semana'];
                                                            $v5 = $_REQUEST['tipo'];
                                                                if ($v5==0){
                                                                    $v5= "Teoria";
                                                                }else{
                                                                    $v5= "Practica";
                                                                }
                                                            $v6 = $_REQUEST['link'];

                                                            $query = mysqli_query($conn,"SELECT * FROM material WHERE linkMaterial = '$v6' ");
                                                            $nr = mysqli_num_rows($query);
                                                            if($nr > 0){
                                                ?>
                                                    <br>
                                                    <div class="text-center alert alert-warning" role="alert">
                                                        ¡El link ya existe!
                                                    </div>
                                                <?php
                                                    }else{
                                                        $sql ="INSERT INTO material (linkMaterial, IdCurso, tema, semana, tipo, autorDNI) VALUES ('$v6', '$v1', '$v3', '$v4', '$v5', '$v2')";
                                                        $resultado= mysqli_query($conn, $sql);
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
                </div>
            </div>
        </div>

        <?php
        include("footer.php");
        ?>
    </body>

</html>
<!-- end document-->

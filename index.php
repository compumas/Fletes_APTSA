<?php include 'header.php' ?>


<?php
    include_once "conexion.php";
    
    $sentencia = $bd -> query("select * from orden WHERE estatus='A'");
    $ordenes = $sentencia->fetchAll(PDO::FETCH_OBJ);
    


?>


<div class="container-fluid ">
    <div class="row justify-content-center">
        <div class="col-md-9">

        <!--- inicio alerta --->
        <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){  
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Rellena todos los campos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
             }
        ?>

        <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){  
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Registrado!!!</strong> Registro Agregado.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
             }
        ?>

<?php
            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){  
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!!!</strong> Vuelve a intentar.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
             }
        ?>

<?php
            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){  
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Cambiado!!!</strong>  Los datos fueron actualizados.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
             }
        ?>

<?php
            if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){  
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Eliminado!!!</strong>  El registro fue eliminado.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
             }
        ?>

         <!--- fin alerta --->






            <div class="card lg">
                
                <div class="card-header bg-dark text-white">
                    Lista de Entregas
                </div>
                <div class="p-0">
                <div class="table-responsive">
                    <table class="table table-success table-striped table-hover ">
                        <thead>
                            <tr>
                                <th >Doc</th>
                                <th >Fecha</th>
                                <th >Direccion</th>
                                <th >Zona</th>
                                <th >Chofer</th>
                                <th >Costo$</th>
                                <th >Opción</th>
                            </tr>
                        </thead>
                        <tbody >
                            <?php
                                foreach($ordenes as $dato){
                            ?>

                            <tr>
                                <td  scope="row"> <?php $dato->id; echo $dato->ndoc; ?></td>
                                <td ><?php echo $dato->fecha; ?></td>
                                <td ><?php echo $dato->dir; ?></td>
                                <td ><?php echo $dato->zona; ?></td>
                                <td ><?php echo $dato->chofer; ?></td>
                                <td><?php echo $dato->costo;?></td>
                                <td><a style="text-decoration:none" href="editar.php?id=<?php echo $dato->id; ?>">
                                    <i  class="bi bi-pencil-square text-info fs-5 mx-2">Editar </i></a>|
                                    <a style="text-decoration:none" onclick= "return confirm('Estas seguro quieres borrar?');" href="eliminar.php?id=<?php echo $dato->id; ?>">
                                    <i class="bi bi-trash text-danger text-success fs-5 ">Eliminar</i></a></td>
                               
                            </tr>

                          <?php
                            }
                          ?>

                        </tbody>
                    </table>
                    

                </div>
                        </div>
            </div>
        </div>
        
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header bg-dark text-white">


                    Ingresar Datos

                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-lavel">No. Fact/Remisión </label>
                        <input type="text" class="form-control" name="ndoc" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-lavel">Fecha: </label>
                        <input type="datetime-local" class="form-control" name="fecha" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-lavel">Direccion: </label>
                        <input type="text" class="form-control" name="dir" autofocus required>
                    </div>
                    <div class="mb-3">
                     <!--   <label class="form-lavel">Zona: </label>
                        <input type="text" class="form-control" name="txtSigno" autofocus required>-->
                        <label for="zona">Municipio:</label>
                        <select class="form-select text-danger" aria-label="Default select example" name="zona" autofocus required>
                            <option selected>Seleccionar...</option>
                            <option >Apodaca</option>
                            <option >Escobedo</option>
                            <option >San Nicolás</option>
                            <option >Monterrey</option>
                            <option >Guadalupe</option>
                            <option >Sta. Catarina</option>
                            <option>San Pedro</option>
                            <option >Cienega de Flores</option>
                            <option >Zuazua</option>
                            <option >Garcia</option>
                            <option >Benito Jáurez</option>
                            <option >Salinas Victoria</option>
                            <option >Pesquería</option>
                            <option >El Carmén</option>
                        </select>
                    </div>
                    <div class="mb-3">
                     <!--   <label class="form-lavel">Zona: </label>
                        <input type="text" class="form-control" name="txtSigno" autofocus required>-->
                        <label for="chofer">Chofer:</label>
                        <select class="form-select text-danger" aria-label="Default select example" name="chofer" autofocus required>
                            <option selected>Seleccionar...</option>
                            <option >Héctor Rámirez</option>
                            <option >Marcos Vega</option>
                            <option >José D La Torre</option>
                            <option >Martín Hernández</option>
                            <option >Salvador Hernández</option>
                            <option >Luis Gutierrez</option>
                            <option>Rolando Mata</option>
                            <option >Gregorio Fernando</option>
                            <option >Oscar Contreras</option>
                            <option >Virgilio Ramos</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-lavel">Costo$: </label>
                        <input type="text" class="form-control" name="costo" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Grabar Registro">
                        <a href="cerrar.php" class="btn btn-info text-black-50 mt-2">Cerrar Sesión</a>
                    </div>
                </form>
                
            </div>
        </div>
     </div>
</div>




<?php include 'footer.php' ?>
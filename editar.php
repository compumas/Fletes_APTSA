<?php include 'header.php' ?>

<?php
    
    if(!isset($_GET['id'])){
        header('location: index.php?mensaje=error');
        exit();
    }

    include_once 'conexion.php';
    $codigo=$_GET['id'];
    

    $sentencia=$bd->prepare("select * from orden where id = ?;");
    $sentencia->execute([$codigo]);
    $persona=$sentencia->fetch(PDO::FETCH_OBJ);
   /* print_r($persona); exit;*/
?>


        <dic class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-4">
                <div class="card">
                <div class="card-header">


                  Editar Datos

                </div>
                <form class="p-4" method="POST" action="editarproceso.php">
                    <div class="mb-3">
                        <label class="form-lavel">No. Fact/Remisión </label>
                        <input type="text" class="form-control" name="ndoc" autofocus required 
                        value="<?php echo $persona->ndoc; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-lavel">Fecha: </label>
                        <input type="datetime-local" class="form-control" name="fecha" autofocus required
                        value="<?php echo $persona->fecha; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-lavel">Direccion: </label>
                        <input type="text" class="form-control" name="dir" autofocus 
                        value="<?php echo $persona->dir; ?>">
                    </div>
                    <div class="mb-3">
                     <!--   <label class="form-lavel">Zona: </label>
                        <input type="text" class="form-control" name="txtSigno" autofocus required>-->
                        <label for="mpo">Selecciona Municipio:</label>
                        <select class="form-select" aria-label="Default select example" name="zona" autofocus required>
                            <option ><?php echo $persona->zona; ?></option>
                            <option >Apodaca</option>
                            <option >Escobedo</option>
                            <option >San Nicolás</option>
                            <option >Monterrey</option>
                            <option >Guadalupe</option>
                            <option >Sta. Catarina</option>
                            <option >San Pedro</option>
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
                        <select class="form-select" aria-label="Default select example" name="chofer" autofocus>
                            <option selected>Seleccionar...</option>
                            <option >Héctor Rmz</option>
                            <option >Marcos Vega</option>
                            <option >José D La Torre</option>
                            <option >Martín Hdz</option>
                            <option >Salvador Hdz</option>
                            <option >Luis Gtz</option>
                            <option>Rolando M</option>
                            <option >Gregorio</option>
                            <option >Oscar C</option>
                            <option >Virgilio R</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-lavel">Costo$ </label>
                        <input type="text" class="form-control" name="costo" autofocus required
                        value="<?php echo $persona->costo; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id" value="<?php echo $persona->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Actualizar Datos">
                        <a href="index.php" class="btn btn-info text-black-50 mt-2">Cancelar</a>
                    </div>
                </form>
            </div>
                </div>
            </div>
        </dic>

            


<?php include 'footer.php' ?>
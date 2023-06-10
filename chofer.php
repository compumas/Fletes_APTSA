


<?php
    session_start();
    
    error_reporting(0);
    $varsesion=$_SESSION["nombre"];

    if ($varsesion == null || $varsesion="") {
        echo "Usted no tiene autorización";
        die();
    }
    include_once "conexion.php";
    $nombre=$_SESSION["nombre"];
    
    $sentencia = $bd -> query("select * from orden WHERE estatus = 'A' AND chofer = '$nombre'");
    $ordenes = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($persona)
?>

<!doctype html>
<html lang="es">
  <head>
    <title>Sistema de Envios APTSA</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <!-- cdn iconos-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
 
  <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>


  </head>
  <body>
    <div class="container-fluid bg-primary text-white">
        <div class="row">
            <div class="col-md">
                <header class="py-3"> 
                    <h3 class="text-center">Sistema de Reparto APTSA</h3>
                    <h5 class="text-center">Bienvenido :<?php echo " ". $_SESSION["nombre"] ?></h5>
                   
                    <p class="text-center"><a  href="cerrar.php" class="text-danger fs-5"><strong>Cerrar Sesión</strong></a></p>
                </header>
            </div>
        </div>
    </div>
   
    <marquee scrollamount="10" style = "color:#FF8133; font-size:20px;">En <i><b>APTSA</b></i> las personas hacemos la diferencia...</marquee>
   
   
   
   

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">

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
        <strong>Registrado!!!</strong> Datos Agregados.
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
                    <table id="tabla_id" class="table table-success table-striped table-hover ">
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
                                <td><a  style="text-decoration:none" href="choferver.php?id=<?php echo $dato->id; ?>">
                                    <i class="bi bi-box-arrow-up-left text-info fs-5"> Ampliar</i></a> |
                                    <a style="text-decoration:none" onclick= "return confirm('Deseas cerrar pedido?');" href="no_borrar.php?id=<?php echo $dato->id; ?>">
                                    <i class="bi bi-truck text-danger text-success fs-5"> Entregado</i></a></td>
                               
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
        </div>
        
        
     </div>
</div>




<?php include 'footer.php' ?>

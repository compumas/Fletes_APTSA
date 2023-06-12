<?php 
  
  session_start();
  error_reporting(0);
  $varsesion=$_SESSION["nombre"];
  $varroles=$_SESSION["rol_id"];
  // echo $varroles; die();
  if ($varsesion == null || $varsesion="") {
    echo "Usted no tiene autorización";
    die();
  }

  $url_base="http://localhost:8080/fletes/";

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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </head>
  <body>
    <div class="container-fluid bg-primary text-white">
        <div class="row">
            <div class="col-md">
                <header class="py-3"> 
                    <h3 class="text-center">Sistema de Reparto APTSA</h3>
                    <h5 class="text-center">Binvenido: <?php echo " ". $_SESSION["nombre"] ?></h5>
                </header>
            </div>
        </div>
    </div>
    <marquee scrollamount="10" style = "color:#FF8133; font-size:20px;">En <i><b>APTSA</b></i> las personas hacemos la diferencia...</marquee>
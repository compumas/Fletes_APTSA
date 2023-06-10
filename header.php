<?php 
  
  session_start();
  error_reporting(0);
  $varsesion=$_SESSION["nombre"];

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
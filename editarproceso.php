<?php
    /*print_r($_POST); exit;*/

    if(!isset($_POST['id'])){
        header('location: index.php?mensaje=error');
        exit();
    }

    include 'conexion.php';
    $id=$_POST["id"];
    $ndoc=$_POST["ndoc"];
    $fecha=$_POST["fecha"];
    $dir=$_POST["dir"];
    $zona=$_POST["zona"];
    $chofer=$_POST["chofer"];
    $costo=$_POST["costo"];

    $sentencia = $bd->prepare("UPDATE orden SET ndoc = ?,fecha = ?,dir = ?,zona = ?,chofer = ?,costo = ? WHERE id=?;");
    $resultado = $sentencia->execute([$ndoc, $fecha, $dir, $zona, $chofer,$costo, $id]);

    if($resultado === TRUE){
        header('location: index.php?mensaje=editado');
      /*  echo "OK";*/
    } else {
        header('location: index.php?mensaje=error');
        exit();
    }
?>
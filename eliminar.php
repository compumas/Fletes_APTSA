<?php 
/*include 'header.php';
include 'footer.php'; */
  
   if(!isset($_GET['id'])){
        header('location: index.php?mensaje=error');
        exit();
    }

    include 'conexion.php';
    $id=$_GET['id'];
    
    $sentencia=$bd->prepare("DELETE FROM orden where id=?;");
    $resultado=$sentencia->execute([$id]);

    if($resultado === TRUE){
        header('location: index.php?mensaje=eliminado');
     
    } else {
        header('location: index.php?mensaje=error');
        exit();
    }

?>
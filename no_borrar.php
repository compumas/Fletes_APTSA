<?php
    

    if(!isset($_GET['id'])){
        header('location: chofer.php?mensaje=error');
        exit();
    }

    include 'conexion.php';
     $codigo=$_GET["id"];
     $sentencia=$bd->prepare("select * from orden where id = ?;");
    $sentencia->execute([$codigo]);
    $persona=$sentencia->fetch(PDO::FETCH_OBJ);
    
    
   $ndoc=$persona->ndoc;
  $fecha=$persona->fecha;
   $dir=$persona->dir;
   $zona=$persona->zona;
   $chofer=$persona->chofer;
   $costo=$persona->costo;
   $ffin=$persona->ffin;
    $estatus="T";
    echo $chofer." ".$estatus." ".$codigo; 


  //  $sentencia = $bd->prepare("UPDATE orden SET ndoc = ?,fecha = ?,dir = ?,zona = ?,chofer = ?,costo = ?, estatus = ? WHERE id=?;");
  //  $resultado = $sentencia->execute([$ndoc, $fecha, $dir, $zona, $chofer,$costo, $estatus, $id]);
$sentencia = $bd->prepare("UPDATE orden SET estatus = ? WHERE id=?;");
    $resultado = $sentencia->execute([$estatus, $codigo]);

 /*  $query="UPDATE orden SET ndoc:=ndoc, fecha:=fecha, dir:=dir, zona:=zona, 
   chofer:=chofer, costo:=costo, estatus:=estatus, ffin:=ffin WHERE id:=id;";


$stmt=$bd->prepare($query);

  $stmt->bindParam(':ndoc',$ndoc);
   $stmt->bindParam(':fecha',$fecha);
  $stmt->bindParam(':dir',$dir);
   $stmt->bindParam(':zona',$zona);
   $stmt->bindParam(':chofer',$chofer);
   $stmt->bindParam(':costo',$costo);
   $stmt->bindParam(':estatus',$estatus);
   $stmt->bindParam(':ffin',$ffin);
   $stmt->bindParam(':id',$codigo);
 
      $stmt->execute();  */

    if($resultado == TRUE){
        header('location: chofer.php?mensaje=editado');
      /*  echo "OK";*/
    } else {
        header('location: chofer.php?mensaje=error');
        exit();
    }
?>
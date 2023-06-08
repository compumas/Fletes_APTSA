
<?php

include_once 'conexion.php';

    // print_r($_POST); 
   if(empty($_POST["oculto"]) || empty($_POST["ndoc"]) || 
    empty($_POST["fecha"] )|| 
   empty($_POST["costo"])) {
    header('Location: index.php?mensaje=falta');
       exit(); 
    }

    
    $ndoc=$_POST["ndoc"];
    $fecha=$_POST["fecha"];
    $dir=$_POST["dir"];
    $zona=$_POST["zona"];
    $chofer=$_POST["chofer"];
    $costo=$_POST["costo"];
    
    
    

    $sentencia= $bd->prepare("INSERT INTO orden(ndoc,fecha,dir,zona,chofer,costo) VALUES
    (?,?,?,?,?,?);");
    $resultado= $sentencia->execute([$ndoc,$fecha,$dir,$zona,$chofer,$costo]);
   

    if ($resultado === TRUE){
       header('location:  index.php?mensaje=registrado');
    } else {
       /* echo 'NOO';  */
       header('Location: index.php?mensaje=error');
        exit(); 
    }

?>








<?php

include 'header.php';

?>

<?php

include 'footer.php';

?>


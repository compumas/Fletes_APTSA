<?php
   session_start();
include "conexion.php";
    if(isset($_GET['cerrar_sesion'])){
        session_unset();
        session_destroy();
    }

    
            
         //   print_r($_POST ); 
    if($_POST){
        
        //$bd= new Database();
       // $query=$bd->connect()->prepare('SELECT * FROM usuarios WHERE usuario := usuario AND clave := clave');
       // $query->execute(['usuario' => $usuario, 'contrasena' => $contrasena]);

        $sentencia=$bd-> prepare("SELECT *, count(*) as n_usuario FROM 'usuarios'
            WHERE usuario=:usuario AND clave=:clave");

        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];
       
        $sentencia->bindParam(":usuario", $usuario);
        $sentencia->bindParam(":clave", $contrasena);

        $sentencia->execute();

        $ordenes=$sentencia->fetch(PDO::FETCH_LAZY);
        
        print_r($ordenes);

        //$row=$query->fetch(PDO::FETCH_NUM);
       /* if($ordenes == true){
            //validar rol
        } else {
            //no existe usuario
            echo "El usuario o contraseña son incorrectos";
        }  */

   }


	
if($_POST) {
    include_once "conexion.php";

    $sentencia=$bd->prepare("SELECT * ,count(*) as n_usuarios FROM usuarios 
    WHERE usuario=:usuario AND clave=:clave");
    $usuario=$_POST["usuario"];
    $contrasena=$_POST["contrasena"];

    $sentencia->bindParam(":usuario",$usuario);
    $sentencia->bindParam(":clave",$contrasena);

    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

//print_r($registro);
    /*
        switch($_SESSION['rol']){
            case 1:
                header('location:index.php');

            case 2:
                header('location:chofer.php');
                
            default:   
        }
    
        */







    if($registro["n_usuarios"]>0){
        $_SESSION["nombre"]=$registro["nombre"];
        $_SESSION["rol"]=$registro["rol"];
        $_SESSION["logueado"]=true;
      //var_dump( $registro['nombre']);  exit;

         switch($registro['rol_id']){
            case "1":
                var_dump( $registro['rol_id']);
                header('location:index.php');
                break;

            case "2":
                var_dump( $registro['rol_id']);
                header('location:chofer.php');
                break;
          // default:   
        }







      //  header("location:index.php");
    } else {
        $mensaje="Error: El usuario o contraseña son incorrectos!!!";
    }
}
	
	
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
            
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header text-center">
                                        <img src="LOGO_APTSa.png" width="290" height="50%" alt="login-icon"  /></div>
                                    <!--   <h3 class="text-center font-weight-light my-4">Login</h3></div>-->
                                    <div class="card-body">
                                         <?php if(isset($mensaje)) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong><?php echo $mensaje ?></strong> Intenta de nuevo
                                        </div>
                                        <?php } ?>
                                        <form action="" method="POST">
                                            <div class="form-group">
                                              <label class="small mb-1" for="usuario">Usuario</label>
                                              <input class="form-control py-4" id="usuario" name="usuario" type="text" placeholder="Enter usuario" /></div>

                                            <div class="form-group"><label class="small mb-1" for="contrasena">Contraseña</label><input class="form-control py-4" id="contrasena" type="password" name="contrasena" placeholder="Enter contraseña" /></div>

                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><a class="small" href="login.php">Forgot Password?</a> <button type="submit" class="btn btn-primary mb-2">Entrar al sistema</button>
                                            <!-- <a class="btn btn-primary" href="#">Entrar</a></div> -->
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small "><a href="login.php">Necesitas una cuenta? Sign up!</a></div>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2019</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

<?php 
  
  session_start();

  $url_base="http://localhost:8080/fletes/";

  if(!isset($_SESSION["usuario"])){
    header("location:".$url_base."login.php");
     /* header("location:./login.php");*/
  }else{ $name="admin";
    if ($name == $_SESSION["usuario"]){
      header("location:./chofer.php");
    }
  }

?>

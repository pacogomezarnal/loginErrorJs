<?php
include "./lib/Usuario.php";
include "./lib/Seguridad.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Fichero de control de seguridad</title>
    <link rel="stylesheet" href="./css/estilos.css">
  </head>
  <body>
    <div>
    <?php
    //Control de las acciones a realizar
    if(isset($_POST["accion"])){
      //GEneramos el nuevo objeto
      $user=new Usuario();
      $seguridad=new Seguridad();
      //Registro de usuario
      if($_POST["accion"]=="registro"){
        if($_POST["pass0"]==$_POST["pass1"]){
          $usurioReg=$user->insertarUsuario($_POST["nombre"],$_POST["apellidos"],
                                 $_POST["usuario"],$_POST["pass0"]);
          if($usurioReg!=null)
          {
            echo "<h2>Usuario registrado correctamente</h2></br>";
            echo "<label>Nombre</label>";
            echo "<input type='text' value=".$usurioReg["nombre"]." readonly>";
            echo "<label>Apellidos</label>";
            echo "<input type='text' value=".$usurioReg["apellidos"]." readonly>";
            echo "<label>Usuario</label>";
            echo "<input type='text' value=".$usurioReg["usuario"]." readonly>";
            echo "</br><center><a href=login.php>Ir al login</a></center>";
          }else{
            //Usuario no insertado
            echo "<h2>El usuario no ha sido insertado. Revisa los datos</h2></br>";
            echo "<a href=registro.php>Volver al formulario de registro</a>";
          }
        }else{
          //Contraseñas diferentes
          echo "<h2>Las contraseñas no son iguales</h2></br>";
          echo "<a href=registro.php>Volver al formulario de registro</a>";
        }
      }
      //Login de usuario
      elseif ($_POST["accion"]=="login") {
        if($seguridad->comprobarRemember()){
          echo "<h2>Usuario encontrado</h2></br>";
        }else{
          $usurioReg=$user->buscarUsuario($_POST["usuario"]);
          if($usurioReg!=null)
          {
            //Comparamos los passwords
            if($usurioReg["pass"]==sha1($_POST["pass0"])){
              echo "<h2>Usuario encontrado</h2></br>";
              if(isset($_POST["remember"])) $seguridad->addUsuario($usurioReg["usuario"],$usurioReg["pass"],true);
              else $seguridad->addUsuario($usurioReg["usuario"],$usurioReg["pass"],false);
            }else{
              echo "<h2>Las contraseñas no coinciden</h2></br>";
              echo "<a href=login.php>Volver al formulario de login</a>";
            }
          }else{
            echo "<h2>Usuario no encontrado</h2></br>";
            echo "<a href=login.php>Volver al formulario de login</a>";
          }
        }
      }
      //LogOut
      elseif ($_POST["accion"]=="logout") {
        $seguridad->logOut();
        echo "<h2>LogOut</h2></br>";
        echo "<a href=login.php>Volver al formulario de login</a>";
      }
    }
    ?>
    </div>
  </body>
</html>

<?php
include "./lib/Usuario.php";
include "./lib/Seguridad.php";
//Variables de Errorx
$error=false;
$errorMsg="ERROR";
//Control de las acciones a realizar
if(isset($_POST["accion"])){
  //Generamos el nuevo objeto
  $user=new Usuario();
  $seguridad=new Seguridad();
  //Login de usuario
  if ($_POST["accion"]=="login") {
    $error=true;
  }elseif($_POST["accion"]=="registro"){
  }
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro de usuario</title>
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css" type="text/css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="./js/acciones.js"></script>
  </head>
  <body>

    <div class="window">
      <div class="row">
        <div class="col-xs-12
                col-sm-8
                col-md-4
                col-lg-2">
                <div class="box tab" id="cambiarRegistro">Login
                </div>
        </div>
        <div class="col-xs-12
                col-sm-8
                col-md-4
                col-lg-2">
                <div class="box tab" id="cambiarLogin">Registro
                </div>
        </div>
      </div>
      <div class="form">
        <div id="login">
          <!--LOGIN FORM-->
          <form method="post" action="login.php" id="login_form">
            <label for="user">Usuario</label>
            <input type="text" id="user" name="usuario" placeholder="Tu usuario.." value=<?php if(isset($_COOKIE["usuario"])) {echo $_COOKIE["usuario"];} ?>>

            <label for="pass0">Contraseña</label>
            <input type="password" id="pass0" name="pass0" placeholder="Contraseña..">
            <input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["usuario"])) { ?> checked <?php } ?> />
            <label for="remember-me">Recordarme</label>
            <input type="hidden" name="accion" value="login">
            <input type="submit" value="Login">
          </form>
          <!--LOGIN FORM ERROR-->
          <?php
          if($error==true){
            echo "<h2>".$errorMsg."</h2>";
          }
          ?>
        </div>
        <div id="registro">
          <form method="post" action="login.php" id="register_form">
            <label for="fname">Nombre</label>
            <input type="text" id="fname" name="nombre" placeholder="Tu nombre..">

            <label for="lname">Apellidos</label>
            <input type="text" id="lname" name="apellidos" placeholder="Tus apellidos..">

            <label for="user">Usuario</label>
            <input type="text" id="user" name="usuario" placeholder="Tu usuario..">

            <label for="pass0">Contraseña</label>
            <input type="password" id="pass0" name="pass0" placeholder="Contraseña..">

            <label for="pass1">Repite Contraseña</label>
            <input type="password" id="pass1" name="pass1" placeholder="Contraseña..">

            <input type="hidden" name="accion" value="registro">

            <input type="submit" value="Registrar">
          </form>
        </div>
      </div>
    </div>
  </body>
</html>

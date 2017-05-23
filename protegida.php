<?php
include "./lib/Seguridad.php";
$seguridad=new Seguridad();
if($seguridad->getUsuario()==null){
  header('Location: login.php');
  exit;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Página protegida</title>
    <link rel="stylesheet" href="./css/estilos.css">
  </head>
  <body>
    <div>
      <h2>Estoy dentro. Tu usuario es <?=$seguridad->getUsuario()?></h2>
      <form method="post" action="seguridad.php">
        <input type="hidden" name="accion" value="logout">
        <input type="submit" value="LogOut">
      </form>
    </div>
  </body>
</html>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro de usuario</title>
    <link rel="stylesheet" href="./css/estilos.css">
  </head>
  <body>
    <div>
      <h2>Formulario de registro</h2>
      <form method="post" action="seguridad.php">
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
  </body>
</html>

<?php
/**
 * Clase encargada del control de seguridad de la app
 */
class Seguridad
{
  private $usuario=null;

  function __construct()
  {
    //Arrancamos la sesion
    session_start();
    if(isset($_SESSION["usuario"])) $this->usuario=$_SESSION["usuario"];
  }

  public function getUsuario(){
    return $this->usuario;
  }

  public function addUsuario($usuario,$pass,$remember=false){
    //GEnerando la variable de sesion
    $_SESSION["usuario"]=$usuario;
    $this->usuario=$usuario;
    //Almacenaremos el user/pass cookies
    if($remember)
    {
      setcookie("usuario",$usuario,time()+(60*60));
      setcookie("pass",$pass,time()+(60*60));
    }
  }

  public function comprobarRemember(){
    if(isset($_COOKIE["usuario"])){
      $_SESSION["usuario"]=$_COOKIE["usuario"];
      return true;
    }else{
      return false;
    }
  }

  public function logOut(){
    $_SESSION=[];
    session_destroy();
  }

}


 ?>

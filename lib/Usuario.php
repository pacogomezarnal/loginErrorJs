<?php
include "db.php";
/**
 *
 */
class Usuario extends db
{

  function __construct()
  {
    //De esta forma realizamos la conexion a la base de datos
    parent::__construct();
  }

  //Insertamos un nuevo usuario
  function insertarUsuario($nombre,$apellidos,$usuario,$pass,$edad=18,$rol="usuario"){
    //Construimos la consulta
    $sql="INSERT INTO usuario (id, usuario, nombre, apellidos, edad, rol, pass)
          VALUES (NULL, '".$usuario."', '".$nombre."', '".$apellidos."', ".$edad.", '".$rol."', '".sha1($pass)."')";
    //Realizamos la consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      //Recogemos el ultimo usuario insertado
      $sql="SELECT * from usuario ORDER BY id DESC";
      //Realizamos la consulta
      $resultado=$this->realizarConsulta($sql);
      if($resultado!=false){
        return $resultado->fetch_assoc();
      }else{
        return null;
      }
    }else{
      return null;
    }
  }

  //DEvolvemos un nuevo usuario
  function buscarUsuario($usuario){
    //Construimos la consulta
    $sql="SELECT * from usuario WHERE usuario='".$usuario."'";
    //Realizamos la consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      if($resultado!=false){
        return $resultado->fetch_assoc();
      }else{
        return null;
      }
    }else{
      return null;
    }
  }

}

 ?>

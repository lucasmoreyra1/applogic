<?php
$Servidor="Localhost";
$Usuario="root";
$Contrasenia="";
try{
  $conexion=new pdo("mysql:host=$Servidor;dbname=sesion", $Usuario, $Contrasenia);
  $conexion->setAttribute(pdo::ATTR_ERRMODE,pdo::ERRMODE_EXCEPTION);
  echo "Conexion establecida"; 
}catch(pdoException $error){
    echo "Conexion erronea".$error;
}
//$conexion=mysqli_connect("localhost","root","","login")or die(
    //"error de conexion");
?>

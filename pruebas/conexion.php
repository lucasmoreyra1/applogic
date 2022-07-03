<?php

    $servidor="localhost";
    $usuario="root";
    $contrasenna="";


    try{
        $conexion=new PDO("mysql:host=$servidor;dbname=bdproyect", $usuario, $contrasenna);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "conexion establecida";
    }
    catch(PDOexception $error){
        echo "conexion erronea";
    }   

?>
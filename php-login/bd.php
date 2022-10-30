<?php
    require 'functions.php';

    if(!isset($_SESSION['id_ruta'])){
        $_SESSION['id_ruta'] = searchId($conn, $_SESSION['user_id']);//busca id ruta si existe
    }else{
        if($_SESSION['id_ruta']['id_ruta'] < 1){//si el id ruta no devolvio resultados se asignara un nuevo id ruta
            newId_ruta($conn, $_SESSION['user_id']);
            $_SESSION['id_ruta'] = searchId($conn, $_SESSION['user_id']);
        }
    }

    if(isset($_POST['new'])){
        newId_ruta($conn, $_SESSION['user_id']);
        $_SESSION['id_ruta'] = searchId($conn, $_SESSION['user_id']);
        unset($_SESSION['startEnd']['ruta_inicio']);
        unset($_SESSION['startEnd']['ruta_final']);
    }

    if(!isset($_SESSION['anterior'])){
        $_SESSION['anterior'] = "";
    }

    if(isset($_POST['searchAddress']) && !empty($_POST['searchAddress']) && $_SESSION['anterior'] != $_POST['searchAddress'] ){
        sendDireccion($conn, $_POST['searchAddress'], $_SESSION['id_ruta']['id_ruta']);
        $_SESSION['anterior'] = $_POST['searchAddress'];//asigna el valor que va a comparar como anterior para que no se repita al recargar
    }

    if(isset($_POST['deleteOne'])){
        deleteOne($_POST['deleteValue'], $_SESSION['id_ruta']['id_ruta']);
    }

    $_SESSION['direc'] = searchDirections($_SESSION['id_ruta']['id_ruta']);//busca las direcciones por id_ruta


    if(isset($_POST['delete'])){//borrar toda la tabla la consulta debolvera conjunto vacio
        $_SESSION['direc'] = deleteAll($_SESSION['id_ruta']['id_ruta']);
    }

    if(!empty($_POST['searchStart'])){//establecer la direccion de comienzo
        loadExtremes($conn,$_SESSION['id_ruta']['id_ruta'], $_POST['searchStart'], 'ruta_inicio');
        if(empty($_SESSION['startEnd'])){//establece la direccion final es la primera vez en ingresar la de inicio
            loadExtremes($conn,$_SESSION['id_ruta']['id_ruta'], $_POST['searchStart'], 'ruta_final');
        }
    }

    if(!empty($_POST['searchEnd'])){
        loadExtremes($conn,$_SESSION['id_ruta']['id_ruta'], $_POST['searchEnd'], 'ruta_final');
    }

    if(!isset($_SESSION['startEnd']) || empty($_SESSION['startEnd']['ruta_inicio']) || empty($_SESSION['startEnd']['ruta_final'])){//recibir ruta inicio
        $_SESSION['startEnd'] = reciveExtremes($conn, $_SESSION['id_ruta']['id_ruta']);
    }

    if(isset($_POST['change_start'])){//elimina el inicio si se eligio cambiar la ruta
        unset($_SESSION['startEnd']['ruta_inicio']);
    }
    if(isset($_POST['change_end'])){//elimina el final si se eligio cambiar la ruta
        unset($_SESSION['startEnd']['ruta_final']);
    }





?>
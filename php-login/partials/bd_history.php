<?php
    require './database.php';
    require './functions.php';
    $allRoutes = searchAllId($conn, $_SESSION['user_id']);
    if(isset($_POST['import']) && !empty($_POST['importValue'])){
        $_SESSION['id_ruta']['id_ruta'] = $_POST['importValue'];
        $_SESSION['startEnd'] = reciveExtremes($conn, $_POST['importValue']);
        header('Location: ./index.php');
    }
?>
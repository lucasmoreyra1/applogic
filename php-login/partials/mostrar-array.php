<?php
    require 'partial.php';

    if(isset($_POST['searchAddress'])){
        $valor = str_replace(",", "",$_POST['searchAddress']);
    }

    if(!empty($_POST['valores'])){
        $valores = explode(",", $_POST['valores']);
    }else{
        $valores = array();
    }

    if(isset($valor)){
        array_push($valores, $valor);
    }

    $_SESSION['data'] = $valores;



?>
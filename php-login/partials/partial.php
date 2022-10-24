<?php
    if(!isset($_SESSION['data'])){
        $_SESSION['data'] = array();
    }//array de direcciones cargadas por el usuario
	if(!isset($_SESSION['startEnd']) && !empty($_POST['searchStart']) ){
        $_SESSION['startEnd'] = $_POST['searchStart']; //direccin de inicio  y final
    }

    
?>
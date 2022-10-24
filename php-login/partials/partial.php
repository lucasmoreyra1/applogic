<?php
    if(!isset($_SESSION['data'])){
        $_SESSION['data'] = array();
    }
	if(!isset($_SESSION['startEnd']) && !empty($_POST['searchStart']) ){
        $_SESSION['startEnd'] = $_POST['searchStart'];
    }
?>
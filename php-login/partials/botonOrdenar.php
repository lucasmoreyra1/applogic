<?php
    require 'C:\xampp\htdocs\php-login\ordenar.php';
    require 'partial.php';

    for($var = 0; $var < count($coords); $var++){
        $_SESSION['data'][$var] = $coords[$var][0];
    }

    header('Location: /php-login');

?>


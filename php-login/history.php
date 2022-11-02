<?php
    session_start();

    require './partials/bd_history.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./assets/css/styleStart.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <title>Document</title>
    <style>
        header{
            background-image: none;
        }

    </style>
</head>
<body class="fondo">
    <?php 
        require './partials/header.php';
        echo '<div class="return" >';
            echo '<a href="../php-login/" class="boton">volver</a>';
        echo '</div>';
        for($i=count($allRoutes)-1; $i>=0; $i--):
            $directions = searchDirections($allRoutes[$i]);
            $startEnd = reciveExtremes($conn, $allRoutes[$i]);
    ?>
        <?php if(!empty($directions) || !empty($startEnd)): ?>
            <div class="caja">
                <!-- <table> la tabla esta comentada porque al editarlo se ven mal los elementos //A corregir-->
                    <table>
                        <tr>
                            <th>Comienzo: <?php echo $startEnd['ruta_inicio']; ?></th>
                        </tr>

                    <?php 
                        for($var=0; $var < count($directions); $var++):
                    ?>
                        <tr><td> 
                            <?php echo $directions[$var]; ?>
                        </td></tr>

                    <?php
                        endfor;
                    ?>
                        <tr>
                            <th>Final: <?php echo $startEnd['ruta_final']; ?></th>
                        </tr>
                    </table>

                    <form method="POST">
                        <input type="hidden" name="importValue" value="<?php echo $allRoutes[$i]; ?>" />
                        <input type="submit" name="import" class="import" value="Importar ruta">
                    </form>

                <!-- </table> -->
            </div>

    <?php
            endif;
        endfor;
    ?>
</body>
</html>
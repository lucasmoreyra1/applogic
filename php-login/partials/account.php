<?php
    session_start();
    require '../database.php';
    require '../functions.php';

    $display = 0;
    $message = '';
    if(isset($_POST['changeEmail'])){
        $display = 1;
    }elseif(isset($_POST['changePassword']))$display = 2;

    if(!empty($_POST['email'])){
        $exist = selectUser($conn, $_POST['email']);
        if(empty($exist)){
            modifiEmail($conn, $_POST['email'], $_SESSION['user_id']);
            $display = 0;
        }else{
            $message = 'El email ya existe';
        }

    }elseif(!empty($_POST['password'])){
        modifiPassword($conn, $_POST['password'], $_SESSION['user_id']);
        $display = 0;
    }
    if(isset($_POST['return'])) $display = 0;
    $email = selectEmail($conn, $_SESSION['user_id']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" href="../assets/css/normalize.css" as="style">
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/styleStart.css">
    <title>Ubitec</title>
    <style>
        body{
            background-image: url('../assets/css/fondoindex.jpg');
            background-repeat: repeat-y;
        }
        header{
            background-image: none;
        }
    </style>
</head>
<body>
    <?php require './header.php'; ?>
    <div class="return">
        <a href="../../php-login/" class="boton">volver</a>
    </div>
    <form method="POST" class="contenedor sombra">
        <?php
            switch($display):
                case 0:
        ?>
            <span class="form">Email: <?php echo $email['email']; ?></span><br><br>
		    <input class="boton" name="changeEmail" type="submit"  value="Cambiar email"><br><br>

		    <input class="boton" name="changePassword" type="submit"  value="Cambiar contaseña">

        <?php
                break;
                case 1:
                    echo '<span>'.$message.'</span>'.'<br>';
                    echo '<input class="form" type="text" name="email"  placeholder="nuevo email"><br>';
                    echo '<input class="boton" name="changeEmail" type="submit" value="cambiar email"><br>';
                    echo '<input class="boton" name="return" type="submit"  value="Volver">';

        ?>
        <?php
                break;
                case 2:
                    echo '<input class="form" type="password" name="password" type="submit"  placeholder="nueva contraseña"><br>';
                    echo '<input class="boton" name="changePassword" type="submit"  value="Cambiar contraseña"><br>';
                    echo '<input class="boton" name="return" type="submit"  value="Volver">';
                break
        ?>
        <?php
            endswitch;
        ?>
    </form>
</body>
</html>
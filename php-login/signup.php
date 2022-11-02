<?php
    require 'database.php';
    require 'functions.php';

    $message = '';

    if(!empty($_POST['email'])){
        $exist = selectUser($conn, $_POST['email']);
    }

    if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['nickname']) && empty($exist)){
        if($_POST['password'] == $_POST['confirm_password']){
            $sql = "INSERT INTO users (email, password, nickname) VALUES (:email, :password, :nickname)";
            $stmt = $conn->prepare($sql);
            $stmt-> bindParam(':email', $_POST['email']);
            $stmt-> bindParam(':nickname', $_POST['nickname']);
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $stmt->bindParam(':password', $password);

            if($stmt->execute()){
                session_start();
                $_SESSION['user_id'] = selectUser($conn, $_POST['email']);

                if(!empty($_SESSION['user_id'])){
                    header('Location: ../php-login');
                }

            }
            else{
                $message = 'Error al crear el usuario!';
            }
        }else{
            $message = 'Las contraseñas no coinciden';
        }
    }elseif(!empty($_POST['email'])){
        $message = 'El email ya existe';
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title>Registro</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    </head>
    <body class="fondo">

        <?php
            require 'partials/header.php';
        ?>

        <form class="caja" action="signup.php" method="post">
            <h1>Registrarse</h1>
            <input type="text" name="nickname" placeholder="Ingrese su nombre de usuario">
            <input type="text" name="email" placeholder="Ingrese su email">
            <input type="password" name="password" placeholder="Ingrese su contraseña">
            <input type="password" name="confirm_password" placeholder="Confirme su contraseña">
            <input type="submit" value="Crear usuario">
            <a href="../php-login/login.php"><input type="button" value="Entrar"></a>
			<?php if(!empty($message)): ?>
                <p><span><?= $message ?></span></p>
			<?php endif; ?>
        </form>
    </body>
</html>
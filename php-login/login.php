<?php
    session_start();

    if(isset($_SESSION['user_id'])){
        header('Location: ../php-login');
    }

    require 'database.php';

    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $records = $conn->prepare('SELECT id, email, password, nickname FROM users WHERE email=:email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';

        if(is_countable($results) > 0 && password_verify($_POST['password'], $results['password'] ) ){
            $_SESSION['user_id'] = $results['id'];
            header('Location: ../php-login/index.php');
        }else{
            $message = '<span class="mensaje">Tu correo o contraseña son incorrectos.</span>';
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;1,700&display=swap" rel="stylesheet">
        <link rel="Stylesheet" href="assets/css/style.css">
    </head>
    <body class="fondo1">
        <?php
            require 'partials/header.php';
        ?>
        <form class="caja" action="login.php" method="post" >
            <h1>Iniciar Sesion</h1>
            <input type="text" name="email" placeholder="Ingrese su email">
            <input type="password" name="password" placeholder="Ingrese su contraseña">
            <input type="submit" value="Entrar">
            </br>
            <a href="../php-login/signup.php">
                <input type="button" value="Registrarse">
            </a>
            <?php if(!empty($message)): ?>
                <p><?= $message ?></p>
            <?php endif; ?>
        </form>
    </body>

</html>
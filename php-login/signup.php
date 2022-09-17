<?php
    require 'database.php';

    $message = '';


    if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['nickname'])){
        $sql = "INSERT INTO users (email, password, nickname) VALUES (:email, :password, :nickname)";
        $stmt = $conn->prepare($sql);
        $stmt-> bindParam(':email', $_POST['email']);
        $stmt-> bindParam(':nickname', $_POST['nickname']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);

        if($stmt->execute()){
            $message = 'Susesfully created user.';
        }
        else{
            $message = 'Error creating user.';
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;1,700&display=swap" rel="stylesheet">
        <link rel="Stylesheet" href="assets/css/style.css">
    </head>
    <body>

        <?php
            require 'partials/header.php';
        ?>

        <?php if(!empty($message)): ?>
            <p><?= $message ?></p>
        <?php endif; ?>

        <form class="caja" action="signup.php" method="POST">
            <h1>Registrarse</h1>
            <input type="text" name="nickname" placeholder="Ingrese su nombre de usuario">
            <input type="text" name="email" placeholder="Ingrese su email">
            <input type="password" name="password" placeholder="Ingrese su contraseña">
            <input type="password" name="_confirm_password" placeholder="confirme su contraseña">
            <input type="submit" value="Crear usuario">
            <a href="../php-login/login.php">
                <input type="button" value="Logearse">
            </a>
        </form>
    </body>
</html>
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
            $message = 'El usuario fue creado!';
        }
        else{
            $message = 'Error al crear el usuario!';
        }
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
            <input type="password" name="_confirm_password" placeholder="Confirme su contraseña">
            <input type="submit" value="Crear usuario">
            <a href="../php-login/login.php"><input type="button" value="Entrar"></a>
			<?php if(!empty($message)): ?>
                <div class="mensaje"><?= $message ?></div>
			<?php endif; ?>
        </form>
    </body>
</html>
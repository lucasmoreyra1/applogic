<?php
    session_start();

    require 'database.php';

    if(isset($_SESSION['user_id'])){
        $records = $conn->prepare('SELECT id, email, password, nickname FROM users WHERE id =:id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $users = null;

        if(count($results) > 0){
            $user = $results;
        }
    }
?>





<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>UBITEC</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;1,700&display=swap" rel="stylesheet">
        <link rel="Stylesheet" href="assets/css/style.css">

    </head>


    <body>

        <?php
            require 'partials/header.php';
        ?>

        <?php if(!empty($user)): ?>
            <br><p>Welcome</p>
            <br>
            <p>you are sussesfully loged in</p>
            <a href="logout.php">logoout</a>
        <?php else: ?>
            <h1>Por favor entre o registrese para continuar</h1>
            <a  href="login.php">Entrar</a> o
            <a  href="signup.php">Registrarse</a>
        <?php endif ?>



    </body>

</html>
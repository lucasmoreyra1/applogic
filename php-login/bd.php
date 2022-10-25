<?php
    if(!isset($_SESSION['id_ruta'])){
        $_SESSION['id_ruta'] = searchId($conn, $_SESSION['user_id']);
    }else{

        if($_SESSION['id_ruta']['id_ruta'] < 1){
            $userId = $_SESSION['user_id'];

            $sql = "INSERT INTO user_ruta (id_user) VALUES (:mostrar)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':mostrar', $userId);
            $stmt->execute();
            $_SESSION['id_ruta'] = searchId($conn, $_SESSION['user_id']);
        }

    }


    if(isset($_POST['searchAddress'])){
        sendDireccion($conn, $_POST['searchAddress'], $_SESSION['id_ruta']['id_ruta']);
    }

    $_SESSION['direc'] = searchDirections($conn, $_SESSION['id_ruta']['id_ruta']);

    function searchId($conn, $idUser){
        $sql = "SELECT MAX(id_ruta) id_ruta FROM user_ruta WHERE id_user=:id_user";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_user', $idUser);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        return $results;
    }

    function sendDireccion($conn, $direccion, $id_ruta){
        $entregado = 0;
        $sql = "INSERT INTO ruta (id_ruta, direccion, entregado) VALUES (:id_ruta, :direccion, :entregado)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_ruta', $id_ruta);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':entregado', $entregado);
        $stmt->execute();
        return;
    }

    function searchDirections($conn, $id_ruta){
        $sql = "SELECT ruta.direccion FROM ruta INNER JOIN user_ruta ON user_ruta.id_ruta = ruta.id_ruta WHERE ruta.id_ruta=:id_ruta";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_ruta', $id_ruta);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        return $results;
    }


?>
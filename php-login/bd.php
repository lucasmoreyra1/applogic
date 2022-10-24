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



    function searchId($conn, $idUser){
        $sql = "SELECT MAX(id_ruta) id_ruta FROM user_ruta WHERE id_user=:id_user";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_user', $idUser);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        return $results;
    }
?>
<?php
    if(!isset($_SESSION['id_ruta'])){
        $_SESSION['id_ruta'] = searchId($conn, $_SESSION['user_id']);//busca id ruta si existe
    }else{

        if($_SESSION['id_ruta']['id_ruta'] < 1){//si el id ruta no devolvio resultados se asignara un nuevo id ruta
            $userId = $_SESSION['user_id'];

            $sql = "INSERT INTO user_ruta (id_user) VALUES (:mostrar)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':mostrar', $userId);
            $stmt->execute();
            $_SESSION['id_ruta'] = searchId($conn, $_SESSION['user_id']);
        }

    }

    if(!isset($_SESSION['anterior'])){
        $_SESSION['anterior'] = "";
    }

    if(isset($_POST['searchAddress']) && !empty($_POST['searchAddress']) && $_SESSION['anterior'] != $_POST['searchAddress'] ){
        sendDireccion($conn, $_POST['searchAddress'], $_SESSION['id_ruta']['id_ruta']);
        $_SESSION['anterior'] = $_POST['searchAddress'];//asigna el valor que va a comparar como anterior para que no se repita al recargar
    }

    $data = searchDirections($_SESSION['id_ruta']['id_ruta']);//busca las direcciones por id_ruta

    if(!empty($data)){

        $_SESSION['direc'] = array();

        $lenght = $data->num_rows;//longitud de los datos

        //bucle para convertir el objeto en un array con las direcciones
        for($i = 0; $i<$lenght; $i++){
            $_SESSION['direc'][$i]=mysqli_fetch_array($data)[0];
        }
    }



    if(isset($_POST['delete'])){//borrar toda la tabla
        $_SESSION['direc'] = deleteAll($_SESSION['id_ruta']['id_ruta']);
    }

    if(!empty($_POST['searchStart'])){//establecer la direccion de comienzo
        loadExtremes($conn,$_SESSION['id_ruta']['id_ruta'], $_POST['searchStart']);
    }

    if(!isset($_SESSION['startEnd']) || empty($_SESSION['startEnd']['ruta_inicio'])){
        $_SESSION['startEnd'] = reciveExtremes($conn, $_SESSION['id_ruta']['id_ruta']);
    }




    function searchId($conn, $idUser){//busca el id de ruta del usuario
        $sql = "SELECT MAX(id_ruta) id_ruta FROM user_ruta WHERE id_user=:id_user";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_user', $idUser);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        return $results;
    }

    function sendDireccion($conn, $direccion, $id_ruta){//envia las direcciones seguen el id de ruta
        $entregado = 0;
        $sql = "INSERT INTO ruta (id_ruta, direccion, entregado) VALUES (:id_ruta, :direccion, :entregado)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_ruta', $id_ruta);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':entregado', $entregado);
        $stmt->execute();
        return;
    }

    //trae las direcciones desde la base de datos
    function AsearchDirections($conn, $id_ruta){
        $sql = "SELECT ruta.direccion FROM ruta INNER JOIN user_ruta ON user_ruta.id_ruta = ruta.id_ruta WHERE ruta.id_ruta=:id_ruta";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_ruta', $id_ruta);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        return $results;
    }

    


    function searchDirections($id_ruta){
        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link, "ubitec");

        try{
            $result = mysqli_query($link, "SELECT ruta.direccion FROM ruta INNER JOIN user_ruta ON user_ruta.id_ruta = ruta.id_ruta WHERE ruta.id_ruta=$id_ruta");
            mysqli_close($link);
            return $result;
        }catch(Exception $e){

        }


    }

    function deleteAll($id_ruta){
        $link = mysqli_connect("localhost", "root", "");
        mysqli_select_db($link, "ubitec");

        $delete = mysqli_query($link, "DELETE FROM ruta WHERE id_ruta=$id_ruta");
        mysqli_close($link);
        return array();
    }

    function loadExtremes($conn ,$id_ruta, $direccion){
        $load = "UPDATE user_ruta SET ruta_inicio=:direccion WHERE id_ruta=:id_ruta";
        $stmt = $conn->prepare($load);
        $stmt ->bindParam(':id_ruta', $id_ruta);
        $stmt ->bindParam(':direccion', $direccion);
        $result = $stmt->execute();
        return;
    }

    function reciveExtremes($conn ,$id_ruta){
        $load = "SELECT ruta_inicio FROM user_ruta WHERE id_ruta=:id_ruta";
        $stmt = $conn->prepare($load);
        $stmt->bindParam(':id_ruta', $id_ruta);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        return $results;
    }

?>
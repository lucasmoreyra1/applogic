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
        <style>
        .direccion{
            text-align: center;
            margin: 50px;
        }
        input[type="text"]{
            margin: 10px auto;
            height: 30px;
        }
        table{
            background: white;
            border: 1px solid black;
            width: 500px;
            margin: auto;
        }
        th,td{
            border: 1px solid black;
            text-align: center;
        }
        </style>
    </head>
    <body>

        <?php
            require 'partials/header.php';
        ?>
        <article class="caja">

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

        <div class="direccion">  
            <input type="text" id="id" placeholder="Por favor ingrese la direccion">
            <input type="button" id="add" value="Añadir">
        </div>
        </article>
        <table>
            <caption>Formulario de información del estudiante</caption>
            <tr>
                <th>Direccion</th>
                <th>Quitar</th>
            </tr>
        </table>
        <script>
            // Agrega un evento de clic al botón
            document.getElementById("add").onclick = function () {
                // Obtiene el valor del cuadro de entrada
                var id_text = document.getElementById("id").value;

                // Para instalar id en td, primero cree el nodo td
                var td_id_node = document.createElement("td");
                // El valor ingresado es texto, no un nodo. Si desea agregarlo a través de un nodo, debe convertirse en un nodo de texto
                var id_text_node = document.createTextNode(id_text);
                // Agregar nodo de identificación
                td_id_node.appendChild(id_text_node);


                // Eliminar para instalar en td, pero no, así que cree un hipervínculo primero y luego agregue un nodo de texto "eliminar"
                var ele_a = document.createElement("a");
                // Establecer el atributo href
                ele_a.setAttribute("href","javascript:void(0);");
                // Establecer el atributo onclick
                ele_a.setAttribute("onclick","del_tr(this);");
                // Convertir eliminar en un nodo de texto
                var del_node = document.createTextNode("Eliminar");
                // Realizar hipervínculo
                ele_a.appendChild(del_node);
                // Crear nodo td
                var td_del_node = document.createElement("td");
                // Agregar eliminar hipervínculo
                td_del_node.appendChild(ele_a);

                // Agrega 4 td a tr, tr no lo es, crea tr primero
                var tr_node = document.createElement("tr");
                // tr agregar td
                tr_node.appendChild(td_id_node);
                tr_node.appendChild(td_del_node);

                // tabla agrega tr, hay una tabla, para convertirse en un nodo
                var table_node = document.getElementsByTagName("table")[0];
                table_node.appendChild(tr_node);
            }
            del_tr = function (obj) {// Devuelto es el objeto de la etiqueta a
                // Eliminar nodos secundarios a través del nodo principal
                // Elimina tr a través de la tabla, obtén el nodo de la tabla primero
                var table_node = obj.parentNode.parentNode.parentNode;
                table_node.removeChild(obj.parentNode.parentNode);
            }
        </script>

    </body>
</html>

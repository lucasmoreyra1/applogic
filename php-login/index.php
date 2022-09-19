<?php
    session_start();

    require 'database.php';//llama a la conexion de la base de datos

    require 'partials/functions.php';//golocalizacion con api

    if(isset($_SESSION['user_id'])){//login busca el usuario
        $records = $conn->prepare('SELECT id, email, password, nickname FROM users WHERE id =:id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $users = null;

        if(count($results) > 0){
            $user = $results;
        }
    }



        require 'partials/partial.php';//guarda los datos de las direcciones

        require 'partials/mostrar-array.php';//procesado para guardar datos
        require 'ordenar.php';// asigna latitud y longitud en una variable $coords 

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

        <?php if(!empty($user)): ?>
            <br><p>Welcome</p>
            <br>
            <p>you are sussesfully loged in</p>


            <form method="post">
                <div class="form-group">
                    <div class="direccion">
                        <input type="text" name="searchAddress" id="id" placeholder="Por favor ingrese la direccion">
                        <input type="hidden" name="valores" value="<?php echo implode(",", $_SESSION['data']); ?>">
                        <input type="submit" id="add" value="Añadir">
                    </div>
                </div>

            </form>



                <table>
                    <?php
                        echo count($valores);
                        for($var=0; $var < count($valores); $var++){ ?>
                            <?php  echo "<tr><td>"; echo $valores[$var]; echo "</td></tr>"?>
                    <?php
                        }
                    ?>

                </table>



            <a href="logout.php">logoout</a>
        <?php else: ?>
            <h1>Por favor entre o registrese para continuar</h1>
            <a  href="login.php">Entrar</a> o
            <a  href="signup.php">Registrarse</a>
        <?php endif ?>
        
        
        
        
        <!--Reloj v1, solo se activa al cargar la pagina-->
        
        
        <div>
      <div class="tiempo" id="tiempo">0:00:00</div>
      </div>

        <script>

      let tiempoRef = Date.now()
      let cronometrar = true
      let acumulado = 0



      setInterval(() => {
          let tiempo = document.getElementById("tiempo")
          if (cronometrar) {
              acumulado += Date.now() - tiempoRef
          }
          tiempoRef = Date.now()
          tiempo.innerHTML = formatearMS(acumulado)
      }, 10 / 60);

      function formatearMS(tiempo_ms) {
          let MS = tiempo_ms % 1
          
          let St = Math.floor(((tiempo_ms - MS) / 1000))
          
          let S = St%60
          let M = Math.floor((St / 60) % 60)
          let H = Math.floor((St/60 / 60))
          Number.prototype.ceros = function (n) {
              return (this + "").padStart(n, 0)
          }

          return H.ceros(1) + ":" + M.ceros(2) + ":" + S.ceros(2)
      }
    </script>


    </body>
</html>

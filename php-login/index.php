<?php
    session_start();

    require 'database.php';//llama a la conexion de la base de datos

    //require 'partials/functions.php';//golocalizacion con api

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
        //require 'ordenar.php'; //asigna latitud y longitud en una variable $coords 
        //require 'script.php';


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>UBITEC</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;1,700&display=swap" rel="stylesheet">
        <link rel="Stylesheet" href="assets/css/style.cs">
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>


        <!-- playground-hide -->
        <script>
        const process = { env: {} };
        process.env.GOOGLE_MAPS_API_KEY =
            "AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg";
        </script>
        <!-- playground-hide-end -->

        <link rel="stylesheet" type="text/css" href="./style.css" />
        <script type="module" src="./script.php"></script>


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
            <br><p>Bienvenido a UBITEC</p>

            <div id="container">
                <div id="map"></div>
                    <div id="sidebar">
                        <div>

                            <form method="post">

                                <div class="form-group">
                                    <?php
                                        if(empty($_SESSION['startEnd'])):
                                    ?>
                                        <div>
                                            <input type="text" id="search_input" name="searchStart"  placeholder="Ingrese direccion de comienzo">
                                            <input name="add_start" type="submit" id="add_start" value="Añadir">
                                        </div>
                                    <?php
                                        else:
                                    ?>

                                    <div class="direccion">
                                        <input type="text" id="search_input" name="searchAddress"  placeholder="Por favor ingrese la direccion">
                                        <input type="hidden" name="valores" value="<?php echo implode(",", $_SESSION['data']); ?>">
                                        <input name="add" type="submit" id="add" value="Añadir">


                                    </div>

                                    <?php
                                        endif;
                                    ?>  
                                </div>
<!--
                                    <div class="form-group">
                                        <input type="text" id="search_input" name="inicio" placeholder="Ingrese su punto de partida"> 
                                        <input type="submit" name="start" value="Ingresar"  >
                                    </div> -->


                            </form>

                            <table>
                                <?php
                                    if(!empty($_SESSION['data'])):
                                ?>
                                <?php 
                                    for($var=0; $var < count($_SESSION['data']); $var++){
                                        echo "<tr><td>"; echo $_SESSION['data'][$var]; echo "</td></tr>";
                                    }
                                ?>
                                <input type="submit" id="submit" value="Ordenar y mostrar" />
                                <?php endif; ?>
                            </table>

                        </div>
                    <div id="directions-panel"></div>
                </div>
            </div>


            <!-- Mapa google -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <?php
                require 'script.php';
            ?>
            <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyDGc0UBAR_Y30fX31EvaU65KATMx0c0ItI&callback=initMap&v=weekly"></script>




            <a href="logout.php">logout</a>
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

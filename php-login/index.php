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
		require 'script.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Mapa</title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;1,700&display=swap" rel="stylesheet">
		<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <!-- playground-hide -->
        <script>
        const process = { env: {} };
        process.env.GOOGLE_MAPS_API_KEY =
            "AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg";
        </script>
        <!-- playground-hide-end -->
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
		   integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
		   crossorigin=""/>
		   <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
		  integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
		  crossorigin=""></script>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<script type="module" src="../script.php"></script>
        <style>
			#map{
				border: 3px solid #080404;
				height: 500px;
				width: 470px;
			}
        </style>
    </head>
    <body class="fondo">
			
        <?php
            require 'partials/header.php';
        ?>

        <?php if(!empty($user)): ?>
            <!--<br><p>Welcome</p>
            <br>
            <p>you are sussesfully loged in</p>
            <a href="logout.php">logoout</a>-->
		<div id="container">
			<div id="sidebar">
				<form class="cajados" method="post">
					<div class="form-group">
						<input type="text" name="searchAddress" id="id" placeholder="Por favor ingrese la direccion">
						<input type="hidden" name="valores" value="<?php echo implode(",", $_SESSION['data']); ?>">
						<input name="add" type="submit" id="add" value="Añadir">
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
				<div id="map"></div>
				   <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
				   integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
				   crossorigin=""></script>
				   <script src="https://unpkg.com/esri-leaflet@2.4.1/dist/esri-leaflet.js"
				   integrity="sha512-xY2smLIHKirD03vHKDJ2u4pqeHA7OQZZ27EjtqmuhDguxiUvdsOuXMwkg16PQrm9cgTmXtoxA6kwr8KBy3cdcw=="
				   crossorigin=""></script> 
				 
				   <!-- Load Esri Leaflet Geocoder from CDN --> 
				   <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.css"
					 integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
					 crossorigin="">
				   <script src="https://unpkg.com/esri-leaflet-geocoder@2.3.3/dist/esri-leaflet-geocoder.js"
					 integrity="sha512-HrFUyCEtIpxZloTgEKKMq4RFYhxjJkCiF5sDxuAokklOeZ68U2NPfh4MFtyIVWlsKtVbK5GD2/JzFyAfvT5ejA=="
					 crossorigin=""></script> 
					 <!-- Load Esri Leaflet Vector from CDN-->
					<script src="https://unpkg.com/esri-leaflet-vector@4.0.0/dist/esri-leaflet-vector.js"
					 integrity="sha512-EMt/tpooNkBOxxQy2SOE1HgzWbg9u1gI6mT23Wl0eBWTwN9nuaPtLAaX9irNocMrHf0XhRzT8B0vXQ/bzD0I0w=="
					 crossorigin=""></script>
				   <script src="../map.js"></script>
				   <!-- Load ArcGIS REST JS from CDN -->
				   <script src="https://unpkg.com/@esri/arcgis-rest-request@4.0.0/dist/bundled/request.umd.js"></script>
				   <script src="https://unpkg.com/@esri/arcgis-rest-routing@4.0.0/dist/bundled/routing.umd.js"></script>
					<input type="submit" id="submit" value="Ordenar y mostrar" />
					<div id="directions-panel"></div>
			</div>
		</div>
		<script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGc0UBAR_Y30fX31EvaU65KATMx0c0ItI&callback=initMap&v=weekly" defer></script>
		<?php else: ?>
			<div class="caja">
				<h1>Por favor entre o registrese para continuar</h1>
				<a href="login.php"><input type="button" value="Logearse"></a>
				<a href="signup.php"><input type="button" value="Registrarse"></a>
			</div>
        <?php endif ?>
        <!--Reloj v1, solo se activa al cargar la pagina-->
        <!-- <div>
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
		</script>-->
    </body>
</html>

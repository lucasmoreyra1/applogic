<?php
    session_start();

    require 'database.php';//Llama a la conexión de la base de datos

    if(isset($_SESSION['user_id'])){//Login busca a el Usuario
        $records = $conn->prepare('SELECT id, email, password, nickname FROM users WHERE id =:id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        $users = null;

        if(count($results) > 0){
            $user = $results;
        }
    }
        require 'partials/partial.php';//Guarda los datos de las direcciones
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>Ubitec - Entrega de correo</title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href=" https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;1,700&display=swap" rel="stylesheet">
		<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <!-- playground-hide -->
        <script>
        const process = { env: {} };
        process.env.GOOGLE_MAPS_API_KEY =
            "AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg";
        </script>
		<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
		<script type="module" src="/script.php"></script>
    </head>
    <body class="fondo">
    	<?php
            require 'partials/header.php';//Llama a un header independiente
        ?>
        <?php if(!empty($user)): ?>
        	<div class="array"> <!--Se oculta el texto de startend-->
				<?php require 'bd.php';print_r($_SESSION['startEnd']);?>
			</div>
			<div class="deslogear"><a href="logout.php">Log Out</a></div> <!--Botón de deslogeo-->
				<div class="cajados">
					<form method="post"><!--form para ingresar dirección de comienzo y direcciones de entrega-->
						<?php
							if(empty($_SESSION['startEnd'])):
						?>
							<input type="text" id="search_input" name="searchStart"  placeholder="Ingrese direccion de comienzo">
							<input name="add_start" type="submit" id="add_start" value="Añadir">
						<?php
							else:
						?>
							<input type="text" id="search_input" name="searchAddress"  placeholder="Por favor ingrese la direccion">
							<input type="hidden" name="valores" value="<?php echo implode(",", $_SESSION['data']); ?>">
							<input name="add" type="submit" id="add" value="Añadir">
						<?php
							endif;
						?>
					</form>
				</div>
			<div class="map-table">
				<div id="map"></div>
				<div>
					<table>
						<tr>
							<td>Direcciones</td>
						</tr>
						<?php
							if(!empty($_SESSION['direc'])):
						?>
						<?php 
							for($var=0; $var < count($_SESSION['direc']); $var++){
								echo "<tr><td>"; echo $_SESSION['direc'][$var]; echo "<label><input type='checkbox'><div class='check'></div></label>"; echo "</td></tr>";
							} //Tabla que se llena añadiendo direcciones
						?>
						<input type="submit" id="submit" value="Ordenar y mostrar" />
						<!--Botón que ordena y muestra la ruta más corta para el usuario-->
					</table>
					<form method="POST">
						<input type="submit" id="submit" name="delete" value="Eliminar todo" />
						<!--Botón que elimina las direcciones añadidas-->
					</form>
					<div id="directions-panel"><strong>Rutas ordenadas</strong></div>
					<!--Información de ayuda para ver donde comenzar-->
					<?php endif; ?>
				</div>
			</div>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
			<?php
				require 'script.php';
			?>
			<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyDGc0UBAR_Y30fX31EvaU65KATMx0c0ItI&callback=initMap&v=weekly"></script>
			<?php else: ?>
				<div class="caja">
					<h1>Por favor Entre ó Registrese</h1>
					<a href="login.php"><input type="button" value="Logearse"></a>
					<a href="signup.php"><input type="button" value="Registrarse"></a>
				</div>
        <?php endif ?>
    </body>
</html>
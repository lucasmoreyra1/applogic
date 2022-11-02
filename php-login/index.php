<?php
    session_start();

    require 'database.php';//llama a la conexion de la base de datos


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

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>Ubitec</title>
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
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<script type="module" src="/script.php"></script>
    </head>
    <body class="fondo">
    	<?php
            require 'partials/header.php';
        ?>
        <?php if(!empty($user)): ?> <!-- si los resultados no estan vacios va a mostrar la pagina principal, sino la pagina de inicio para ingresar -->
			<?php require 'bd.php';?>

			<a href="logout.php"><button class="deslogear">Log Out</button></a> <!--Botón de deslogeo-->
			<a href="history.php"><button class="historial">Historial</button></a>
			<a href="./partials/account.php"><button class="account">Mi cuenta</button></a>

				<div class="cajados">
					<form method="post">
						<?php
							//evalua si la ruta de inicio fue ingresada
							if(empty($_SESSION['startEnd']['ruta_inicio'])):
						?>
							<input type="text" id="search_input" name="searchStart"  placeholder="Ingrese direccion de comienzo">
							<input name="add_start" type="submit" id="add_start" value="Añadir">

						<?php endif; ?>
						<?php
							//evalua si esta vacia la ruta final para pedir que sea ingresada (corregir boton añadir)
							if(empty($_SESSION['startEnd']['ruta_final']) && !empty($_SESSION['startEnd']['ruta_inicio'])):
						?>
							<input type="text" id="search_input" name="searchEnd"  placeholder="Ingrese direccion final">
							<input type="submit" id="add_end" value="Añadir">
						<?php
							//evalua si estan ambas rutas ingresadas para pedir las direcciones
							elseif(!empty($_SESSION['startEnd']['ruta_final']) && !empty($_SESSION['startEnd']['ruta_inicio'])):
						?>
							<input type="text" id="search_input" name="searchAddress"  placeholder="Por favor ingrese la direccion">
							<input type="hidden" name="valores" value="<?php echo implode(",", $_SESSION['data']); ?>">
							<input name="add" type="submit" id="add" value="Añadir">
						<?php
							endif;
						?>
					</form>
				</div>
				<?php
						//evalua si la ruta de inicio fue ingresada para mostrarla con su boton de cambiar
					if(!empty($_SESSION['startEnd']['ruta_inicio'])):
				?>
					<div class="contenedor">
						<div class="cajatres">
							<form method="POST">
								<label for="start">Direccion de comienzo: <?php echo $_SESSION['startEnd']['ruta_inicio']; ?> </label>
								<input type="submit" name="change_start" value="Cambiar ruta inicio" />
							</form>
						</div>
						<!-- evalua si la ruta final fue ingresada para mostrarla con su boton de cambiar -->
						<?php if(!empty($_SESSION['startEnd']['ruta_final'])): ?>
							<div class="cajatres">
								<form method="POST">
									<label for="start">Direccion Final: <?php echo $_SESSION['startEnd']['ruta_final']; ?> </label>
									<input type="submit" name="change_end" value="Cambiar ruta Final" />
								</form>
							</div>
					</div>
					<?php endif; ?>
				<?php
						endif;
				?>
			<div class="map-table" name="map">
				<div id="map"></div>
					<div class="info">
						<?php
							//evalua si hay direccion de inicio o alguna direccion cargada para mostrar la estructura y tabla
							if(!empty($_SESSION['direc']) && !empty($_SESSION['startEnd']['ruta_inicio'])):
						?>
						<table>
							<tr>
								<td>Direcciones</td>
							</tr>
								<!-- Imprime tabla con boton para eliminar -->
								<?php 
									for($var=0; $var < count($_SESSION['direc']); $var++):
								?>
								<form method="POST">
									<tr><td> 
										<?php echo $_SESSION['direc'][$var]; ?>
										<input type="hidden" name="deleteValue" value="<?php echo $_SESSION['direc'][$var]; ?>" />
										<div class="eliminar">
											<input type="submit" name="deleteOne" value="Eliminar"><!--boton para eliminar individual -->
											<label><input type='checkbox'><div class='check'></div></label>
										</div>
									</td></tr>
								</form>
								<?php
									endfor;
								?>

							<!-- boton ordenar y mostrar -->
							<input type="submit" id="submit" value="Ordenar y mostrar" />

						</table>
						<!-- boton eliminar toodo -->
						<form method="POST">
							<input type="submit" id="delete" name="delete" value="Eliminar todo" />
							<input type="submit" id="new" name="new" value="Nueva Ruta" />
						</form>

						<div id="directions-panel"><strong>Rutas ordenadas</strong></div>

						<?php endif; ?>
					</div>
			</div>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
			<?php
				require 'script.php';
			?>
			<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyDGc0UBAR_Y30fX31EvaU65KATMx0c0ItI&callback=initMap&v=weekly"></script>
			<!-- llama a la pagina de inicio si el usuario no entro -->

		<?php require './partials/footer.php'; else: header('Location: ./partials/startPage.php');?>

        <?php endif ?>
        <!--Reloj v1, solo se activa al cargar la pagina
        <div>
			<div id="tiempo">0:00:00</div>
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
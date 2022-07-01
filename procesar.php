<?php
/*cambiando post por get funciona sin el error de Undefined array key */
$nombre = $_POST['nombre'];
$asunto = $_POST['asunto'];
$mensaje =$_POST['mensaje'];
echo "<h2>Información recibida desde PHP</h2>";
echo "El nombre recibido es: " . $nombre . "<br/>";
echo "El asunto recibido es: " . $asunto . "<br/>";
echo "El mensaje recibido es: " . $mensaje . "<br/>";

?>
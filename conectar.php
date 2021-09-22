<?php
	
//Configuracion de la conexion
$conexion = new mysqli('localhost', 'root', '', 'test');

//Conectar a la base de datos
if (mysqli_connect_errno()) {
    // La conexión falló.
    // Avisamos por pantalla
    echo "Lo lamento, este sitio web está experimentando problemas.<br>";

    // En este ejemplo vamos a mostrar el error de MySQL, pero esto NO SE DEBE hacer en un sitio publico
    echo "Error: Fallo al conectarse a MySQL debido a: <br>";
    echo "Num.Error: " . $mysqli->mysqli_connect_errno() . "<br>";
    echo "DescError: " . $mysqli->mysqli_connect_error() . "<br>";
    
    exit;
}
?>
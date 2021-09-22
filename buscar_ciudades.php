<?php
	require("conectar.php");
	$html = "";
	$idpais = $_POST["paiselegido"];
	$s="SELECT id_ciudad, descripcion FROM ciudades WHERE id_pais = $idpais ORDER BY descripcion";
    if (!$r = $conexion->query($s)) {
        echo "Error: La ejecución de la consulta falló \n";
        echo "Errno: " . $conexion->errno . "\n";
        echo "Error: " . $conexion->error . "\n";
        exit;
    }

    while($l = $r->fetch_assoc())
    {
    	$html = $html . '<option value="' . $l['id_ciudad'] .'"">' . $l['descripcion'] .'</option>';
    }
    $r->free();
	echo $html;	
?>
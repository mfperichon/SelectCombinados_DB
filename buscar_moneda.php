<?php
	require ("conectar.php");
	$html = "";
	$idpais = $_POST["paiselegido"];
	$s="SELECT id_moneda, descripcion FROM monedas WHERE id_pais = $idpais LIMIT 1";
    if (!$r = $conexion->query($s)) {
        echo "Error: La ejecución de la consulta falló \n";
        echo "Errno: " . $conexion->errno . "\n";
        echo "Error: " . $conexion->error . "\n";
        exit;
    }

    while($l = $r->fetch_row())
    {
        $html = $html . '<input type=text name=moneda id=moneda class=form-control value="'. $l[1] .'">';
    }
    $r->free();
	echo $html;	
?>
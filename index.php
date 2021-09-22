<?php
    //Incluimos archivo de conexion a la base de datos
    require("conectar.php");
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>COMBOS DEPENDIENTES CON BASE DE DATOS. De Haberlo sabido antes - Ejemplo</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Este ejemplo muestra como funcionan dos selectores combinados. Segun el valor que selecciones en la primera lista, se completa la segunda lista con valores relacionados usando los campos traidos de una base de datos. A su vez, completa un campo texto con otro valor relacionado"/>
    <meta name="author" content="Federico Perichon" />
    <meta name="copyright" content="federicoperichon.com.ar" />

    <!-- Incluir la librería jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <!-- Cargar Bootstrap para los estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>

<body>

<div class='container-sm'>
    <h3 class='box-title'>Ejemplo de combos dependientes usando base de datos</h3>
    <form id='form1' name='form1' method='post' action=''>
        <div class='box-body'>
            <div class="mb-3">
                <label for="pais">Paises:</label>
                <select name="pais" id="pais" class="form-select" required>
                    <option value="">Seleccione...</option>
                    
                    <?php 
                        $sql="SELECT * FROM paises ORDER BY descripcion";
                        if (!$resultado = $conexion->query($sql)) {
                            echo "Error: La ejecución de la consulta falló: \n";
                            echo "Errno: " . $conexion->errno . "\n";
                            echo "Error: " . $conexion->error . "\n";
                            exit;
                        }

                        while($linea = $resultado->fetch_assoc())
                        {
                            echo"
                            <option value=$linea[id_pais]>$linea[descripcion]</option>";
                        }
                        $resultado->free();
                    ?>

                </select>
            </div>
            <div class="mb-3">
                <label for="ciudad">Ciudades:</label>
                <select name="ciudad" id="ciudad" class="form-select"></select>
            </div>
            <div class="mb-3">
            </div>

            <div class="mb-3">
                <label for='moneda'>Moneda:</label>
                <div id=moneda></div>
            </div>

        </div>

        <div class='mb-3'>
            <input type='submit' class='btn btn-success' value='Enviar'>
        </div>
    </form>
</div>

<!--
    Llamada al evento Change del selector Países
    Se dispara cada vez que seleccionamos un Pais de la lista
    Llama al archivo buscarciudades.php y le pasa el id del pais seleccionado
    Recibe la lista de ciudades y las muestra en el combo "ciudad"
    Recibe el nombre de la moneda y lo muestra en el id "moneda"
-->
<script language="javascript">
$(document).ready(function(){
    $("#pais").on('change', function () {
        $("#pais option:selected").each(function () {
            paiselegido=$(this).val();
            $.post("buscar_ciudades.php", { paiselegido: paiselegido }, function(data){
                $("#ciudad").html(data);
            });
            $.post("buscar_moneda.php", { paiselegido: paiselegido }, function(data){
                $("#moneda").html(data);
            });
        });
   });
});
</script>

</body>
</html>
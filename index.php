<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>COMBOS DEPENDIENTES CON BASE DE DATOS. De Haberlo sabido antes - Ejemplo</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Este ejemplo muestra como funcionan dos selectores combinados. Segun el valor que selecciones en la primera lista, se completa la segunda lista con valores relacionados"/>
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
                    <option value="1">Argentina</option>
                    <option value="2">España</option>
                    <option value="3">Mexico</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="ciudad">Ciudades:</label>
                <select name="ciudad" id="ciudad" class="form-select"></select>
            </div>
            <div class="mb-3">
                <label for="moneda">Moneda:</label>
                <input type="text" name="moneda" id="moneda" class="form-control">
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
-->
<script language="javascript">
$(document).ready(function(){
    $("#pais").on('change', function () {
        $("#pais option:selected").each(function () {
            paiselegido=$(this).val();
            $.post("buscarciudades.php", { paiselegido: paiselegido }, function(data){
                $("#ciudad").html(data);
            });
            $.post("buscarmoneda.php", { paiselegido: paiselegido }, function(data){
                $("#moneda").html(data);
            });
        });
   });
});
</script>

<?php

// AGREGAR UN MOVIMIENTO ---------------------------------------
        echo "
        <div class='row'>
        <div class='col-md-4'>
            <div class='box box-primary'>
                
                <!-- form start -->
                <form role='form' method='post' action=''>
                    <div class='box-body'>
                        <div class='form-group has-feedback'>
                            <label for='altaproyecto'>Proyecto</label>
                            <select name='altaproyecto' id='altaproyecto' class='mi-selector form-control'  required>
                                <option value=''>Buscar ...</option>";
                            $s="SELECT * FROM proyectos WHERE estado = 'A' ORDER BY nombre";
                                if (!$r = $conexion->query($s)) {
                                    echo "Error: La ejecución de la consulta falló debido a: \n";
                                    echo "Query: " . $s . "\n";
                                    echo "Errno: " . $conexion->errno . "\n";
                                    echo "Error: " . $conexion->error . "\n";
                                    exit;
                                }

                                while($l = $r->fetch_assoc())
                                {
                                    echo"
                                    <option value=$l[id_proyecto]>$l[nombre] - $l[descripcion]</option>";

                                }
                                $r->free();
                            echo"
                            </select>
                        </div>
                        <div class='form-group has-feedback'>
                            <label for='altaplano'>Plano</label>
                            <select name='altaplano' id='altaplano' class='form-control' required></select>
                        </div>

                        <div class='form-group has-feedback'>
                            <label for='altacliente'>Cliente:</label>
                            <div id=altacliente></div>
                        </div>


                        <div class='form-group has-feedback'>
                            <label for='cuadrilla'>Cuadrilla</label>
                            <select name='cuadrilla' id='cuadrilla' size='1' class='form-control' required>
                                <option value=''>Buscar ...</option>";
                            $s="SELECT * FROM cuadrillas WHERE estado = 'A' ORDER BY descripcion";
                                if (!$r = $conexion->query($s)) {
                                    echo "Error: La ejecución de la consulta falló debido a: \n";
                                    echo "Query: " . $s . "\n";
                                    echo "Errno: " . $conexion->errno . "\n";
                                    echo "Error: " . $conexion->error . "\n";
                                    exit;
                                }

                                while($l = $r->fetch_assoc())
                                {
                                    echo"
                                    <option value=$l[id_cuadrilla]>$l[descripcion]</option>";

                                }
                                $r->free();
                            echo"
                            </select>
                        </div>
                        <div class='form-group has-feedback'>
                            <label for='tipo'>Tipo Movto.</label>
                            <select name='tipo' id='tipo' size='1' class='form-control'>
                                <option value=''>Buscar...</option>";
                                $s = "SELECT * FROM tipo_movimiento ORDER BY descripcion";
                                if (!$r = $conexion->query($s)) {
                                    echo "Error: La ejecución de la consulta falló debido a: \n";
                                    echo "Query: " . $s . "\n";
                                    echo "Errno: " . $conexion->errno . "\n";
                                    echo "Error: " . $conexion->error . "\n";
                                    exit;
                                }
                                while($l = $r->fetch_assoc()) {
                                    echo"
                                    <option value=$l[id_tipmov]>$l[descripcion]</option>";
                                }
                                $r->free();
                            echo"
                            </select>
                        </div>

                        <div class='form-group'>
                            <label for='buscacodigo'>Buscar Codigo de Producto:</label>
                            <input type='text' class='form-control' id='buscacodigo' name='buscacodigo' required>
                        </div>

                        <div class='form-group'>
                            <label for='verproducto'>Descripción: </label>
                            <div id=verproducto></div>
                        </div>

                        <div class='form-group'>
                            <label>Fecha de Movimiento:</label>
                            <div class='input-group'>
                                <div class='input-group-addon'>
                                    <i class='fa fa-calendar'></i>
                                </div>
                                <input type='text' name='fecha' class='form-control' data-mask='00/00/0000' placeholder='__/__/____' value=$hoy required/>
                            </div>
                        </div>
                        <div class='form-group has-feedback'>
                            <label for='cantidad1'>Cantidad:</label>
                            <input type='number' class='form-control' id='cantidad' name='cantidad' required>
                            <span id='cantlInfo'></span>
                        </div>
                        <div class='form-group has-feedback'>
                            <label for='observaciones'>Observaciones</label>
                            <input type='text' class='form-control' id='observaciones' name='observaciones'>
                        </div>
                        <div class='box-footer'>
                            <button type='submit' name='Submit' class='btn btn-success'>Agregar</button>
                            <a title='Cancelar y Volver' href='$pag' class='btn btn-default '>Cancelar y Volver</a>
                        </div>
                    </form>
                </div>
            <div>
            <div>
        ";

?>

</body>

</html>
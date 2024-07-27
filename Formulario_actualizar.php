<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
         <form action="pagina_resultados_act.php" method="get">
            <label>Ingresar nombre del artículo a modificar</label>
            <input type="text" name="buscar">
            <input type="submit" name="enviando"><br><br>
        </form>
<?php

$conexion = mysqli_connect("localhost", "root", "", "pruebas");

if (mysqli_connect_errno()) {
    echo "Fallo en la conexion con la BBDD.";
    exit();
}
// Mostrar todos los registros de la tabla PRODUCTOS
$consulta_todos = "SELECT * FROM PRODUCTOS";
$resultados_todos = mysqli_query($conexion, $consulta_todos);

if ($resultados_todos == FALSE) {
    echo 'Error al realizar la consulta para mostrar todos los registros';
} else {
    echo '<h2>Todos los registros:</h2>';
    echo '<table border="1">';
    echo '<tr><th>Código Artículo</th><th>Sección</th><th>Nombre Artículo</th><th>Precio</th><th>Fecha</th><th>Importado</th><th>País de Origen</th></tr>';

    while ($fila = mysqli_fetch_assoc($resultados_todos)) {
        echo '<tr>';
        echo '<td>' . $fila['CÓDIGOARTÍCULO'] . '</td>';
        echo '<td>' . $fila['SECCIÓN'] . '</td>';
        echo '<td>' . $fila['NOMBREARTÍCULO'] . '</td>';
        echo '<td>' . $fila['PRECIO'] . '</td>';
        echo '<td>' . $fila['FECHA'] . '</td>';
        echo '<td>' . $fila['IMPORTADO'] . '</td>';
        echo '<td>' . $fila['PAÍSDEORIGEN'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
}
?>
    </body>
</html>

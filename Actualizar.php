<?php

$cod = $_GET['c_art'];
$sec = $_GET['seccion'];
$nom = $_GET['n_art'];
$pre = $_GET['precio'];
$fec = $_GET['fecha'];
$imp = $_GET['importado'];
$por = $_GET['p_orig'];


$conexion = mysqli_connect("localhost", "root", "", "pruebas");

if (mysqli_connect_errno()) {
    echo "Fallo en la conexion con la BBDD.";
    exit();
}

mysqli_select_db($conexion, "pruebas") or die ("No se encuentra la BBDD");

mysqli_set_charset($conexion, "utf8");

$consulta = "UPDATE PRODUCTOS SET CÓDIGOARTÍCULO='$cod', SECCIÓN='$sec', "
        . "NOMBREARTÍCULO='$nom', PRECIO='$pre', FECHA='$fec', IMPORTADO='$imp'"
        . ", PAÍSDEORIGEN='$por' WHERE CÓDIGOARTÍCULO='$cod'";

$resultados = mysqli_query($conexion, $consulta);

if ($resultados == FALSE) {
    echo 'Error en la consulta';
} else {
    echo '<b>Registro guardado</b><br><br>';

    echo "<table><tr><td>$cod</td></tr>"
    . "<tr><td>$sec</td></tr>"
    . "<tr><td>$nom</td></tr>"
    . "<tr><td>$pre</td></tr>"
    . "<tr><td>$fec</td></tr>"
    . "<tr><td>$imp</td></tr>"
    . "<tr><td>$por</td></tr></table>";
}
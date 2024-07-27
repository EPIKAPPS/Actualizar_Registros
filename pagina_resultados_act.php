<html>
    <head>
        <title>Resultados de Busqueda</title>
        <link type="text/css" href="css.css" rel="stylesheet">
    </head>
    <body>
        <?php
        
        $busqueda = $_GET["buscar"];


        $conexion = mysqli_connect('localhost', 'root', '', 'pruebas');

        if (mysqli_connect_errno()) {
            echo '<br><br>Fallo en la conexion con la BBDD <br><br>';
            exit();
        }

        mysqli_select_db($conexion, 'pruebas') or die("No se encuentra la BBDD");

        mysqli_set_charset($conexion, "utf8");

        $consulta = "SELECT * FROM PRODUCTOS WHERE NOMBREARTÍCULO = '$busqueda'";

        $resultados = mysqli_query($conexion, $consulta);

        while ($fila = mysqli_fetch_array($resultados, MYSQLI_ASSOC)) {

            //echo "<table><tr><td>";

            echo "<form action='Actualizar.php' method='get'>";

            echo "<input type='text' name='c_art' value='" . $fila['CÓDIGOARTÍCULO'] . "'><br>";
            echo "<input type='text' name='seccion' value='" . $fila['SECCIÓN'] . "'><br>";
            echo "<input type='text' name='n_art' value='" . $fila['NOMBREARTÍCULO'] . "'><br>";
            echo "<input type='text' name='precio' value='" . $fila['PRECIO'] . "'><br>";
            echo "<input type='text' name='fecha' value='" . $fila['FECHA'] . "'><br>";
            echo "<input type='text' name='importado' value='" . $fila['IMPORTADO'] . "'><br>";
            echo "<input type='text' name='p_orig' value='" . $fila['PAÍSDEORIGEN'] . "'><br>";
            
            echo "<input type='submit' name='enviando' value='Actualizar'>";
            echo "</form>";
            echo '<br><br>';
        }
        mysqli_close($conexion);
        ?>

    </body>
</html>
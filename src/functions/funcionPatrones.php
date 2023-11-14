<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conexion = new mysqli("localhost", "root", "", "club_nautico");

    if ($conexion->connect_errno) {
        die("Conexión fallida: " . $conexion->connect_error);
    } else {
        echo '<script>console.log("Conexión Exitosa");</script>';
    };

    $opcion = $_POST['opcion'];
    $codigoPatron = $_POST['codigo'];
    $nombrePatron = $_POST['nombre'];
    $tel = $_POST['tel'];
    $dir = $_POST['dir'];

    switch ($opcion) {
        case 'registrar':
            $sqlInsert = "INSERT INTO conductor_patron (`codigo`, `nombre`, `telefono`, `direccion`) VALUES ($codigoPatron, '$nombrePatron','$tel', '$dir')";

            if (!empty($codigoPatron) && !empty($nombrePatron) && !empty($dir)) {
                try {
                    if ($conexion->query($sqlInsert) == TRUE) {
                        echo '<p>Patron registrado satisfactoriamente</p>';
                        $conexion->close();
                    } else
                        echo 'ERROR';
                } catch (\Throwable $th) {
                    echo "<p class='advertencia'> ¡El código que intenta registrar ya se encuentra registrado!</p>";
                    
                }
            } else echo '<p class="advertencia">Llene los campos solicitados</p>';

            break;

        case 'buscar':
            $codigoPatron = (empty($codigoPatron)) ? 'null' :  $codigoPatron;
            $tel = (empty($tel)) ? 'null' :  $tel;
            $dir = (empty($dir)) ? 'null' :  $dir;
            $sqlQuery = "SELECT * FROM conductor_patron WHERE codigo = $codigoPatron or nombre = '$nombrePatron' or telefono = '$tel' or direccion = '$dir'";
            $res = $conexion->query($sqlQuery);

            if ($conexion->query($sqlQuery) == true) {
                echo '<table class="tabla-minimalista">';
                echo '<thead>';
                echo '    <tr>';
                echo '        <th>Código</th>';
                echo '        <th>Nombre</th>';
                echo '        <th>Teléfono</th>';
                echo '        <th>Dirección</th>';
                echo '    </tr>';
                echo '</thead>';
                echo '<tbody>';
                while ($fila = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td>" . $fila["codigo"] . "</td>";
                    echo "<td>" . $fila["nombre"] . "</td>";
                    echo "<td>" . $fila["telefono"] . "</td>";
                    echo "<td>" . $fila["direccion"] . "</td>";
                    echo "</tr>";
                }
                echo '</tbody>';
                echo '</table>';
            }
            $conexion->close();
            break;

        case 'actualizar':

            if (!empty($nombrePatron)) {
                $sqlUpdate = "UPDATE conductor_patron SET nombre = '$nombrePatron' where codigo = $codigoPatron";
                if ($conexion->query(@$sqlUpdate) == TRUE) {
                    echo '<p>Cambios realizados con exito</p>';
                    $conexion->close();
                } else echo 'Error al realizar cambios';
            } elseif (!empty($tel)) {
                $sqlUpdate = "UPDATE conductor_patron SET telefono = '$tel' where codigo = $codigoPatron";
                if ($conexion->query(@$sqlUpdate) == TRUE) {
                    echo '<p>Cambios realizados con exito</p>';
                    $conexion->close();
                } else echo 'Error al realizar cambios';
            } elseif (!empty($dir)) {
                $sqlUpdate = "UPDATE conductor_patron SET direccion = '$dir' where codigo = $codigoPatron";
                if ($conexion->query(@$sqlUpdate) == TRUE) {
                    echo '<p>Cambios realizados con exito</p>';
                    $conexion->close();
                } else echo 'Error al realizar cambios';
            } elseif (empty($nombrePatron) && empty($tel) && empty($dir)) {
                echo '<p class="advertencia">Ingrese los valores a modificar...</p>';
                $conexion->close();
            } else {
                $sqlUpdate = "UPDATE conductor_patron SET nombre = '$nombrePatron', telefono = '$tel', direccion = '$dir' where codigo = $codigoPatron";
                if ($conexion->query(@$sqlUpdate) == TRUE) {
                    echo '<p>Cambios realizados con exito</p>';
                    $conexion->close();
                } else echo 'Error al realizar cambios';
            }


            break;

        default:
            echo 'El valor ingresado no es correcto';
            break;
    }
}

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $numero = $_POST['numero'];
    $matricula = $_POST['matricula_barco'];
    $codigoPatron = $_POST['codigo'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $destino = $_POST['destino'];

    $conexion = new mysqli("localhost", "root", "", "club_nautico");

    if ($conexion->connect_errno) {
        die("Conexión fallida: " . $conexion->connect_error);
    } else {
        echo '<script>console.log("Conexión Exitosa");</script>';
    };

    $sql = "INSERT INTO viaje(numero, matribarco, codpatron, fecha, hora, destino) VALUES ($numero, $matricula, $codigoPatron, '$fecha', '$hora', '$destino')";

    if (!empty($numero) && !empty($matricula) && !empty($codigoPatron) && !empty($fecha) && !empty($hora) && !empty($destino)) {
        try {
            if ($conexion->query($sql) == TRUE) {
                echo '<p>Viaje rejistrado satisfactoriamente!</p>';
            }
        } catch (\Throwable $th) {
            //throw $th;
            echo "<p class='advertencia'> ¡El número de viaje que intenta registrar ya se encuentra registrado!</p>";
        }
    }else echo '<p class="advertencia">Llene los campos solicitados</p>';
}

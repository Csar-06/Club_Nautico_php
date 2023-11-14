<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $matricula = $_POST['matricula_barco'];


    $conexion = new mysqli("localhost", "root", "", "club_nautico");
    if ($conexion->connect_errno) {
        die("Conexión fallida: " . $conexion->connect_error);
    } else {
        echo '<script>console.log("Conexión Exitosa");</script>';
    };

    $sql = "SELECT * FROM viaje WHERE matribarco = $matricula";
    $res = $conexion->query($sql);

    
        echo '<table class="tabla-minimalista">';
        echo '<thead>';
        echo '    <tr>';
        echo '        <th>Número de viaje</th>';
        echo '        <th>Matrícula del barco</th>';
        echo '        <th>Código de Patron</th>';
        echo '        <th>Fecha</th>';
        echo '        <th>Hora</th>';
        echo '        <th>Destino</th>';
        echo '    </tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($fila = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $fila["numero"] . "</td>";
            echo "<td>" . $fila["matribarco"] . "</td>";
            echo "<td>" . $fila["codpatron"] . "</td>";
            echo "<td>" . $fila["fecha"] . "</td>";
            echo "<td>" . $fila["hora"] . "</td>";
            echo "<td>" . $fila["destino"] . "</td>";
            echo "</tr>";
        }
        echo '</tbody>';
        echo '</table>';
    
}

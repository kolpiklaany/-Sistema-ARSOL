<?php
// Conexión a la base de datos (ajusta estos valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$database = "inndaka2";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Consulta para obtener los registros de la tabla
$sql = "SELECT * FROM registro_actividades";
$result = $conn->query($sql);

// Mostrar los resultados en la tabla
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['descripcion_actividad'] . '</td>';
        echo '<td>' . $row['inicio_trabajo'] . '</td>';
        echo '<td>' . $row['fin_trabajo'] . '</td>';
        echo '<td>';
        // Tu código HTML para mostrar la imagen (ajusta según tus necesidades)
        echo '<img src="' . $row['/uploads/'] . '" alt="Foto">';
        echo '</td>';
        echo '<td>' . $row['horas_efectivas'] . '</td>';
        echo '<td>' . $row['observaciones'] . '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="7">No hay registros en la tabla.</td></tr>';
}

// Cerrar la conexión
$conn->close();
?>

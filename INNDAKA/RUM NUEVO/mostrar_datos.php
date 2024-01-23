<?php
// Establecer la conexión a la base de datos (reemplaza los valores con los tuyos)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inndaka2";

try {
    // Conectar a la base de datos
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configurar el manejo de errores
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL para obtener los datos de la tabla formulariodatos
    $sql = "SELECT * FROM formulariodatos";
    $stmt = $conn->query($sql);

    // Mostrar los datos en la tabla
    echo '<table>';
    echo '<thead> <tr> <!-- Encabezados de las columnas --> </tr> </thead>';
    echo '<tbody>';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        echo '<td>' . $row['nombre_operador'] . '</td>';
        echo '<td>' . $row['rum_economico'] . '</td>';
        // Continúa mostrando otros campos de tu tabla
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} catch(PDOException $e) {
    echo "Error al obtener datos: " . $e->getMessage();
}

// Cerrar la conexión
$conn = null;
?>

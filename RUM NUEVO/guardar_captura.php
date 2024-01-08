<?php
// Definir las credenciales de conexión
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inndaka2";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imagenBlob = file_get_contents($_FILES['imagen']['tmp_name']);
    $fecha_hora = $_POST['fecha_hora'];
    $ubicacion = $_POST['ubicacion'];

    echo "Datos recibidos en el servidor: <br>";
    echo "Imagen: " . $imagenBlob . "<br>";
    echo "Fecha y hora: " . $fecha_hora . "<br>";
    echo "Ubicación: " . $ubicacion . "<br>";

    $sql = "INSERT INTO capturas (imagen, fecha_hora, ubicacion) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $null = NULL; // NULL para el parámetro de la imagen

    $stmt->bind_param("bss", $null, $fecha_hora, $ubicacion);
    $stmt->send_long_data(0, $imagenBlob);

    if ($stmt->execute()) {
        echo "Captura guardada exitosamente. <br>";
        $conn->commit(); // Hacer commit de la transacción
    } else {
        echo "Error al guardar la captura: " . $conn->error . "<br>";
    }

    $stmt->close();
}

$conn->close();
?>

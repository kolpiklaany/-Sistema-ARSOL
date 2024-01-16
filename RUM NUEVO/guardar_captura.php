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
    $imagenBase64 = $_POST['imagen'];
    $fecha_hora = date('Y-m-d_H-i-s'); // Obtener la fecha y hora actual para el nombre del archivo y la base de datos
    $ubicacion = "imagen"; // Cambia por la ubicación real

    // Guardar la imagen en una carpeta local
    $rutaCarpetaLocal = "C:/xampp/htdocs/INNDAKA/RUM NUEVO/capturas/";

    // Asegúrate de que la carpeta exista, si no, créala
    if (!file_exists($rutaCarpetaLocal)) {
        mkdir($rutaCarpetaLocal, 0777, true);
    }

    $nombreArchivo = $fecha_hora . ".png";
    $rutaCompletaLocal = $rutaCarpetaLocal . $nombreArchivo;

    if (file_put_contents($rutaCompletaLocal, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imagenBase64)))) {
        // Insertar la imagen en la base de datos
        $sql = "INSERT INTO capturas (imagen, fecha_hora, ubicacion) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Verificar si la preparación de la consulta fue exitosa
        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $conn->error . "<br>");
        }

        $stmt->bind_param("sss", $nombreArchivo, $fecha_hora, $ubicacion);

        if ($stmt->execute()) {
            echo "Captura guardada exitosamente en la carpeta local y en la base de datos. <br>";
            $conn->commit(); // Hacer commit de la transacción
        } else {
            echo "Error al ejecutar la consulta: " . $stmt->error . "<br>";
        }

        $stmt->close();
    } else {
        echo "Error al guardar la captura en la carpeta local. <br>";
    }
} else {
    echo "Error: Método de solicitud no válido. <br>";
}

$conn->close();
?>

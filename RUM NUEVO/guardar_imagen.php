<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imagen"])) {
    $nombre = $_FILES["imagen"]["name"];
    $tipo = $_FILES["imagen"]["type"];
    $datosImagen = file_get_contents($_FILES["imagen"]["tmp_name"]);

    $servername = "localhost"; // Cambia esto por tu servidor MySQL
    $username = "root";
    $password = "";
    $dbname = "inndaka2"; // Cambia esto por el nombre de tu base de datos

    // Crea la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Prepara la consulta para insertar la imagen en la base de datos
    $stmt = $conn->prepare("INSERT INTO imagenes (nombre, tipo, datos) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $tipo, $datosImagen);

    // Ejecuta la consulta
    if ($stmt->execute()) {
        echo "La imagen se ha guardado correctamente en la base de datos.";
    } else {
        echo "Error al guardar la imagen: " . $conn->error;
    }

    // Cierra la conexión
    $stmt->close();
    $conn->close();
}
?>

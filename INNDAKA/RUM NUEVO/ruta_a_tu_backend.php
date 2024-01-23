<?php
// Verifica si se está recibiendo una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtiene los datos de la firma en formato JSON y decodifica
    $data = json_decode(file_get_contents('php://input'), true);

    // Verifica si se recibieron datos válidos
    if (isset($data['firmaBase64'])) {
        $firmaBase64 = $data['firmaBase64'];

        // Establece los detalles de la conexión a la base de datos (ajústalos según tu configuración)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "inndaka2";

        // Crea una conexión con la base de datos (puede manejar errores de conexión)
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Escapa la firma para evitar inyección de SQL (recomendado)
        $firmaEscapada = $conn->real_escape_string($firmaBase64);

        // Prepara la consulta para insertar la firma en la base de datos
        $sql = "INSERT INTO formulariodatos (firma_base64) VALUES ('$firmaEscapada')";

        // Ejecuta la consulta y verifica si se realizó correctamente
        if ($conn->query($sql) === TRUE) {
            echo "Firma guardada correctamente en la base de datos";
        } else {
            echo "Error al guardar la firma en la base de datos: " . $conn->error;
        }

        // Cierra la conexión a la base de datos
        $conn->close();
    } else {
        echo "No se recibió la firma correctamente";
    }
} else {
    echo "Acceso denegado";
}
?>

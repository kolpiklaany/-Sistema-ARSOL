<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén la firma en formato base64 desde el cuerpo de la solicitud
    $data = json_decode(file_get_contents('php://input'), true);
    $firmaBase64 = $data['firmaBase64'];

    // Decodifica la firma base64 y guarda en una carpeta en el servidor
    $firmaBinaria = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $firmaBase64));

    // Asegúrate de que la carpeta donde deseas guardar la firma exista y tenga permisos de escritura
    $carpetaDestino = 'firmas/';
    if (!is_dir($carpetaDestino)) {
        mkdir($carpetaDestino, 0777, true);
    }

    // Genera un nombre de archivo único para la firma
    $nombreArchivo = uniqid('firma_') . '.png';

    // Guarda la firma en la carpeta
    $rutaCompleta = $carpetaDestino . $nombreArchivo;

    // Asegúrate de que la escritura en el archivo sea exitosa
    if (file_put_contents($rutaCompleta, $firmaBinaria) !== false) {
        // Opcional: Guarda la ruta de la firma en la base de datos
        if (guardarRutaFirmaEnBD($rutaCompleta)) {
            echo json_encode(['success' => true, 'rutaFirma' => $rutaCompleta]);
        } else {
            echo json_encode(['error' => 'Error al guardar en la base de datos']);
        }
    } else {
        echo json_encode(['error' => 'Error al guardar la firma en el servidor']);
    }
} else {
    echo json_encode(['error' => 'Método de solicitud no válido']);
}

// Función para guardar la ruta de la firma en la base de datos
function guardarRutaFirmaEnBD($rutaFirma)
{
    // Conecta a tu base de datos (reemplaza con tus credenciales)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "inndaka2";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión
    if ($conn->connect_error) {
        return false;
    }

    // Inserta la ruta de la firma en la base de datos
    $sql = "INSERT INTO firmas (rutaFirma) VALUES ('$rutaFirma')";
    
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        return true;
    } else {
        $conn->close();
        return false;
    }
}
?>

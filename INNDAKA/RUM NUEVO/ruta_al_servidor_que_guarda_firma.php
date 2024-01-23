<?php
// Verificar si se ha enviado la firma
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['firma'])) {
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

        // Obtener la firma desde la solicitud POST
        $firma = $_POST['firma_operador'];

        // Insertar la firma en la base de datos
        $stmt = $conn->prepare("INSERT INTO formulariodatos (firma) 
        VALUES (:firma_operador)");
        $stmt->bindParam(':firma', $firma);
        $stmt->execute();

        // Obtener el ID del último registro insertado
        $last_id = $conn->lastInsertId();

        // Cerrar la conexión
        $conn = null;

        // Enviar una respuesta JSON con el ID del último registro
        header('Content-Type: application/json');
        echo json_encode(array('last_id' => $last_id));
        exit();
    } catch(PDOException $e) {
        // Manejar errores
        header('Content-Type: application/json');
        echo json_encode(array('error' => 'Error al guardar la firma: ' . $e->getMessage()));
        exit();
    }
} else {
    // Si la solicitud no es correcta, enviar una respuesta JSON con un mensaje de error
    header('Content-Type: application/json');
    echo json_encode(array('error' => 'Solicitud incorrecta'));
    exit();
}
?>

<?php
header('Content-Type: application/json'); // Configura el tipo de contenido como JSON

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conecta a tu base de datos (reemplaza con tus credenciales)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "inndaka2";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión
    if ($conn->connect_error) {
        echo json_encode(array("error" => "Connection failed: " . $conn->connect_error));
        exit();
    }

    // Obtiene las firmas del formulario
    $firmaOperador = $_POST["firmaOperador"];
    $firmaLider = $_POST["firmaLider"];
    $firmaCliente = $_POST["firmaCliente"];

    // Inserta las firmas en la base de datos
    $sql = "INSERT INTO firmas (firmaOperador, firmaLider, firmaCliente) VALUES ('$firmaOperador', '$firmaLider', '$firmaCliente')";

    if ($conn->query($sql) === TRUE) {
        $lastInsertedId = $conn->insert_id;
        echo json_encode(array("last_id" => $lastInsertedId));
    } else {
        echo json_encode(array("error" => "Error al guardar las firmas: " . $conn->error));
    }

    $conn->close();
} else {
    echo json_encode(array("error" => "Método de solicitud no válido"));
}
?>

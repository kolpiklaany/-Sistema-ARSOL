<?php
// Obtener datos del formulario
$user_id = $_POST["user_id"];
$descripcion_actividad = $_POST["descripcion_actividad"];
$inicio_trabajo = $_POST["inicio_trabajo"];
$fin_trabajo = $_POST["fin_trabajo"];
$horas_efectivas = $_POST["horas_efectivas"];
$observaciones = $_POST["observaciones"];

// Conectar a la base de datos (reemplaza con tus credenciales)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inndaka2";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Procesar el archivo de combustible si se ha subido
if ($_FILES["combustible"]["error"] == 0) {
    // Obtener datos del archivo
    $nombreArchivo = $_FILES["combustible"]["name"];
    $tipoArchivo = $_FILES["combustible"]["type"];
    $tamanioArchivo = $_FILES["combustible"]["size"];
    $tempArchivo = $_FILES["combustible"]["tmp_name"];

    // Leer el contenido del archivo
    $contenidoArchivo = file_get_contents($tempArchivo);

    // Insertar los datos en la base de datos
    $stmt = $conn->prepare("INSERT INTO registro_actividades (user_id, descripcion_actividad, inicio_trabajo, fin_trabajo, horas_efectivas, observaciones, nombre_archivo, tipo_archivo, contenido_archivo) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssssbbs", $user_id, $descripcion_actividad, $inicio_trabajo, $fin_trabajo, $horas_efectivas, $observaciones, $nombreArchivo, $tipoArchivo, $contenidoArchivo);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Información guardada exitosamente"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error al guardar la información en la base de datos"]);
    }

    $stmt->close();
} else {
    echo json_encode(["success" => false, "message" => "Error al procesar el archivo de combustible"]);
}

$conn->close();
?>

<?php
// Realiza la conexión a la base de datos (ajusta con tus propios datos)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inndaka2";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recoge los datos del formulario
$actividad = $_POST['descripcion_actividad'];
$inicio_trabajo = $_POST['inicio_trabajo'];
$fin_trabajo = $_POST['fin_trabajo'];
$combustible = $_POST['combustible'];
$horas_efectivas = $_POST['horas_efectivas'];
$observaciones = $_POST['observaciones'];

// Inserta los datos en la base de datos
$sql = "INSERT INTO registro_actividades (descripcion_actividad, inicio_trabajo, fin_trabajo, combustible, horas_efectivas, observaciones) 
        VALUES ('$actividad', '$inicio_trabajo', '$fin_trabajo', '$combustible', '$horas_efectivas', '$observaciones')";

if ($conn->query($sql) === TRUE) {
    // Envía una respuesta JSON al cliente indicando éxito
    echo json_encode(['success' => true]);
} else {
    // Envía una respuesta JSON al cliente indicando error
    echo json_encode(['success' => false, 'error' => $conn->error]);
}

// Cierra la conexión a la base de datos
$conn->close();
?>


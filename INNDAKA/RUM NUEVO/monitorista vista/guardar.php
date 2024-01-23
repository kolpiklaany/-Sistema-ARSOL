<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        // Recoger los datos del formulario
        $nombre_operador = $_POST['nombre-operador'];
        $no_empleado = $_POST['rum-no-empleado'];
        $fecha = $_POST['rum-fecha'];
        $economico = $_POST['rum_economico'];
        $tipo = $_POST['rum-tipo'];
        $modelo = $_POST['rum-modelo'];
        $llegada_operador = $_POST['rum-llegada-operador'];
        $salida_operador = $_POST['rum-salida-operador'];
        $encendido_maquina = $_POST['rum-encendido-maquina'];
        $apagado_maquina = $_POST['rum-apagado-maquina'];
        $rum_tramo = $_POST['rum_tramo'];
        $subtramo = $_POST['rum_subtramo'];
        $margen = $_POST['rum_apagado_margen'];
        $causa = $_POST['rum_causa'];
        $porcentaje = $_POST['valor_porcentaje'];

        


        $directorio_destino = "carpeta_destino/"; // Cambia esto por la ruta de la carpeta en tu servidor donde guardarás las imágenes
        $nombre_imagen = $_FILES['imagen']['name'];
        $tipo_imagen = $_FILES['imagen']['type'];
        $tamano_imagen = $_FILES['imagen']['size'];
        $temp_imagen = $_FILES['imagen']['tmp_name'];
        // Recoge los demás campos del formulario de manera similar

         // Mueve la imagen a la carpeta de destino
    move_uploaded_file($temp_imagen, $directorio_destino . $nombre_imagen);


        // Luego, utiliza estos valores en la consulta SQL para la inserción de datos
        $sql = "INSERT INTO formulariodatos (nombre_operador, no_empleado, fecha, rum_economico, tipo, modelo, llegada_operador, salida_operador, encendido_maquina, apagado_maquina, rum_tramo, rum_subtramo, margen, valor_porcentaje, causa) 
        VALUES (:nombre_operador, :no_empleado, :fecha, :economico, :tipo, :modelo, :llegada_operador, :salida_operador, :encendido_maquina, :apagado_maquina, :rum_tramo, :subtramo, :rum_apagado_margen, :porcentaje, :rum_causa)";
        $stmt = $conn->prepare($sql);

        // Bind de los parámetros
        $stmt->bindParam(':nombre_operador', $nombre_operador);
        $stmt->bindParam(':no_empleado', $no_empleado);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':economico', $economico);
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':llegada_operador', $llegada_operador);
        $stmt->bindParam(':salida_operador', $salida_operador);
        $stmt->bindParam(':encendido_maquina', $encendido_maquina);
        $stmt->bindParam(':apagado_maquina', $apagado_maquina);

        $stmt->bindParam(':rum_tramo', $rum_tramo);
        $stmt->bindParam(':subtramo', $subtramo);
        $stmt->bindParam(':rum_apagado_margen', $margen);
        $stmt->bindParam(':porcentaje', $porcentaje);
        $stmt->bindParam(':rum_causa', $causa);

       

        // Haz el bind para los demás campos del formulario

        // Ejecutar la consulta
        $stmt->execute();

        // Redirigir a index.php después de guardar los datos
        header("Location: index.php");
        exit(); // Asegura que no se ejecuten más instrucciones después de la redirección
    } catch(PDOException $e) {
        echo "Error al guardar los datos: " . $e->getMessage();
    }

    // Cerrar la conexión
    $conn = null;
}
?>


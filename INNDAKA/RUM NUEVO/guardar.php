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
        $porcentaje = isset($_POST['valor_porcentaje']) ? $_POST['valor_porcentaje'] : null;

        // Campos adicionales
        $rum_actividad = isset($_POST['rum_actividad']) ? $_POST['rum_actividad'] : null;
        $rum_descripcion = isset($_POST['rum_descripcion']) ? $_POST['rum_descripcion'] : null;
        $rum_hora_inicio = isset($_POST['rum_hora_inicio']) ? $_POST['rum_hora_inicio'] : null;
        $rum_hora_termino = isset($_POST['rum_hora_termino']) ? $_POST['rum_hora_termino'] : null;
        $rum_horas_efectivas = isset($_POST['rum_horas_efectivas']) ? $_POST['rum_horas_efectivas'] : null;
        $rum_observaciones = isset($_POST['rum_observaciones']) ? $_POST['rum_observaciones'] : null;
        $rum_combustible = isset($_POST['rum_combustible']) ? $_POST['rum_combustible'] : null;

            // Campos adicionales
// Campos adicionales del segundo conjunto
$rum_actividad_1 = isset($_POST['rum_actividad_1']) ? $_POST['rum_actividad_1'] : null;
$rum_descripcion_1 = isset($_POST['rum_descripcion_1']) ? $_POST['rum_descripcion_1'] : null; 
$rum_hora_inicio_1 = isset($_POST['rum_hora_inicio_1']) ? $_POST['rum_hora_inicio_1'] : null;
$rum_hora_termino_1 = isset($_POST['rum_hora_termino_1']) ? $_POST['rum_hora_termino_1'] : null;
$rum_horas_efectivas_1 = isset($_POST['rum_horas_efectivas_1']) ? $_POST['rum_horas_efectivas_1'] : null;
$rum_observaciones_1 = isset($_POST['rum_observaciones_1']) ? $_POST['rum_observaciones_1'] : null;  
$rum_combustible_1 = isset($_FILES['rum_combustible_1']['name']) ? $_FILES['rum_combustible_1']['name'] : null;


            // Campos adicionales
// Campos adicionales del segundo conjunto
$rum_actividad_2 = isset($_POST['rum_actividad_2']) ? $_POST['rum_actividad_2'] : null;
$rum_descripcion_2 = isset($_POST['rum_descripcion_2']) ? $_POST['rum_descripcion_2'] : null; 
$rum_hora_inicio_2 = isset($_POST['rum_hora_inicio_2']) ? $_POST['rum_hora_inicio_2'] : null;
$rum_hora_termino_2 = isset($_POST['rum_hora_termino_2']) ? $_POST['rum_hora_termino_2'] : null;
$rum_horas_efectivas_2 = isset($_POST['rum_horas_efectivas_2']) ? $_POST['rum_horas_efectivas_2'] : null;
$rum_observaciones_2 = isset($_POST['rum_observaciones_2']) ? $_POST['rum_observaciones_2'] : null;  
$rum_combustible_2 = isset($_FILES['rum_combustible_2']['name']) ? $_FILES['rum_combustible_2']['name'] : null;

        // Configurar el directorio de destino para las imágenes (cambia esto por la ruta de tu carpeta)
/*         $directorio_destino = "carpeta_destino/";

        // Procesar la imagen
        $nombre_imagen = isset($_FILES['imagen']['name']) ? $_FILES['imagen']['name'] : null;
        $tipo_imagen = isset($_FILES['imagen']['type']) ? $_FILES['imagen']['type'] : null;
        $tamano_imagen = isset($_FILES['imagen']['size']) ? $_FILES['imagen']['size'] : null;
        $temp_imagen = isset($_FILES['imagen']['tmp_name']) ? $_FILES['imagen']['tmp_name'] : null;

        // Mover la imagen al directorio de destino
        move_uploaded_file($temp_imagen, $directorio_destino . $nombre_imagen); */

        // Insertar los datos en la base de datos
        $sql = "INSERT INTO formulariodatos (
            nombre_operador, no_empleado, fecha, rum_economico, tipo, modelo, llegada_operador, salida_operador, 
            encendido_maquina, apagado_maquina, rum_tramo, rum_subtramo, margen, valor_porcentaje, causa, 
            rum_actividad, rum_descripcion, rum_hora_inicio, rum_hora_termino, rum_horas_efectivas, rum_observaciones, rum_combustible,
            rum_actividad_1, rum_descripcion_1, rum_hora_inicio_1, rum_hora_termino_1, rum_horas_efectivas_1, rum_observaciones_1, rum_combustible_1,
            rum_actividad_2, rum_descripcion_2, rum_hora_inicio_2, rum_hora_termino_2, rum_horas_efectivas_2, rum_observaciones_2, rum_combustible_2
        ) 
        VALUES (
            :nombre_operador, :no_empleado, :fecha, :economico, :tipo, :modelo, :llegada_operador, :salida_operador, 
            :encendido_maquina, :apagado_maquina, :rum_tramo, :subtramo, :rum_apagado_margen, :porcentaje, :causa, 
            :rum_actividad, :rum_descripcion, :rum_hora_inicio, :rum_hora_termino, :rum_horas_efectivas, :rum_observaciones, :rum_combustible,
            :rum_actividad_1, :rum_descripcion_1, :rum_hora_inicio_1, :rum_hora_termino_1, :rum_horas_efectivas_1, :rum_observaciones_1, :rum_combustible_1,
            :rum_actividad_2, :rum_descripcion_2, :rum_hora_inicio_2, :rum_hora_termino_2, :rum_horas_efectivas_2, :rum_observaciones_2, :rum_combustible_2
        )";
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
        $stmt->bindParam(':causa', $causa);


        // Campos adicionales
        $stmt->bindParam(':rum_actividad', $rum_actividad);
        $stmt->bindParam(':rum_descripcion', $rum_descripcion);
        $stmt->bindParam(':rum_hora_inicio', $rum_hora_inicio);
        $stmt->bindParam(':rum_hora_termino', $rum_hora_termino);
        $stmt->bindParam(':rum_horas_efectivas', $rum_horas_efectivas);
        $stmt->bindParam(':rum_observaciones', $rum_observaciones);
        $stmt->bindParam(':rum_combustible', $rum_combustible);

        // Campos adicionales del segundo conjunto
$stmt->bindParam(':rum_actividad_1', $rum_actividad_1);
$stmt->bindParam(':rum_descripcion_1', $rum_descripcion_1);
$stmt->bindParam(':rum_hora_inicio_1', $rum_hora_inicio_1);
$stmt->bindParam(':rum_hora_termino_1', $rum_hora_termino_1);
$stmt->bindParam(':rum_horas_efectivas_1', $rum_horas_efectivas_1);
$stmt->bindParam(':rum_observaciones_1', $rum_observaciones_1);
$stmt->bindParam(':rum_combustible_1', $rum_combustible_1);

        // Campos adicionales del segundo conjunto
        $stmt->bindParam(':rum_actividad_2', $rum_actividad_2);
        $stmt->bindParam(':rum_descripcion_2', $rum_descripcion_2);
        $stmt->bindParam(':rum_hora_inicio_2', $rum_hora_inicio_2);
        $stmt->bindParam(':rum_hora_termino_2', $rum_hora_termino_2);
        $stmt->bindParam(':rum_horas_efectivas_2', $rum_horas_efectivas_2);
        $stmt->bindParam(':rum_observaciones_2', $rum_observaciones_2);
        $stmt->bindParam(':rum_combustible_2', $rum_combustible_2);

        // Ejecutar la consulta
        $stmt->execute();

        // Redirigir a index.php después de guardar los datos
        header("Location: index.html");
        exit(); // Asegura que no se ejecuten más instrucciones después de la redirección
    } catch (PDOException $e) {
        echo "Error al guardar los datos: " . $e->getMessage();
    }

    // Cerrar la conexión
    $conn = null;
}
?>

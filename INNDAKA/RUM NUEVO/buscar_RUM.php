<?php
// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'inndaka2');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener término de búsqueda
$buscar = $_POST['buscador'] ?? '';

// Evitar posibles problemas de inyección SQL
$buscar = $conexion->real_escape_string($buscar);

// Buscar información en las tablas
$sql = "SELECT * FROM formulariodatos 
        WHERE nombre_operador LIKE '%$buscar%' OR no_empleado LIKE '%$buscar%' OR fecha LIKE '%$buscar%' 
        OR rum_economico LIKE '%$buscar%' OR tipo LIKE '%$buscar%' OR modelo LIKE '%$buscar%' 
        OR llegada_operador LIKE '%$buscar%' OR salida_operador LIKE '%$buscar%' OR encendido_maquina LIKE '%$buscar%' 
        OR apagado_maquina LIKE '%$buscar%' OR rum_tramo LIKE '%$buscar%' OR rum_subtramo LIKE '%$buscar%' 
        OR margen LIKE '%$buscar%' OR valor_porcentaje LIKE '%$buscar%' OR causa LIKE '%$buscar%'
        OR rum_actividad LIKE '%$buscar%' OR rum_descripcion LIKE '%$buscar%' 
        OR rum_hora_inicio LIKE '%$buscar%' OR rum_hora_termino LIKE '%$buscar%' 
        OR rum_horas_efectivas LIKE '%$buscar%' OR rum_observaciones LIKE '%$buscar%' 
        OR rum_combustible LIKE '%$buscar%'
        OR rum_actividad_1 LIKE '%$buscar%' OR rum_descripcion_1 LIKE '%$buscar%' 
        OR rum_hora_inicio_1 LIKE '%$buscar%' OR rum_hora_termino_1 LIKE '%$buscar%' 
        OR rum_horas_efectivas_1 LIKE '%$buscar%' OR rum_observaciones_1 LIKE '%$buscar%' 
        OR rum_combustible_1 LIKE '%$buscar%'
        OR rum_actividad_2 LIKE '%$buscar%' OR rum_descripcion_2 LIKE '%$buscar%' 
        OR rum_hora_inicio_2 LIKE '%$buscar%' OR rum_hora_termino_2 LIKE '%$buscar%' 
        OR rum_horas_efectivas_2 LIKE '%$buscar%' OR rum_observaciones_2 LIKE '%$buscar%' 
        OR rum_combustible_2 LIKE '%$buscar%'
        ORDER BY id DESC LIMIT 1";

$resultado = $conexion->query($sql);

if ($resultado) {
    $datos = array();
    while ($fila = $resultado->fetch_assoc()) {
        $datos[] = array(
            'nombre_operador' => $fila['nombre_operador'],
            'no_empleado' => $fila['no_empleado'],
            'fecha' => $fila['fecha'],
            'rum_economico' => $fila['rum_economico'],
            'tipo' => $fila['tipo'],
            'modelo' => $fila['modelo'],
            'llegada_operador' => determinarAMPM($fila['llegada_operador']),
            'salida_operador' => determinarAMPM($fila['salida_operador']),
            'encendido_maquina' => determinarAMPM($fila['encendido_maquina']),
            'apagado_maquina' => determinarAMPM($fila['apagado_maquina']),
            'rum_tramo' => $fila['rum_tramo'],
            'rum_subtramo' => $fila['rum_subtramo'],
            'margen' => $fila['margen'],
            'valor_porcentaje' => $fila['valor_porcentaje'],
            'causa' => $fila['causa'],
            
            'rum_actividad' => $fila['rum_actividad'],
            'rum_descripcion' => $fila['rum_descripcion'],
            'rum_hora_inicio' => $fila['rum_hora_inicio'],
            'rum_hora_termino' => $fila['rum_hora_termino'],
            'rum_horas_efectivas' => $fila['rum_horas_efectivas'],
            'rum_observaciones' => $fila['rum_observaciones'],

      /*       SEGUNDO */
            'rum_actividad_1' => $fila['rum_actividad_1'],
            'rum_descripcion_1' => $fila['rum_descripcion_1'],
            'rum_hora_inicio_1' => $fila['rum_hora_inicio_1'],
            'rum_hora_termino_1' => $fila['rum_hora_termino_1'],
            'rum_horas_efectivas_1' => $fila['rum_horas_efectivas_1'],
            'rum_observaciones_1' => $fila['rum_observaciones_1'],

              /*       TERCERO */
              'rum_actividad_2' => $fila['rum_actividad_2'],
              'rum_descripcion_2' => $fila['rum_descripcion_2'],
              'rum_hora_inicio_2' => $fila['rum_hora_inicio_2'],
              'rum_hora_termino_2' => $fila['rum_hora_termino_2'],
              'rum_horas_efectivas_2' => $fila['rum_horas_efectivas_2'],
              'rum_observaciones_2' => $fila['rum_observaciones_2'],
        );
    }
    echo json_encode($datos);
} else {
    echo json_encode(array());
}

$conexion->close();

function determinarAMPM($hora) {
    // Verificar si $hora es NULL o está vacío
    if ($hora === null || $hora === '') {
        // Manejar el caso cuando $hora es NULL o está vacío
        // Puedes asignar un valor predeterminado o manejarlo según tus necesidades
        // Por ejemplo:
        return 'N/A'; // O cualquier valor predeterminado que desees
    }

    // Convertir a formato AM/PM
    $hora_datetime = DateTime::createFromFormat('H:i:s', $hora);
    return $hora_datetime->format('h:i A');
}
?>

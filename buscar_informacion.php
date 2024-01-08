<?php
// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'inndaka2');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener término de búsqueda
$buscar = $_POST['buscar'] ?? '';

// Evitar posibles problemas de inyección SQL
$buscar = $conexion->real_escape_string($buscar);

// Buscar información en las tablas
$sql = "SELECT * FROM datos_personales 
        WHERE (titulo LIKE '%$buscar%' OR profesion LIKE '%$buscar%' OR nombres LIKE '%$buscar%' 
        OR apellido_paterno LIKE '%$buscar%' OR apellido_materno LIKE '%$buscar%' OR curp LIKE '%$buscar%' 
        OR rfc LIKE '%$buscar%' OR nss LIKE '%$buscar%' OR telefono LIKE '%$buscar%' OR correo LIKE '%$buscar%' 
        OR hijos LIKE '%$buscar%' OR no_cuenta LIKE '%$buscar%' OR estado_civil LIKE '%$buscar%' 
        OR licencia_conducir LIKE '%$buscar%' OR certificado_medico LIKE '%$buscar%' OR sexo LIKE '%$buscar%' 
        OR tipo_sangre LIKE '%$buscar%' OR cp LIKE '%$buscar%' OR calle_numero LIKE '%$buscar%' 
        OR colonia LIKE '%$buscar%' OR ciudad LIKE '%$buscar%' OR estado LIKE '%$buscar%' 
        OR fecha_firma_inicial LIKE '%$buscar%' OR puesto LIKE '%$buscar%' OR empresa LIKE '%$buscar%' 
        OR telefono_empresarial LIKE '%$buscar%' OR correo_empresarial LIKE '%$buscar%' 
        OR salario_mensual LIKE '%$buscar%' OR base LIKE '%$buscar%' OR ubicacion LIKE '%$buscar%' 
        OR fecha_firma_final LIKE '%$buscar%' OR motivo_baja LIKE '%$buscar%' OR archivo LIKE '%$buscar%' OR no_infonavit LIKE '%$buscar%' OR nota LIKE '%$buscar%') 
        AND (estado_registro = 'activo' OR estado_registro = 'inactivo')";

$resultado = $conexion->query($sql);  

if ($resultado) {
    $datos = array();
    while ($fila = $resultado->fetch_assoc()) {
        $datos[] = array(
            'titulo' => $fila['titulo'],
            'profesion' => $fila['profesion'],
            'nombres' => $fila['nombres'],
            'apellido_paterno' => $fila['apellido_paterno'],
            'apellido_materno' => $fila['apellido_materno'],
            'fecha_nacimiento' => $fila['fecha_nacimiento'],
            'curp' => $fila['curp'],
            'rfc' => $fila['rfc'],
            'nss' => $fila['nss'],
            'telefono' => $fila['telefono'],
            'correo' => $fila['correo'],
            'hijos' => $fila['hijos'],
            'no_cuenta' => $fila['no_cuenta'],
            'estado_civil' => $fila['estado_civil'],
            'licencia_conducir' => $fila['licencia_conducir'],
            'certificado_medico' => $fila['certificado_medico'],
            'sexo' => $fila['sexo'],
            'tipo_sangre' => $fila['tipo_sangre'],
            'cp' => $fila['cp'],
            'calle_numero' => $fila['calle_numero'],
            'colonia' => $fila['colonia'],
            'ciudad' => $fila['ciudad'],
            'estado' => $fila['estado'],
            'fecha_firma_inicial' => $fila['fecha_firma_inicial'],
            'puesto' => $fila['puesto'],
            'empresa' => $fila['empresa'],
            'telefono_empresarial' => $fila['telefono_empresarial'],
            'correo_empresarial' => $fila['correo_empresarial'],
            'salario_mensual' => $fila['salario_mensual'],
            'base' => $fila['base'],
            'ubicacion' => $fila['ubicacion'],
            'fecha_firma_final' => $fila['fecha_firma_final'],
            'motivo_baja' => $fila['motivo_baja'],
            'archivo' => $fila['archivo'],
            'no_infonavit' => $fila['no_infonavit'], // Nuevo campo
            'nota' => $fila['nota'], // Nuevo campo
            'estado_registro' => $fila['estado_registro'] // Nuevo campo
        );
    }
    echo json_encode($datos);
} else {
    echo json_encode(array());
}

$conexion->close();
?>
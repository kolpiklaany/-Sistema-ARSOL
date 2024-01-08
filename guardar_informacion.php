<?php
// Conexión a la base de datos (ajusta los detalles según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inndaka2";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Variables con los datos del formulario
    $titulo = $_POST['titulo'] ?? '';
    $profesion = $_POST['profesion'] ?? '';
    $nombres = $_POST['nombres'] ?? '';
    $apellidoPaterno = $_POST['apellido_Paterno'] ?? '';
    $apellidoMaterno = $_POST['apellido_Materno'] ?? '';
    $fechaNacimiento = $_POST['fecha_nacimiento'] ?? '';
    $curp = $_POST['curp'] ?? '';
    $rfc = $_POST['rfc'] ?? '';
    $nss = $_POST['nss'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $hijos = $_POST['hijos'] ?? '';
    $noCuenta = $_POST['no-cuenta'] ?? '';
    $estadoCivil = $_POST['estado-Civil'] ?? '';
    $licenciaConducir = $_POST['licencia-Conducir'] ?? '';
    $certificadoMedico = $_POST['certificado-Médico'] ?? '';
    $sexo = $_POST['sexo'] ?? '';
    $tipoSangre = $_POST['tipo-De-Sangre'] ?? '';
    $cp = $_POST['cp'] ?? '';
    $calleNumero = $_POST['calleNumero'] ?? '';
    $colonia = $_POST['colonia'] ?? '';
    $ciudad = $_POST['ciudad'] ?? '';
    $estado = $_POST['estado'] ?? '';
    $fechaFirmaInicial = $_POST['fecha-Firma-Inicial'] ?? '';
    $puesto = $_POST['puesto'] ?? '';
    $empresa = $_POST['empresa'] ?? '';
    $telefonoEmpresarial = $_POST['telefono-Empresarial'] ?? '';
    $correoEmpresarial = $_POST['correo-Empresarial'] ?? '';
    $salarioMensual = $_POST['salario-Mensual'] ?? '';
    $base = $_POST['base'] ?? '';
    $ubicacion = $_POST['ubicacion'] ?? '';
    $fechaFirmaFinal = $_POST['fecha-Firma-Final'] ?? '';
    $motivoBaja = $_POST['motivo-Baja'] ?? '';
    $infonavit = $_POST['infonavit'] ?? '';
    $nota = $_POST['nota'] ?? '';
    $estadoRegistro = $_POST['estado_registro'] ?? '';
    $archivo = $_POST['archivo'] ?? '';
    if ($_FILES['archivo']) {
        $archivo = $_FILES['archivo'];
    
        // Obtener el contenido del archivo en formato base64
        $contenidoArchivo = base64_encode(file_get_contents($archivo['tmp_name']));
    
        // Guardar el contenido codificado en base64 en la variable $archivo_bd para usarla en la consulta SQL
        $archivo_bd = $contenidoArchivo; // Esta será la cadena Base64 que se guardará en la base de datos
    }
    

    // Preparar la consulta SQL para insertar los datos en la tabla 'datos_personales'
    $sql = "INSERT INTO datos_personales (titulo, profesion, nombres, apellido_paterno, apellido_materno,
    fecha_nacimiento, curp, rfc, nss, telefono, correo, hijos, no_cuenta, estado_civil, licencia_conducir,
    certificado_medico, sexo, tipo_sangre, cp, calle_numero, colonia, ciudad, estado, fecha_firma_inicial,
    puesto, empresa, telefono_empresarial, correo_empresarial, salario_mensual, base, ubicacion, fecha_firma_final,
    motivo_baja, archivo, no_infonavit, nota, estado_registro)
    VALUES ('$titulo', '$profesion', '$nombres', '$apellidoPaterno', '$apellidoMaterno', '$fechaNacimiento',
    '$curp', '$rfc', '$nss', '$telefono', '$correo', '$hijos', '$noCuenta', '$estadoCivil', '$licenciaConducir',
    '$certificadoMedico', '$sexo', '$tipoSangre', '$cp', '$calleNumero', '$colonia', '$ciudad', '$estado',
    '$fechaFirmaInicial', '$puesto', '$empresa', '$telefonoEmpresarial', '$correoEmpresarial', '$salarioMensual',
    '$base', '$ubicacion', '$fechaFirmaFinal', '$motivoBaja', '$archivo_bd', '$infonavit', '$nota', '$estadoRegistro')";
    

    // Ejecutar la consulta y verificar si se realizó correctamente
    if ($conn->query($sql) === TRUE) {
        header("location: index.php");
        echo "Los datos se han guardado correctamente en la base de datos.";
    } else {
        echo "Error al guardar los datos: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<?php
$conexion = new mysqli('localhost', 'root', '', 'inndaka2');

// Ejecutar la consulta SQL
$consulta = "SELECT * FROM datos_personales";
$resultado = $conexion->query($consulta);

header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=datos-usuario.xls");
?>

<table border=1 class='tabla_datos'>
    <thead>
        <tr id='titulo'>
            <td>Nombre</td>
            <td>Apellido paterno</td>
            <td>Apellido materno</td>
            <td>Teléfono</td>
            <td>Tipo-sangre</td>
            <td>Puesto</td>
            <td>Empresa</td>
            <td>Tel. empresarial</td>
            <td>Ubicacion</td>
            <td>Fecha de actualizacion de Salario</td>
            <td>Salario mensual</td>
            <td>Título</td>
            <td>Profesión</td>
            <td>Fecha de nacimiento</td>
            <td>CURP</td>
            <td>RFC</td>
            <td>NSS</td>
            <td>Correo</td>
            <td>Hijos</td>
            <td>No. Cuenta</td>
            <td>Estado Civil</td>
            <td>Licencia de conducir</td>
            <td>Certificado médico</td>
            <td>Sexo</td>
            <td>Tipo de sangre</td>
            <td>Código postal</td>
            <td>Calle y número</td>
            <td>Colonia</td>
            <td>Ciudad</td>
            <td>Estado</td>
            <td>Fecha Firma Inicial</td>
            <td>Fecha Firma Final</td>
            <td>Motivo Baja</td>
            <td>No. Infonavit</td>
            <td>Nota</td>
            <td>Estado de Contratacion</td>
            <td>Estado Registro</td>
            <td>Archivo</td>
        </tr>
    </thead>
    <tbody>

    <?php 
    // Verificar si la consulta fue exitosa antes de iterar sobre el resultado
    if ($resultado) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr id='fila-{$fila['id']}' onclick='redireccionarConDatos(\"{$fila['nombres']}\", \"{$fila['apellido_paterno']}\", \"{$fila['apellido_materno']}\",\"{$fila['telefono']}\", \"{$fila['tipo_sangre']}\", \"{$fila['puesto']}\", \"{$fila['empresa']}\", \"{$fila['telefono_empresarial']}\", \"{$fila['ubicacion']}\", \"{$fila['salario_mensual']}\", \"{$fila['titulo']}\", \"{$fila['profesion']}\",\"{$fila['fecha_nacimiento']}\",\"{$fila['curp']}\",\"{$fila['rfc']}\",\"{$fila['nss']}\",\"{$fila['correo']}\",\"{$fila['hijos']}\",\"{$fila['no_cuenta']}\",\"{$fila['estado_civil']}\",\"{$fila['licencia_conducir']}\",\"{$fila['certificado_medico']}\",\"{$fila['sexo']}\",\"{$fila['tipo_sangre']}\",\"{$fila['cp']}\",\"{$fila['calle_numero']}\",\"{$fila['colonia']}\",\"{$fila['ciudad']}\",\"{$fila['estado']}\",\"{$fila['fecha_firma_inicial']}\",\"{$fila['fecha_firma_final']}\",\"{$fila['motivo_baja']}\",\"{$fila['no_infonavit']}\",\"{$fila['nota']}\",\"{$fila['estado_registro']}\",\"{$fila['archivo']}\",\"{$fila['fecha_Firma_Salario']}\",\"{$fila['estado_contratacion']}\")'>  
                <td>{$fila['nombres']}</td>
                <td>{$fila['apellido_paterno']}</td>
                <td>{$fila['apellido_materno']}</td>
                <td>{$fila['telefono']}</td>
                <td>{$fila['tipo_sangre']}</td>
                <td>{$fila['puesto']}</td>
                <td>{$fila['empresa']}</td>
                <td>{$fila['telefono_empresarial']}</td>
                <td>{$fila['ubicacion']}</td>
                <td>{$fila['fecha_Firma_Salario']}</td>
                <td>{$fila['salario_mensual']}</td>
                <!-- Agregar celdas para las nuevas variables -->
                <td>{$fila['titulo']}</td>
                <td>{$fila['profesion']}</td>
                <td>{$fila['fecha_nacimiento']}</td>
                <td>{$fila['curp']}</td>
                <td>{$fila['rfc']}</td>
                <td>{$fila['nss']}</td>
                <td>{$fila['correo']}</td>
                <td>{$fila['hijos']}</td>
                <td>{$fila['no_cuenta']}</td>
                <td>{$fila['estado_civil']}</td>
                <td>{$fila['licencia_conducir']}</td>
                <td>{$fila['certificado_medico']}</td>
                <td>{$fila['sexo']}</td>
                <td>{$fila['tipo_sangre']}</td>
                <td>{$fila['cp']}</td>
                <td>{$fila['calle_numero']}</td>
                <td>{$fila['colonia']}</td>
                <td>{$fila['ciudad']}</td>
                <td>{$fila['estado']}</td>
                <td>{$fila['fecha_firma_inicial']}</td>
                <td>{$fila['fecha_firma_final']}</td>
                <td>{$fila['motivo_baja']}</td>
                <td>{$fila['no_infonavit']}</td>
                <td>{$fila['nota']}</td>
                <td>{$fila['estado_contratacion']}</td>
                <td>{$fila['estado_registro']}</td>
                <td>{$fila['archivo']}</td>
            </tr>";
        }
    } else {
        echo "Error al ejecutar la consulta: " . $conexion->error;
    }
    ?>
    </tbody>
</table>

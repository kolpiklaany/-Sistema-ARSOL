<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

// Include the main TCPDF library (search for installation path).

// Include TCPDF library
require_once('TCPDF-main/tcpdf.php');

// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "inndaka";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}

// Obtener datos del formulario o de la base de datos (reemplaza estos valores con tu lógica)
$titulo = "Ejemplo de título";
$profesion = "Ejemplo de profesión";
$nombres = "Ejemplo de nombre";
// ... (continúa con el resto de tus campos)

// Crear contenido HTML con los datos obtenidos
$html = <<<EOD
<h1>Datos del formulario:</h1>
<p>Título: $titulo</p>
<p>Profesión: $profesion</p>
<!-- Agrega los otros campos que desees mostrar en el PDF -->
EOD;

// Crear un nuevo objeto PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Resto del código del PDF...

// Agregar el contenido HTML al PDF
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// Resto del código del PDF...

// Almacenar los datos en la base de datos (reemplaza los campos y la tabla con los tuyos)
$sql = "INSERT INTO colaboradores (titulo, profesion, nombres) 
        VALUES ('$titulo', '$profesion', '$nombres')";

if ($conn->query($sql) === TRUE) {
    echo "Datos insertados correctamente en la base de datos.";
} else {
    echo "Error al insertar datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();

// Generar el PDF para descarga
$pdf->Output('formulario.pdf', 'D'); // Esto descargará el PDF automáticamente

?>

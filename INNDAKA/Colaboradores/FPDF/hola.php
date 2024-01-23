<?php


require('fpdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    
    // Arial bold 15
    $this->SetFont('Arial','B',10);
    // Movernos a la derecha
    $this->Cell(180);
    // Título
    $this->Cell(70,20,'COLABORADORES',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(35,10,'Nombre', 1, 0, 'C', 0);
    $this->Cell(35,10,utf8_decode ('Apellido Paterno'), 1, 0, 'C', 0);
    $this->Cell(35,10,'Apellido Paterno', 1, 0, 'C', 0);
    $this->Cell(35,10,'Telefono',1, 0, 'C',0);
    $this->Cell(35,10,'Tipo de sangre',1, 0, 'C',0);
    $this->Cell(35,10,'Puesto',1, 0, 'C',0);
    $this->Cell(35,10,'Empresa',1, 0, 'C',0);
    $this->Cell(35,10,'Tel. Empresarial',1, 0, 'C',0);
    $this->Cell(35,10,'Ubicacion',1, 0, 'C',0);
    $this->Cell(35,10,'Salario Mensual',1, 0, 'C',0);

    
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',6.5);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagina').$this->PageNo().'/{nb}',0,0,'C');
}
} 


require 'cn.php';
$consulta = "SELECT * FROM datos_personales";
$resultado = $mysqli->query($consulta);

 $pdf = new PDF('L', 'mm','A3'); //Creamos un objeto de la librería
 $pdf -> AliasNbPages();
 $pdf->AddPage(); //Agregamos una Pagina
 $pdf->SetFont('Arial','',6.5); //Establecemos tipo de fuente, negrita y tamaño 16
//Agregamos texto en una celda de 40px ancho y 10px de alto, Con Borde, Sin salto de linea y Alineada a la derecha
 
while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(35, 10, $row['nombres'], 1, 0, 'C', 0);
    $pdf->Cell(35, 10, $row['apellido_paterno'], 1, 0, 'C', 0);
    $pdf->Cell(35, 10, $row['apellido_paterno'], 1, 0, 'C', 0);
    $pdf->Cell(35, 10, $row['telefono'], 1, 0, 'C', 0);
    $pdf->Cell(35, 10, $row['tipo_sangre'], 1, 0, 'C', 0);
    $pdf->Cell(35, 10, $row['puesto'], 1, 0, 'C', 0);
    $pdf->Cell(35, 10, $row['empresa'], 1, 0, 'C', 0);
    $pdf->Cell(35, 10, $row['telefono_empresarial'], 1, 0, 'C', 0);
    $pdf->Cell(35, 10, $row['ubicacion'], 1, 0, 'C', 0);
    $pdf->Cell(35, 10, $row['salario_mensual'], 1, 0, 'C', 0);

    // Agregar un salto de línea después de cada fila de datos
    $pdf->Ln();
}


$pdf->Output();
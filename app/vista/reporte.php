<?php
require_once('../../public/fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    // $this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,25,'LISTA DE SOCIOS',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    // Arial bold 15
    $this->SetFont('Times','B',11);

    $this->cell(10,6,'Nro',1,0,'C',0);
    $this->cell(70,6,'Nombre Completo',1,0,'LR',0);
    $this->cell(20,6,'CI',1,0,'C',0);
    $this->cell(40,6,'Direccion',1,0,'C',0);
    $this->cell(20,6,'Celular',1,0,'C',0);
    $this->cell(30,6,'Fecha de registro',1,10,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
// require_once("../vista/vst_reportecomensual.php");
// require("../config/conexion.php");
$con = new PDO("sqlsrv:server=NP270\SQLExpress; Database = sisrecocoap", "", "");

// $con=new conexion();
$sql = "select * from socios where Activo=1 ORDER BY ApellidosNombres ASC";
$resp = $con->query($sql,PDO::FETCH_ASSOC);


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(0);
$pdf->SetFont('Times','',9);
$num=0;
$fechaSalida=0;
$rows = $resp->fetchAll();
foreach ($rows as $mostrar ) {

$fechaSalida = strtotime($mostrar["FechaRegistro"]);
$fechaSalida = date('d/m/Y',$fechaSalida);
$num=$num+1;
$pdf->cell(10,6,$num,1,0,'C',0);
$pdf->cell(70,6,$mostrar["ApellidosNombres"],1,0,'LR',0);
$pdf->cell(20,6,$mostrar["CI"],1,0,'C',0);
$pdf->cell(40,6,$mostrar["Direccion"],1,0,'C',0);
$pdf->cell(20,6,$mostrar["Celular"],1,0,'C',0);
$pdf->cell(30,6,$fechaSalida,1,1,'C',0);
}
$pdf->Output();


?>
<?php
require './fpdf/fpdf.php';
include '../library/configServer.php';
include '../library/consulSQL.php';
include '../library/SelectMonth.php';
$selectInstitution=ejecutarSQL::consultar("SELECT * FROM institucion");
$dataInstitution=mysqli_fetch_array($selectInstitution, MYSQLI_ASSOC);
$Type=$_GET['Type'];
$Total=$_GET['Total'];

if($Type=="Admin"){
    $UType="Administradores";
    $BType="Administrador";
}
if($Type=="Teacher"){
    $UType="Docentes";
    $BType="Docente";
}
if($Type=="Student"){
    $UType="Estudiantes";
    $BType="Estudiante";
}
if($Type=="Personal"){
    $UType="Personal Administrativo";
    $BType="Personal";
}

class PDF extends FPDF{
}
ob_end_clean();
$pdf=new PDF('L','mm',array(216,330));
$pdf->AddPage();
$pdf->SetFont("Times","",20);
$pdf->SetMargins(25,20,25);
$pdf->Image('../assets/img/logo.png',40,20,20,20);
$pdf->Image('../assets/img/calendar.png',270,20,20,20);
$pdf->Ln(20);
$pdf->Cell (0,5,iconv("UTF-8", "ISO-8859-1",$dataInstitution['Nombre']),0,1,'C');
$pdf->Ln(5);
$pdf->SetFont("Times","",14);
$pdf->Cell (0,5,iconv("UTF-8", "ISO-8859-1","Reporte general de bitácora de $UType"),0,1,'C');
$pdf->Ln(12);
$pdf->SetFillColor(179,229,252);
$pdf->Cell (14,7,iconv("UTF-8", "ISO-8859-1",'N.'),1,0,'C',true);
$pdf->Cell (100,7,iconv("UTF-8", "ISO-8859-1",'NOMBRE'),1,0,'C',true);
$pdf->Cell (64,7,iconv("UTF-8", "ISO-8859-1",'FECHA'),1,0,'C',true);
$pdf->Cell (51,7,iconv("UTF-8", "ISO-8859-1",'INICIO'),1,0,'C',true);
$pdf->Cell (51,7,iconv("UTF-8", "ISO-8859-1",'FINALIZACIÓN'),1,0,'C',true);
$pdf->Ln(7);
$pdf->SetFont("Times","",12);
$SB=ejecutarSQL::consultar("SELECT * FROM bitacora WHERE Tipo='$BType' ORDER BY ID DESC LIMIT $Total");
$CountR=1;
while($DSB=mysqli_fetch_array($SB, MYSQLI_ASSOC)){
    if($BType=='Administrador'){
        $selectName=ejecutarSQL::consultar("SELECT Nombre FROM administrador WHERE CodigoAdmin='".$DSB['CodigoUsuario']."'");
        $dataUser=mysqli_fetch_array($selectName, MYSQLI_ASSOC);
        $nameUser=$dataUser['Nombre'];
    }elseif ($BType=='Docente'){
        $selectName=ejecutarSQL::consultar("SELECT Nombre,Apellido FROM docente WHERE DUI='".$DSB['CodigoUsuario']."'");
        $dataUser=mysqli_fetch_array($selectName, MYSQLI_ASSOC);
        $nameUser=$dataUser['Nombre']." ".$dataUser['Apellido'];
    }elseif ($BType=='Estudiante'){
        $selectName=ejecutarSQL::consultar("SELECT Nombre,Apellido  FROM estudiante WHERE NIE='".$DSB['CodigoUsuario']."'");
        $dataUser=mysqli_fetch_array($selectName, MYSQLI_ASSOC);
        $nameUser=$dataUser['Nombre']." ".$dataUser['Apellido'];
    }elseif ($BType=='Personal'){
        $selectName=ejecutarSQL::consultar("SELECT Nombre,Apellido  FROM personal WHERE DUI='".$DSB['CodigoUsuario']."'");
        $dataUser=mysqli_fetch_array($selectName, MYSQLI_ASSOC);
        $nameUser=$dataUser['Nombre']." ".$dataUser['Apellido'];
    }
    $SelectDay=date("d",strtotime($DSB['Fecha']));
    $SelectMonth=date("m",strtotime($DSB['Fecha']));
    $SelectYear=date("Y",strtotime($DSB['Fecha']));
    $SelectMontName=CalMonth::CurrentMonth($SelectMonth);
    $SelectDate=$SelectDay.' de '.$SelectMontName.' de '.$SelectYear;
    $pdf->Cell (14,7,iconv("UTF-8", "ISO-8859-1",$CountR),1,0,'C');
    $pdf->Cell (100,7,iconv("UTF-8", "ISO-8859-1",$nameUser),1,0,'C');
    $pdf->Cell (64,7,iconv("UTF-8", "ISO-8859-1",$SelectDate),1,0,'C');
    $pdf->Cell (51,7,iconv("UTF-8", "ISO-8859-1",$DSB['Entrada']),1,0,'C');
    $pdf->Cell (51,7,iconv("UTF-8", "ISO-8859-1",$DSB['Salida']),1,0,'C');
    $pdf->Ln(7);
    $CountR++;
    mysqli_free_result($selectName);
}
mysqli_free_result($SB);
$pdf->Output('Reporte_Bitacora_General_'.$Total.'_'.$UType,'I');
mysqli_free_result($selectInstitution);
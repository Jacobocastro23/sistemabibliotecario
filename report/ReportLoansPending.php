<?php
set_time_limit(600);
require './fpdf/fpdf.php';
include '../library/configServer.php';
include '../library/consulSQL.php';
include '../library/SelectMonth.php';
$userType=consultasSQL::CleanStringText($_GET['user']);
if($userType=="Teacher"){ $tableUser="prestamodocente"; $userType="docentes"; $tableUser2="docente"; $key="DUI"; }
if($userType=="Student"){ $tableUser="prestamoestudiante"; $userType="estudiantes"; $tableUser2="estudiante"; $key="NIE"; }
if($userType=="Visitor"){ $tableUser="prestamovisitante"; $userType="visitantes"; }
if($userType=="Personal"){ $tableUser="prestamopersonal"; $userType="personal administrativo"; $tableUser2="personal"; $key="DUI"; }
$selectInstitution=ejecutarSQL::consultar("SELECT * FROM institucion");
$dataInstitution=mysqli_fetch_array($selectInstitution, MYSQLI_ASSOC);
class PDF extends FPDF{
}
ob_end_clean();
$pdf=new PDF('L','mm',array(216,330));
$pdf->AddPage();
$pdf->SetFont("Times","",20);
$pdf->SetMargins(15,20,15);
$pdf->Image('../assets/img/logo.png',40,20,20,20);
$pdf->Image('../assets/img/books.png',270,20,18,20);
$pdf->Ln(20);
$pdf->Cell (0,5,iconv("UTF-8", "ISO-8859-1",$dataInstitution['Nombre']),0,1,'C');
$pdf->Ln(5);
$pdf->SetFont("Times","",14);
$pdf->Cell (0,5,iconv("UTF-8", "ISO-8859-1",'Control de bibliografía de biblioteca del '.$dataInstitution['Nombre'].''),0,1,'C');
$pdf->Ln(5);
$pdf->Cell (0,5,iconv("UTF-8", "ISO-8859-1",'prestada a '.$userType.' y pendiente de devolución durante el año '.$dataInstitution['Year'].''),0,1,'C');
$pdf->Ln(12);
$pdf->SetFont("Times","b",10);
$pdf->SetFillColor(255,204,188);
if($userType=="docentes" || $userType=="estudiantes"){
    $pdf->Cell (30,6,iconv("UTF-8", "ISO-8859-1",'SECCIÓN'),1,0,'C',true);
}else{
    $pdf->Cell (30,6,iconv("UTF-8", "ISO-8859-1",'NUMERO'),1,0,'C',true);
}
$pdf->Cell (30,6,iconv("UTF-8", "ISO-8859-1",'CÓDIGO LIBRO'),1,0,'C',true);
$pdf->Cell (104,6,iconv("UTF-8", "ISO-8859-1",'TÍTULO LIBRO'),1,0,'C',true);
$pdf->Cell (70,6,iconv("UTF-8", "ISO-8859-1",'SOLICITANTE'),1,0,'C',true);
$pdf->Cell (35,6,iconv("UTF-8", "ISO-8859-1",'F. SOLICITUD'),1,0,'C',true);
$pdf->Cell (35,6,iconv("UTF-8", "ISO-8859-1",'F. ENTREGA'),1,0,'C',true);
$pdf->Ln(6);
$pdf->SetFont("Times","",10);
$selALoansP=ejecutarSQL::consultar("SELECT * FROM prestamo WHERE Estado='Prestamo' ORDER BY FechaSalida ASC");
$countAb=0;
while($DataALS=mysqli_fetch_array($selALoansP, MYSQLI_ASSOC)){
    $selL=ejecutarSQL::consultar("SELECT * FROM ".$tableUser." WHERE CodigoPrestamo='".$DataALS['CodigoPrestamo']."'");
    if(mysqli_num_rows($selL)>0){
        $dataUSRL=mysqli_fetch_array($selL, MYSQLI_ASSOC);
        $SelectDayFS=date("d",strtotime($DataALS['FechaSalida']));
        $SelectMonthFS=date("m",strtotime($DataALS['FechaSalida']));
        $SelectYearFS=date("Y",strtotime($DataALS['FechaSalida']));
        $SelectMontNameFS=CalMonth::CurrentMonth($SelectMonthFS);
        $SelectDateFS=$SelectDayFS.' '.$SelectMontNameFS.' '.$SelectYearFS;
        $SelectDayFE=date("d",strtotime($DataALS['FechaEntrega']));
        $SelectMonthFE=date("m",strtotime($DataALS['FechaEntrega']));
        $SelectYearFE=date("Y",strtotime($DataALS['FechaEntrega']));
        $SelectMontNameFE=CalMonth::CurrentMonth($SelectMonthFE);
        $SelectDateFE=$SelectDayFE.' '.$SelectMontNameFE.' '.$SelectYearFE;
        if($userType=="docentes" || $userType=="estudiantes" || $userType=="personal administrativo"){
            $selDUser=ejecutarSQL::consultar("SELECT * FROM ".$tableUser2." WHERE ".$key."='".$dataUSRL[$key]."'");
            $dataUS=mysqli_fetch_array($selDUser, MYSQLI_ASSOC);
            $NameUser=$dataUS['Nombre'].' '.$dataUS['Apellido'];

            if($userType=="docentes" || $userType=="estudiantes"){
                $usSection=ejecutarSQL::consultar("SELECT Nombre FROM seccion WHERE CodigoSeccion='".$dataUS['CodigoSeccion']."'");
                $usDataSec=mysqli_fetch_array($usSection, MYSQLI_ASSOC);
            }
        }else{
            $NameUser=$dataUSRL['Nombre'];
        }
        $selBo=ejecutarSQL::consultar("SELECT * FROM libro WHERE CodigoLibro='".$DataALS['CodigoLibro']."'");
        $datB=mysqli_fetch_array($selBo, MYSQLI_ASSOC);
        
        $countAb++;
        if($userType=="docentes" || $userType=="estudiantes"){
            $pdf->Cell (30,6,iconv("UTF-8", "ISO-8859-1",$usDataSec['Nombre']),1,0,'C');
        }else{
            $pdf->Cell (30,6,iconv("UTF-8", "ISO-8859-1",$countAb),1,0,'C');
        }
        if($userType=="docentes"){
            $pdf->Cell (30,6,iconv("UTF-8", "ISO-8859-1","Ver ficha"),1,0,'C');
        }else{
            $pdf->Cell (30,6,iconv("UTF-8", "ISO-8859-1",$datB['CodigoLibroManual']),1,0,'C');
        }
        $pdf->Cell (104,6,iconv("UTF-8", "ISO-8859-1",$datB['Titulo']),1,0,'C');
        $pdf->Cell (70,6,iconv("UTF-8", "ISO-8859-1",$NameUser),1,0,'C');
        $pdf->Cell (35,6,iconv("UTF-8", "ISO-8859-1",$SelectDateFS),1,0,'C');
        $pdf->Cell (35,6,iconv("UTF-8", "ISO-8859-1",$SelectDateFE),1,0,'C');
        $pdf->Ln(6);
        mysqli_free_result($selDUser);
        mysqli_free_result($selBo);
        mysqli_free_result($stSection);
    }
    mysqli_free_result($selL);
}
mysqli_free_result($selALoansP);
$pdf->Output('Devoluciones_pendientes_'.$userType.'_'.$dataInstitution['Year'],'I');
mysqli_free_result($selectInstitution);
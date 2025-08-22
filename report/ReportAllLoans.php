<?php
set_time_limit(600);
require './fpdf/fpdf.php';
include '../library/configServer.php';
include '../library/consulSQL.php';
$LoanYearGet=$_GET['Year'];
$selectInstitution=ejecutarSQL::consultar("SELECT * FROM institucion");
$dataInstitution=mysqli_fetch_array($selectInstitution, MYSQLI_ASSOC);
if(!$LoanYearGet!="" && !isset($LoanYearGet)){
    $LoanYearGet=$dataInstitution['Year'];
}
if(!is_numeric($LoanYearGet)){
    $LoanYearGet=$dataInstitution['Year'];
}
class PDF extends FPDF{
}
ob_end_clean();
$pdf=new PDF('P','mm','Letter');
$pdf->AddPage();
$pdf->SetFont("Times","",20);
$pdf->SetMargins(25,20,25);
$pdf->Image('../assets/img/logo.png',19,16,20,20);
$pdf->Image('../assets/img/books.png',177,16,18,20);
$pdf->Ln(10);
$pdf->Cell (0,5,iconv("UTF-8", "ISO-8859-1",$dataInstitution['Nombre']),0,1,'C');
$pdf->Ln(5);
$pdf->SetFont("Times","",14);
$pdf->Cell (0,5,iconv("UTF-8", "ISO-8859-1",'Control de bibliografía de biblioteca prestada y entregada'),0,1,'C');
$pdf->Ln(5);
$pdf->Cell (0,5,iconv("UTF-8", "ISO-8859-1",'durante el año '.$LoanYearGet.''),0,1,'C');
$pdf->Ln(20);
$pdf->SetFont("Times","b",10);
$pdf->SetFillColor(255,204,188);
$pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",'TIPO DE USUARIO'),1,0,'C',true);
$pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",'NÚMERO DE PRÉSTAMOS'),1,0,'C',true);
$pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",'PORCENTAJE'),1,0,'C',true);
$pdf->Ln(6);
function Cporcent($NT,$CT,$DC){
    $Res=number_format($NT/$CT ,$DC)*100;
    return $Res;
}

$selectallLoans=ejecutarSQL::consultar("SELECT * FROM prestamo WHERE Estado='Entregado' AND FechaSalida LIKE '%".$LoanYearGet."%'");
$totalSelected=mysqli_num_rows($selectallLoans);

$totalLoansStudents=0;
$totalLoansTeacher=0;
$totalLoansVisitor=0;
$totalLoansPersonal=0;
$selectallLoans2=ejecutarSQL::consultar("SELECT * FROM prestamo WHERE Estado='Entregado' AND FechaSalida LIKE '%".$LoanYearGet."%'");
while($filaD=mysqli_fetch_array($selectallLoans2, MYSQLI_ASSOC)){
    $SelectYear=date("Y",strtotime($filaD['FechaSalida']));
    if($LoanYearGet==$SelectYear){
        $checkingUser1=ejecutarSQL::consultar("SELECT * FROM prestamoestudiante WHERE CodigoPrestamo='".$filaD['CodigoPrestamo']."'");
        if(mysqli_num_rows($checkingUser1)>=1){
            $totalLoansStudents++;
        }
        $checkingUser2=ejecutarSQL::consultar("SELECT * FROM prestamodocente WHERE CodigoPrestamo='".$filaD['CodigoPrestamo']."'");
        if(mysqli_num_rows($checkingUser2)>=1){
            $totalLoansTeacher++;
        }
        $checkingUser3=ejecutarSQL::consultar("SELECT * FROM prestamovisitante WHERE CodigoPrestamo='".$filaD['CodigoPrestamo']."'");
        if(mysqli_num_rows($checkingUser3)>=1){
            $totalLoansVisitor++;
        }
        $checkingUser4=ejecutarSQL::consultar("SELECT * FROM prestamopersonal WHERE CodigoPrestamo='".$filaD['CodigoPrestamo']."'");
        if(mysqli_num_rows($checkingUser4)>=1){
            $totalLoansPersonal++;
        }
        mysqli_free_result($checkingUser1);
        mysqli_free_result($checkingUser2);
        mysqli_free_result($checkingUser3);
        mysqli_free_result($checkingUser4);
    }
}
$pdf->SetFont("Times","",10);
$pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",'Estudiantes'),1,0,'C');
$pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",$totalLoansStudents),1,0,'C');
$pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",$TEP=Cporcent($totalLoansStudents, $totalSelected, 2).'%'),1,0,'C');
$pdf->Ln(6);
$pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",'Docentes'),1,0,'C');
$pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",$totalLoansTeacher),1,0,'C');
$pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",$TTP=Cporcent($totalLoansTeacher, $totalSelected, 2).'%'),1,0,'C');
$pdf->Ln(6);
$pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",'Personal Administrativo'),1,0,'C');
$pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",$totalLoansPersonal),1,0,'C');
$pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",$TPP=Cporcent($totalLoansPersonal, $totalSelected, 2).'%'),1,0,'C');
$pdf->Ln(6);
$pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",'Visitantes'),1,0,'C');
$pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",$totalLoansVisitor),1,0,'C');
$pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",$TVP=Cporcent($totalLoansVisitor, $totalSelected, 2).'%'),1,0,'C');
$pdf->Ln(6);
$pdf->SetFillColor(179,229,252);
$pdf->SetFont("Times","b",10);
$pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",'TOTAL'),1,0,'C',true);
$pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",$totalSelected),1,0,'C',true);
$pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",$TEP+$TTP+$TVP+$TPP.'%'),1,0,'C',true);
$pdf->Output('Prestamos_entregados_'.$LoanYearGet,'I');
mysqli_free_result($selectInstitution);
mysqli_free_result($selectallLoans);
mysqli_free_result($selectallLoans2);
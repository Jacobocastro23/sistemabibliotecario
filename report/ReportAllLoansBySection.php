<?php
set_time_limit(600);
require './fpdf/fpdf.php';
include '../library/configServer.php';
include '../library/consulSQL.php';
$LoanTypeGet=$_GET['Loans'];
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
$pdf->Cell (0,5,iconv("UTF-8", "ISO-8859-1","Control de bibliografía de biblioteca en estado '$LoanTypeGet'"),0,1,'C');
$pdf->Ln(5);
$pdf->Cell (0,5,iconv("UTF-8", "ISO-8859-1",'por grupos durante el año '.$LoanYearGet.''),0,1,'C');
$pdf->Ln(20);
$pdf->SetFont("Times","b",10);
$pdf->SetFillColor(255,204,188);
$pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",'SECCIÓN'),1,0,'C',true);
$pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",'NÚMERO DE PRÉSTAMOS'),1,0,'C',true);
$pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",'PORCENTAJE'),1,0,'C',true);
$pdf->Ln(6);
$pdf->SetFont("Times","",10);
function Cporcent($NT,$CT,$DC){
    $Res=number_format($NT/$CT ,$DC)*100;
    return $Res;
}

$selectallLoans=ejecutarSQL::consultar("SELECT * FROM prestamo WHERE Estado='$LoanTypeGet' AND FechaSalida LIKE '%".$LoanYearGet."%'");
$totalLoansStudents=mysqli_num_rows($selectallLoans);

$selectAllSections=ejecutarSQL::consultar("SELECT * FROM seccion ORDER BY Nombre ASC");
$CounterSectPorcent=0;
while($DataSect=mysqli_fetch_array($selectAllSections, MYSQLI_ASSOC)){
    $selectST=ejecutarSQL::consultar("SELECT * FROM estudiante WHERE CodigoSeccion='".$DataSect['CodigoSeccion']."'");
    $CounterSect=0;
    while($DataST=mysqli_fetch_array($selectST, MYSQLI_ASSOC)){
        $selectLS=ejecutarSQL::consultar("SELECT * FROM prestamoestudiante WHERE NIE='".$DataST['NIE']."'");
        while($DataLS=mysqli_fetch_array($selectLS, MYSQLI_ASSOC)){
            $selectAL=ejecutarSQL::consultar("SELECT * FROM prestamo WHERE CodigoPrestamo='".$DataLS['CodigoPrestamo']."' AND Estado='$LoanTypeGet'");
            while($DataAL=mysqli_fetch_array($selectAL, MYSQLI_ASSOC)){
                $SY=date("Y",strtotime($DataAL['FechaSalida']));
                if($LoanYearGet==$SY){ $CounterSect++;}
            }
            mysqli_free_result($selectAL);
        }
        mysqli_free_result($selectLS);
    }
    mysqli_free_result($selectST);
    $TotalPorcent=Cporcent($CounterSect, $totalLoansStudents, 3);
    $pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",$DataSect['Nombre']),1,0,'C');
    $pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",$CounterSect),1,0,'C');
    $pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",$TotalPorcent.'%'),1,0,'C');
    $pdf->Ln(6);
    $CounterSectPorcent=$CounterSectPorcent+$TotalPorcent;
}
mysqli_free_result($selectAllSections);
$pdf->SetFillColor(179,229,252);
$pdf->SetFont("Times","b",10);
$pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",'TOTAL'),1,0,'C',true);
$pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",$totalLoansStudents),1,0,'C',true);
$pdf->Cell (53,6,iconv("UTF-8", "ISO-8859-1",$CounterSectPorcent.'%'),1,0,'C',true);
$pdf->Output('Prestamos_'.$LoanTypeGet.'_Secciones_'.$LoanYearGet,'I');
mysqli_free_result($selectInstitution);
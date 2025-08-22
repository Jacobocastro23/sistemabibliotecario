<?php
require './fpdf/fpdf.php';
include '../library/configServer.php';
include '../library/consulSQL.php';
include '../library/SelectMonth.php';

$loanCode=consultasSQL::CleanStringText($_GET['loanCode']);
$selectInstitution=ejecutarSQL::consultar("SELECT * FROM institucion");
$dataInstitution=mysqli_fetch_array($selectInstitution, MYSQLI_ASSOC);
$selectLoan=ejecutarSQL::consultar("SELECT * FROM prestamo WHERE CodigoPrestamo='".$loanCode."'");
$dataLoan=mysqli_fetch_array($selectLoan, MYSQLI_ASSOC);
$selectBook=ejecutarSQL::consultar("SELECT * FROM libro WHERE CodigoLibro='".$dataLoan['CodigoLibro']."'");
$dataBook=mysqli_fetch_array($selectBook, MYSQLI_ASSOC);
$selectUserKey=ejecutarSQL::consultar("SELECT * FROM prestamoestudiante WHERE CodigoPrestamo='".$loanCode."'");
$dataKey=mysqli_fetch_array($selectUserKey, MYSQLI_ASSOC);
$selectUser=ejecutarSQL::consultar("SELECT * FROM estudiante WHERE NIE='".$dataKey['NIE']."'");
$dataUser=mysqli_fetch_array($selectUser, MYSQLI_ASSOC);
$selectRepresentative=ejecutarSQL::consultar("SELECT * FROM encargado WHERE DUI='".$dataUser['DUI']."'");
$dataRepresentative=mysqli_fetch_array($selectRepresentative, MYSQLI_ASSOC);
$selectSection=ejecutarSQL::consultar("SELECT * FROM seccion WHERE CodigoSeccion='".$dataUser['CodigoSeccion']."'");
$dataSection=mysqli_fetch_array($selectSection, MYSQLI_ASSOC);
$selectTeacher=ejecutarSQL::consultar("SELECT * FROM docente WHERE CodigoSeccion='".$dataUser['CodigoSeccion']."'");
$dataTeacher=mysqli_fetch_array($selectTeacher, MYSQLI_ASSOC);

if($dataTeacher['Nombre']==""&&$dataTeacher['Apellido']==""){
    $nameTeacher="";
}else{
    $nameTeacher=$dataTeacher['Nombre'].' '.$dataTeacher['Apellido'];
}

if($dataLoan['FechaSalida']!=""){
    $SelectDayFS=date("d",strtotime($dataLoan['FechaSalida']));
    $SelectMonthFS=date("m",strtotime($dataLoan['FechaSalida']));
    $SelectYearFS=date("Y",strtotime($dataLoan['FechaSalida']));
    $SelectMontNameFS=CalMonth::CurrentMonth($SelectMonthFS);
    $SelectDateFS=$SelectDayFS.' de '.$SelectMontNameFS.' de '.$SelectYearFS;

    $SelectDayFE=date("d",strtotime($dataLoan['FechaEntrega']));
    $SelectMonthFE=date("m",strtotime($dataLoan['FechaEntrega']));
    $SelectYearFE=date("Y",strtotime($dataLoan['FechaEntrega']));
    $SelectMontNameFE=CalMonth::CurrentMonth($SelectMonthFE);
    $SelectDateFE=$SelectDayFE.' de '.$SelectMontNameFE.' de '.$SelectYearFE;
}else{
    $SelectDateFS="";
    $SelectDateFE="";
}

if($loanCode!=""){ 
    $CurrentYear=$SelectYearFE; 
}else{ 
    $CurrentYear=$dataInstitution['Year']; 
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
$pdf->SetFont("Times","b",17);
$pdf->Cell (0,5,iconv("UTF-8", "ISO-8859-1",'Solicitud de libros para estudiantes '.$CurrentYear),0,1,'C');
$pdf->Ln(20);
$pdf->SetFont("Times","b",12);
$pdf->Cell (17,5,iconv("UTF-8", "ISO-8859-1",'Nombre: '),0);
$pdf->SetFont("Times","",12);
$pdf->Cell (140,5,iconv("UTF-8", "ISO-8859-1",$dataUser['Nombre'].' '.$dataUser['Apellido']),0);
$pdf->Ln(9);
$pdf->SetFont("Times","b",12);
$pdf->Cell (50,5,iconv("UTF-8", "ISO-8859-1",'Encargado: '),0);
$pdf->SetFont("Times","",12);
$pdf->Cell (110,5,iconv("UTF-8", "ISO-8859-1",$dataRepresentative['Nombre']),0);
$pdf->Ln(9);
$pdf->SetFont("Times","b",12);
$pdf->Cell (29,5,iconv("UTF-8", "ISO-8859-1",'Tel. encargado: '),0);
$pdf->SetFont("Times","",12);
$pdf->Cell (37,5,iconv("UTF-8", "ISO-8859-1",$dataRepresentative['Telefono']),0);
$pdf->SetFont("Times","b",12);
$pdf->Cell (23,5,iconv("UTF-8", "ISO-8859-1",'Parentesco: '),0);
$pdf->SetFont("Times","",12);
$pdf->Cell (67,5,iconv("UTF-8", "ISO-8859-1",$dataUser['Parentesco']),0);
$pdf->Ln(9);
$pdf->SetFont("Times","b",12);
$pdf->Cell (29,5,iconv("UTF-8", "ISO-8859-1",'Año y Grupo: '),0);
$pdf->SetFont("Times","",12);
$pdf->Cell (127,5,iconv("UTF-8", "ISO-8859-1",$dataSection['Nombre']),0);
$pdf->Ln(15);
$pdf->SetFont("Times","b",12);
$pdf->Cell (45,5,iconv("UTF-8", "ISO-8859-1",'Coordinador de sección: '),0);
$pdf->SetFont("Times","",12);
$pdf->Cell (110,5,iconv("UTF-8", "ISO-8859-1",$nameTeacher),0);
$pdf->Ln(9);
$pdf->SetFont("Times","b",12);
$pdf->Cell (35,5,iconv("UTF-8", "ISO-8859-1",'Nombre del Libro: '),0);
$pdf->SetFont("Times","",12);
$pdf->Cell (120,5,iconv("UTF-8", "ISO-8859-1",$dataBook['Titulo']),0);
$pdf->Ln(9);
$pdf->SetFont("Times","b",12);
$pdf->Cell (31,5,iconv("UTF-8", "ISO-8859-1",'Autor del Libro: '),0);
$pdf->SetFont("Times","",12);
$pdf->Cell (70,5,iconv("UTF-8", "ISO-8859-1",$dataBook['Autor']),0);
$pdf->SetFont("Times","b",12);
$pdf->Cell (16,5,iconv("UTF-8", "ISO-8859-1",'Código: '),0);
$pdf->SetFont("Times","",12);
$pdf->Cell (50,5,iconv("UTF-8", "ISO-8859-1",$dataBook['CodigoLibroManual']),0);
$pdf->Ln(9);
$pdf->SetFont("Times","b",12);
$pdf->Cell (42,5,iconv("UTF-8", "ISO-8859-1",'Total libros prestados: '),0);
$pdf->SetFont("Times","",12);
$pdf->Cell (70,5,iconv("UTF-8", "ISO-8859-1",$dataKey['Cantidad']),0);
$pdf->Ln(15);
$pdf->SetFont("Times","b",12);
$pdf->Cell (35,5,iconv("UTF-8", "ISO-8859-1",'Fecha de solicitud: '),0);
$pdf->SetFont("Times","",11);
$pdf->Cell (45,5,iconv("UTF-8", "ISO-8859-1",$SelectDateFS),0);
$pdf->SetFont("Times","b",12);
$pdf->Cell (33,5,iconv("UTF-8", "ISO-8859-1",'Fecha de entrega: '),0);
$pdf->SetFont("Times","",11);
$pdf->Cell (45,5,iconv("UTF-8", "ISO-8859-1",$SelectDateFE),0);
$pdf->Ln(12);
$pdf->SetFont("Times","b",12);
// Comentamos para no mostrar el "N° de carnet" ni el número
// $pdf->Cell (25,5,iconv("UTF-8", "ISO-8859-1",'N° de carnet: '),0);
// $pdf->SetFont("Times","",12);
// $pdf->Cell (50,5,iconv("UTF-8", "ISO-8859-1",$dataUser['NIE']),0);
$pdf->SetFont("Times","b",12);
$pdf->Cell (6,5,iconv("UTF-8", "ISO-8859-1",'F:'),0);
$pdf->Cell (60,5,iconv("UTF-8", "ISO-8859-1",'_________________________'),0);
$pdf->Ln(15);
$pdf->SetFont("Times","",12);
$pdf->Cell (0,5,iconv("UTF-8", "ISO-8859-1",'Nota:  Joven estudiante para solicitar libros de biblioteca, deberá presentar su propio'),0);
$pdf->Ln(7);
$pdf->Cell (0,5,iconv("UTF-8", "ISO-8859-1",'documento de identidad personal (Matricula), y'),0);
$pdf->Ln(7);
$pdf->Cell (0,5,iconv("UTF-8", "ISO-8859-1",'si el libro sufre daños deberá responder por ellos, asi mismo entregarlo en la fecha indicada.'),0);
$pdf->Ln(25);
$pdf->Cell (83,5,iconv("UTF-8", "ISO-8859-1",'___________________________'),0,0,'C');
$pdf->Cell (83,5,iconv("UTF-8", "ISO-8859-1",'___________________________'),0,0,'C');
$pdf->Ln(7);
$pdf->Cell (83,5,iconv("UTF-8", "ISO-8859-1",$dataInstitution['NombreDirector']),0,0,'C');
$pdf->Cell (83,5,iconv("UTF-8", "ISO-8859-1",$dataInstitution['NombreBibliotecario']),0,0,'C');
$pdf->Ln(7);
$pdf->Cell (83,5,iconv("UTF-8", "ISO-8859-1",'Director'),0,0,'C');
$pdf->Cell (83,5,iconv("UTF-8", "ISO-8859-1",'Bibliotecario/a'),0,0,'C');
$pdf->Output('N-'.$loanCode,'I');

mysqli_free_result($selectLoan);
mysqli_free_result($selectBook);
mysqli_free_result($selectInstitution);
mysqli_free_result($selectUserKey);
mysqli_free_result($selectUser);
mysqli_free_result($selectRepresentative);
mysqli_free_result($selectSection);
mysqli_free_result($selectTeacher);
?>

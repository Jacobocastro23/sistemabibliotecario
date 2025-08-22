<?php
set_time_limit(600);

$userType=consultasSQL::CleanStringText($_GET['user']);
if($userType=="Teacher"){ $tableUser="prestamodocente"; $userType="docentes"; $tableUser2="docente"; $key="DUI"; }
if($userType=="Student"){ $tableUser="prestamoestudiante"; $userType="estudiantes"; $tableUser2="estudiante"; $key="NIE"; }
if($userType=="Visitor"){ $tableUser="prestamovisitante"; $userType="visitantes"; }
if($userType=="Personal"){ $tableUser="prestamopersonal"; $userType="personal administrativo"; $tableUser2="personal"; $key="DUI"; }

$selectInstitution=ejecutarSQL::consultar("SELECT * FROM institucion");
$dataInstitution=mysqli_fetch_array($selectInstitution, MYSQLI_ASSOC);

$objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()
        ->setCreator($dataInstitution['Nombre'])
        ->setLastModifiedBy($dataInstitution['Nombre'])
        ->setTitle("Reporte de devoluciones pendientes")
        ->setSubject("Devoluciones pendientes")
        ->setDescription("Listado de devoluciones pendientes")
        ->setKeywords("excel phpexcel php")
        ->setCategory("Devoluciones");

$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle('Devoluciones '.$dataInstitution['Year']);

if($userType=="docentes" || $userType=="estudiantes"){
    $objPHPExcel->getActiveSheet()->setCellValue('A1', 'SECCIÓN');
}else{
    $objPHPExcel->getActiveSheet()->setCellValue('A1', '#');
}
$objPHPExcel->getActiveSheet()->setCellValue('B1', 'CÓDIGO LIBRO');
$objPHPExcel->getActiveSheet()->setCellValue('C1', 'TÍTULO LIBRO');
$objPHPExcel->getActiveSheet()->setCellValue('D1', 'SOLICITANTE');
$objPHPExcel->getActiveSheet()->setCellValue('E1', 'F. SOLICITUD');
$objPHPExcel->getActiveSheet()->setCellValue('F1', 'F. ENTREGA');

$selALoansP=ejecutarSQL::consultar("SELECT * FROM prestamo WHERE Estado='Prestamo' ORDER BY FechaSalida ASC");
$CC=2;

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

        if($userType=="docentes" || $userType=="estudiantes"){
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$CC, $usDataSec['Nombre']);
        }else{
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$CC, ($CC-1));;
        }

        if($userType=="docentes"){
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$CC, "Ver Ficha");
        }else{
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$CC, $datB['CodigoLibroManual']);
        }

        $objPHPExcel->getActiveSheet()->setCellValue('C'.$CC, $datB['Titulo']);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$CC, $NameUser);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$CC, $SelectDateFS);
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$CC, $SelectDateFE);

        mysqli_free_result($selDUser);
        mysqli_free_result($selBo);

        $CC++;
    }
    mysqli_free_result($selL);
}
mysqli_free_result($selALoansP);
mysqli_free_result($selectInstitution);


$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));

if(is_file("../report/ReportLoansPendingEX.xlsx")){


    echo '
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <a href="../report/ReportLoansPendingEX.xlsx" download="Reporte_Devoluciones.xlsx" class="full-reset report-content">
                    <p class="text-center">
                        <i class="zmdi zmdi-cloud-download zmdi-hc-5x"></i>
                    </p>
                    <h3 class="text-center">Descargar Reporte Generado</h3>
                </a>
            </div>
        </div>
    ';
}else{
    echo '
        <p class="lead text-center"><i class="zmdi zmdi-close-circle"></i> Error: No se pudo generar el reporte de Excel</p>
    ';
}
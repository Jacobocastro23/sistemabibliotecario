<!DOCTYPE html>
<html lang="es">
<head>
    <title>Reportes</title>
    <?php
        session_start();
        $LinksRoute="../";
        include '../inc/links.php'; 
    ?>
    <link rel="stylesheet" href="../css/timeline.css">
    <script>
        $(document).ready(function(){
            $('.btn-file').on('click', function(){
                var file; var uTipe; var urlData; var title1; var text1; var text2; var file_type=$(this).attr('data-type');
                if(file_type==="file"){
                    file=$(this).attr('data-file');
                    urlData='../process/checkInstitution.php';
                    title1="¿Quieres generar la ficha?";
                    text1="La ficha se generará en formato PDF y se abrirá en una ventana nueva. Debes esperar un lapso de tiempo de 15 segundos para que el sistema genere la ficha";
                }
                if(file_type==="report"){
                    file=$(this).attr('data-file');
                    title1="¿Quieres generar el reporte?";
                    text1="El reporte se generará en formato PDF y se abrirá en una ventana nueva. Debes esperar entre 3 a 7 minutos para que el sistema genere el reporte";
                }
                if(file_type==="reportLP"){
                    uTipe=$(this).attr('data-user');
                    file='../report/ReportLoansPending.php?user='+uTipe;
                    title1="¿Quieres generar el reporte en PDF?";
                    text1="El reporte de devoluciones pendientes se generará en formato PDF y se abrirá en una ventana nueva. Debes esperar entre 3 a 7 minutos para que el sistema genere el reporte";
                }
                swal({
                    title: title1,
                    text: text1,
                    type: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#31B0D5",
                    confirmButtonText: "Si, generar",
                    cancelButtonText: "No, cancelar",
                    animation: "slide-from-top",
                    closeOnConfirm: false
                },function(){
                    window.open(file,"_blank");
                    swal.close();
                }); 
            });

            $('.btnLoans').on('click', function(){
                var Ltype=$(this).attr('data-type');
                var Year=$('#'+Ltype).val();
                if(Year!=null && Year!="" && Year>=2018){

                    if(Ltype=="yearU"){
                        var file="../report/ReportAllLoans.php?Year="+Year;
                    }else{
                        if(Ltype=="yearLP"){
                            Ltype="Prestamo";
                        }else if(Ltype=="yearLD"){
                            Ltype="Entregado";
                        }else{
                            Ltype="Prestamo";
                        }
                        var file="../report/ReportAllLoansBySection.php?Loans="+Ltype+"&Year="+Year;
                    }

                    
                    swal({
                        title: "¿Quieres generar el reporte en PDF?",
                        text: "El reporte se generará en formato PDF y se abrirá en una ventana nueva. Debes esperar entre 3 a 7 minutos para que el sistema genere el reporte",
                        type: "info",
                        showCancelButton: true,
                        confirmButtonColor: "#31B0D5",
                        confirmButtonText: "Si, generar",
                        cancelButtonText: "No, cancelar",
                        animation: "slide-from-top",
                        closeOnConfirm: false
                    },function(){
                        window.open(file,"_blank");
                        swal.close();
                    });
                    
                }else{
                    swal({ 
                        title:"¡Ocurrió un error inesperado!", 
                        text:"Escriba el año en la casilla correspondiente para generar el reporte. El año tiene que ser mayor o igual a 2018", 
                        type: "error", 
                        confirmButtonText: "Aceptar" 
                    });
                }
            });

            $('.sectionR').on('click', function(){
                var section=$('#sectionRS').val();
                if(section!=null && section!=""){
                    swal({
                        title: "¿Quieres generar el reporte en PDF?",
                        text: "El reporte de devoluciones pendientes por sección se generará en formato PDF y se abrirá en una ventana nueva. Debes esperar entre 3 a 7 minutos para que el sistema genere el reporte",
                        type: "info",
                        showCancelButton: true,
                        confirmButtonColor: "#31B0D5",
                        confirmButtonText: "Si, generar",
                        cancelButtonText: "No, cancelar",
                        animation: "slide-from-top",
                        closeOnConfirm: false
                    },function(){
                        window.open('../report/ReportLoansPendingS.php?section='+section,"_blank");
                        swal.close();
                    });
                }else{
                    swal({ 
                        title:"¡Ocurrió un error inesperado!", 
                        text:"Seleccione una sección para continuar", 
                        type: "error", 
                        confirmButtonText: "Aceptar" 
                    });
                }
            });

            $('.catR').on('click', function(){
                var cat=$('#catRS').val();
                if(cat!=null && cat!=""){
                    swal({
                        title: "¿Quieres generar el reporte en PDF?",
                        text: "El reporte de devoluciones pendientes por categoría se generará en formato PDF y se abrirá en una ventana nueva. Debes esperar entre 3 a 7 minutos para que el sistema genere el reporte",
                        type: "info",
                        showCancelButton: true,
                        confirmButtonColor: "#31B0D5",
                        confirmButtonText: "Si, generar",
                        cancelButtonText: "No, cancelar",
                        animation: "slide-from-top",
                        closeOnConfirm: false
                    },function(){
                        window.open('../report/ReportLoansPendingC.php?cat='+cat,"_blank");
                        swal.close();
                    });
                }else{
                    swal({ 
                        title:"¡Ocurrió un error inesperado!", 
                        text:"Seleccione una categoría para continuar", 
                        type: "error", 
                        confirmButtonText: "Aceptar" 
                    });
                }
            });

            $('.bitacoraR').on('click', function(){
                var BTtype=$('#BTtype').val();
                var BTtotal=$('#BTtotal').val();
                if(BTtype!=null && BTtype!="" && BTtotal!=null && BTtotal!=""){
                    var file="../report/bitacora.php?Type="+BTtype+"&Total="+BTtotal;
                    swal({
                        title: "¿Quieres generar el reporte en PDF?",
                        text: "El reporte se generará en formato PDF y se abrirá en una ventana nueva. Debes esperar entre 3 a 7 minutos para que el sistema genere el reporte",
                        type: "info",
                        showCancelButton: true,
                        confirmButtonColor: "#31B0D5",
                        confirmButtonText: "Si, generar",
                        cancelButtonText: "No, cancelar",
                        animation: "slide-from-top",
                        closeOnConfirm: false
                    },function(){
                        window.open(file,"_blank");
                        swal.close();
                    });
                }else{
                    swal({ 
                        title:"¡Ocurrió un error inesperado!", 
                        text:"Por favor elija el tipo de usuario y la cantidad de registros para poder continuar", 
                        type: "error", 
                        confirmButtonText: "Aceptar" 
                    });
                }
            });
        });
    </script>
</head>
<body>
    <?php 
        include '../library/configServer.php';
        include '../library/consulSQL.php';
        include '../library/SelectMonth.php';
        include '../process/SecurityAdmin.php';
        include '../inc/NavLateral.php';
    ?>
    <div class="content-page-container full-reset scroll">
        <?php 
            include '../inc/NavUserInfo.php';
        ?>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Sistema bibliotecario <small>Reportes y estadísticas</small></h1>
            </div>
        </div>
        <div class="container-fluid">
            <ul class="nav nav-tabs nav-justified" role="tablist">
                <li role="presentation" class="active"><a href="#reports" aria-controls="reports" role="tab" data-toggle="tab">Reportes y fichas</a></li>
                <li role="presentation"><a href="#bitacora" aria-controls="bitacora" role="tab" data-toggle="tab">Bitácora</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="reports">
                    <div class="container-fluid"  style="margin: 50px 0;">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-3">
                                <img src="../assets/img/pdf.png" alt="pdf" class="img-responsive center-box" style="max-width: 120px;">
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                                Bienvenido al área de reportes, aquí puedes generar fichas de préstamos vacías de estudiantes, docentes o visitantes en formato pdf, también puedes generar reportes de inventario entre otros.
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="page-header">
                              <h2 class="all-tittles">fichas <small>vacías</small></h2>
                            </div><br>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-file-text zmdi-hc-5x btn-file" data-file="../report/fichaEN.php" data-type="file"></i>
                                    </p>
                                    <h3 class="text-center">Ficha estudiante</h3>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-file-text zmdi-hc-5x btn-file" data-file="../report/fichaDN.php" data-type="file"></i>
                                    </p>
                                    <h3 class="text-center">Ficha docente</h3>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-file-text zmdi-hc-5x btn-file" data-file="../report/fichaPN.php" data-type="file"></i>
                                    </p>
                                    <h3 class="text-center">Ficha personal administrativo</h3>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-file-text zmdi-hc-5x btn-file" data-file="../report/fichaVN.php" data-type="file"></i>
                                    </p>
                                    <h3 class="text-center">Ficha visitante</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="page-header">
                              <h2 class="all-tittles">reportes <small>generales</small></h2>
                            </div><br>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-trending-up zmdi-hc-5x btn-file" data-file="../report/ReportGeneral.php" data-type="report"></i>
                                    </p>
                                    <h3 class="text-center">General de Inventario</h3>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-trending-up zmdi-hc-5x btn-file" data-file="../report/ReportBookCategories.php" data-type="report"></i>
                                    </p>
                                    <h3 class="text-center">Total Libros por Categoría</h3>
                                </div>
                            </div>
                            <!-- <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-trending-up zmdi-hc-5x btnLoans" data-type="yearU"></i>
                                    </p>
                                    <h3 class="text-center">Préstamos entregados (Usuarios)</h3>
                                </div>
                                <div class="group-material">
                                    <input type="number" placeholder="Año del reporte" class="tooltips-general material-control" id="yearU" data-toggle="tooltip" data-placement="top" title="Escriba el año para generar el reporte">
                                </div>
                            </div> -->
                            <!-- <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-trending-up zmdi-hc-5x btnLoans" data-type="yearLD"></i>
                                    </p>
                                    <h3 class="text-center">Préstamos entregados (Sección)</h3>
                                </div>
                                <div class="group-material">
                                    <input type="number" placeholder="Año del reporte" class="tooltips-general material-control" id="yearLD" data-toggle="tooltip" data-placement="top" title="Escriba el año para generar el reporte">
                                </div>
                            </div> -->
                            <!-- <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-trending-up zmdi-hc-5x btnLoans" data-type="yearLP"></i>
                                    </p>
                                    <h3 class="text-center">Préstamos pendientes (Sección)</h3>
                                </div>
                                <div class="group-material">
                                    <input type="number" placeholder="Año del reporte" class="tooltips-general material-control" id="yearLP" data-toggle="tooltip" data-placement="top" title="Escriba el año para generar el reporte">
                                </div>
                            </div> -->
                        </div>
<<<<<<< HEAD
                        <!-- <div class="row">
=======
                        <div class="row">
>>>>>>> 2982a2b8fcadcb4714a8d27c107d0bcc15c0d2d1
                            <div class="page-header">
                                <h2 class="all-tittles">reportes <small>devoluciones pendientes (PDF)</small></h2>
                            </div><br>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-calendar-close zmdi-hc-5x btn-file" data-type="reportLP" data-user="Teacher"></i>
                                    </p>
                                    <h3 class="text-center">Docentes</h3>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-calendar-close zmdi-hc-5x btn-file" data-type="reportLP" data-user="Personal"></i>
                                    </p>
                                    <h3 class="text-center">Personal Administrativo</h3>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-calendar-close zmdi-hc-5x btn-file" data-type="reportLP" data-user="Student"></i>
                                    </p>
                                    <h3 class="text-center">Estudiantes</h3>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-calendar-close zmdi-hc-5x btn-file" data-type="reportLP" data-user="Visitor"></i>
                                    </p>
                                    <h3 class="text-center">Visitantes</h3>
                                </div>
                            </div>
<<<<<<< HEAD
                        </div> -->
                        <!-- <div class="row">
=======
                        </div>
                        <div class="row">
>>>>>>> 2982a2b8fcadcb4714a8d27c107d0bcc15c0d2d1
                            <div class="page-header">
                                <h2 class="all-tittles">reportes <small>devoluciones pendientes (EXCEL)</small></h2>
                            </div><br>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <a href="./adminreportexcel.php?user=Teacher" class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-calendar-close zmdi-hc-5x"></i>
                                    </p>
                                    <h3 class="text-center">Docentes</h3>
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <a href="./adminreportexcel.php?user=Personal" class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-calendar-close zmdi-hc-5x"></i>
                                    </p>
                                    <h3 class="text-center">Personal Administrativo</h3>
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <a href="./adminreportexcel.php?user=Student" class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-calendar-close zmdi-hc-5x"></i>
                                    </p>
                                    <h3 class="text-center">Estudiantes</h3>
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <a href="./adminreportexcel.php?user=Visitor" class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-calendar-close zmdi-hc-5x"></i>
                                    </p>
                                    <h3 class="text-center">Visitantes</h3>
                                </a>
                            </div>
<<<<<<< HEAD
                        </div> -->
                        <div class="row">
                            <div class="page-header">
                                <h2 class="all-tittles">reportes <small>devoluciones pendientes de estudiantes por categoría (PDF)</small></h2>
                            </div><br>
                            <!-- <div class="col-xs-12 col-sm-6 col-md-4">
=======
                        </div>
                        <div class="row">
                            <div class="page-header">
                                <h2 class="all-tittles">reportes <small>devoluciones pendientes de estudiantes por sección y categoría (PDF)</small></h2>
                            </div><br>
                            <div class="col-xs-12 col-sm-6 col-md-4">
>>>>>>> 2982a2b8fcadcb4714a8d27c107d0bcc15c0d2d1
                                <div class="group-material">
                                    <span class="text-uppercase"><i class="zmdi zmdi-assignment-account"></i> &nbsp; reporte por sección</span>
                                    <select class="tooltips-general material-control" id="sectionRS" data-toggle="tooltip" data-placement="top" title="Elige una seccion">
                                        <option value="" disabled="" selected="">Selecciona una sección</option>
                                        <?php
                                            $selSect= ejecutarSQL::consultar("SELECT * FROM seccion");
                                            while($fila=mysqli_fetch_array($selSect, MYSQLI_ASSOC)){
                                                echo '<option value="'.$fila['CodigoSeccion'].'">'.$fila['Nombre'].'</option>'; 
                                            }
                                            mysqli_free_result($selSect);
                                        ?>
                                    </select>
<<<<<<< HEAD
                                </div> -->
                                <!-- <a class="full-reset report-content">
=======
                                </div>
                                <a class="full-reset report-content">
>>>>>>> 2982a2b8fcadcb4714a8d27c107d0bcc15c0d2d1
                                    <p class="text-center">
                                        <i class="zmdi zmdi-assignment-account zmdi-hc-5x sectionR"></i>
                                    </p>
                                    <h3 class="text-center">Generar reporte por sección</h3>
<<<<<<< HEAD
                                </a> -->
=======
                                </a>
>>>>>>> 2982a2b8fcadcb4714a8d27c107d0bcc15c0d2d1
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="group-material">
                                    <span class="text-uppercase"><i class="zmdi zmdi-bookmark-outline"></i> &nbsp; reporte por categoría</span>
                                    <select class="tooltips-general material-control" id="catRS" data-toggle="tooltip" data-placement="top" title="Elige una categoría">
                                        <option value="" disabled="" selected="">Selecciona una categoría</option>
                                        <?php
                                            $selCat= ejecutarSQL::consultar("SELECT * FROM categoria");
                                            while($filaC=mysqli_fetch_array($selCat, MYSQLI_ASSOC)){
                                                echo '<option value="'.$filaC['CodigoCategoria'].'">'.$filaC['Nombre'].'</option>'; 
                                            }
                                            mysqli_free_result($selCat);
                                        ?>
                                    </select>
                                </div>
                                <a class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-bookmark-outline zmdi-hc-5x catR"></i>
                                    </p>
                                    <h3 class="text-center">Generar reporte por categoría</h3>
                                </a>
                            </div>
                        </div>
<<<<<<< HEAD
                        <!-- <div class="row">
=======
                        <div class="row">
>>>>>>> 2982a2b8fcadcb4714a8d27c107d0bcc15c0d2d1
                            <div class="page-header">
                                <h2 class="all-tittles">reportes <small>Bitácora (PDF)</small></h2>
                            </div><br>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="group-material">
                                    <span>Tipo de usuario</span>
                                    <select class="tooltips-general material-control" id="BTtype" data-toggle="tooltip" data-placement="top" title="Elige una seccion">
                                        <option value="" disabled="" selected="">Selecciona una opción</option>
                                        <option value="Admin">Administrador</option>
                                        <option value="Teacher">Docente</option>
                                        <option value="Student">Estudiante</option>
                                        <option value="Personal">Personal Administrativo</option>
                                    </select>
                                </div>
                                <div class="group-material">
                                    <span>Cantidad de registros</span>
                                    <select class="tooltips-general material-control" id="BTtotal" data-toggle="tooltip" data-placement="top" title="Elige una seccion">
                                        <option value="" disabled="" selected="">Selecciona una opción</option>
                                        <option value="10">10</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                                <a class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-timer zmdi-hc-5x bitacoraR"></i>
                                    </p>
                                    <h3 class="text-center">Generar reporte de bitácora</h3>
                                </a>
                            </div>
                        </div>
<<<<<<< HEAD
                    </div> -->
=======
                    </div>
>>>>>>> 2982a2b8fcadcb4714a8d27c107d0bcc15c0d2d1
                </div>
                <div role="tabpanel" class="tab-pane fade" id="bitacora">
                    <div class="container-fluid"  style="margin: 50px 0;">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-3">
                                <img src="../assets/img/user-sesion.png" alt="users-sesion" class="img-responsive center-box" style="max-width: 120px;">
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                                Bienvenido al área de bitácora, aquí se muestran los registros de los últimos 15 usuarios (personal administrativo, docentes, administradores y estudiantes) que han iniciado sesión en el sistema. Recuerda eliminar los registros de la bitácora cada año para que el sistema funcione correctamente.
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid"><?php include '../inc/bitacora.php'; ?></div>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                </div>
                <div class="modal-body">
                    <?php include '../help/help-adminreport.php'; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                </div>
            </div>
          </div>
        </div>
        <?php include '../inc/footer.php'; ?>
    </div>
</body>
</html>
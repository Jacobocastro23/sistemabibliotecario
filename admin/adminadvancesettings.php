<!DOCTYPE html>
<html lang="es">
<head>
    <title>Configuraciones avanzadas</title>
    <?php
        session_start();
        $LinksRoute="../";
        include '../inc/links.php'; 
    ?>
    <script src="../js/SendForm.js"></script>
    <style>
        body {
            background-color: #f0f8f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .all-tittles {
            text-transform: uppercase;
        }
        .nav-tabs > li.active > a {
            background-color: #28a745;
            color: white;
            font-weight: bold;
        }
        .nav-tabs > li > a {
            color: #28a745;
        }
        .nav-tabs > li > a:hover {
            color: #1e7e34;
        }
        .report-content {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
            margin: 15px;
            padding: 30px 20px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .report-content:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0,0,0,0.15);
        }
        .report-content i {
            font-size: 3rem;
            cursor: pointer;
            transition: transform 0.3s, color 0.3s;
        }
        .report-content i:hover {
            transform: scale(1.2);
        }
        .report-content i.btn-delete {
            color: #dc3545;
        }
        .report-content i.btn-backup {
            color: #28a745;
        }
        .report-content i.btn-restore {
            color: #17a2b8;
        }
        .report-content h3 {
            margin-top: 15px;
            font-weight: bold;
            color: #333;
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .material-control {
            border-bottom: 2px solid #28a745;
        }
        .material-control:focus {
            border-bottom: 2px solid #218838;
            box-shadow: none;
        }
        /* Contenedor de íconos de seguridad */
        .section-header i {
            font-size: 4rem;
            margin-bottom: 10px;
        }
        .section-header p {
            margin: 0;
        }
        .lead {
            font-size: 1.1rem;
            color: #555;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('.btn-backup').on('click', function(){
                swal({  
                    title: "¿Quieres realizar la copia?",   
                    text: "La copia de seguridad quedará guardada en el sistema. Podrás restaurar el sistema al punto actual en caso de fallas",   
                    type: "info",   
                    showCancelButton: true,   
                    closeOnConfirm: false,   
                    showLoaderOnConfirm: true,    
                    cancelButtonText: "Cancelar",
                    confirmButtonText: "Realizar copia",
                    animation: "slide-from-top"
                }, function(){       
                    $.ajax({
                        url:"../process/Backup.php",
                        success:function(data){
                            if(data==="success"){
                                swal({ 
                                    title:"¡Copia de seguridad realizada!", 
                                    text:"La copia de seguridad se realizó con éxito, podrás recuperar el sistema al estado actual si lo deseas", 
                                    type: "success", 
                                    confirmButtonText: "Aceptar" 
                                }, function(){ location.reload(); });
                            }else{
                                swal({
                                   title:"¡Ocurrió un error inesperado!",
                                   text:"No se pudo completar la acción",
                                   type: "error",
                                   confirmButtonText: "Aceptar"
                                });
                            }
                        }
                    });
                    return false;
                });  
            });

            $('.btn-restore').on('click', function(){
                $('#ModalRestore').modal({ show: true, backdrop: "static" });
            });

            $('.btn-delete').on('click', function(){
                var process=$(this).attr('data-process');
                var text_modal=$(this).attr('data-text');
                var type_form=$(this).attr('data-type');
                $('#text-modal').html(text_modal);
                $('#FORMSRCB').attr('action',process).attr('data-type-form',type_form);
                $('#ModalDeleteAll').modal({ show: true, backdrop: "static" });
            });
        });
    </script>
</head>
<body>
    <?php 
        include '../library/configServer.php';
        include '../library/consulSQL.php';
        include '../process/SecurityAdmin.php';
        include '../inc/NavLateral.php';
    ?>
    <div class="content-page-container full-reset scroll">
        <?php include '../inc/NavUserInfo.php'; ?>
        <div class="container">
            <div class="page-header">
                <h1 class="all-tittles">Sistema bibliotecario <small>configuraciones avanzadas</small></h1>
            </div>
        </div>

        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li role="presentation" class="active"><a href="#security" aria-controls="security" role="tab" data-toggle="tab">Seguridad</a></li>
            <li role="presentation"><a href="#others" aria-controls="others" role="tab" data-toggle="tab">Otras opciones</a></li>
        </ul>

        <!-- SECCIÓN DE SEGURIDAD -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="security">
                <div class="container text-center section-header my-5">
                    <i class="zmdi zmdi-shield-security text-success"></i>
                    <p class="lead">Realiza copias de seguridad de la base de datos y restaura el sistema a un punto anterior.</p>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="report-content">
                                <i class="zmdi zmdi-cloud-download btn-backup"></i>
                                <h3>Realizar copia de seguridad</h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="report-content">
                                <i class="zmdi zmdi-cloud-upload btn-restore"></i>
                                <h3>Restaurar el sistema</h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="report-content">
                                <i class="zmdi zmdi-cloud-off btn-delete" data-process="../process/DeleteBackups.php" data-text="todas las copias de seguridad" data-type="deleteBackup"></i>
                                <h3>Borrar copias de seguridad</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SECCIÓN DE OTRAS OPCIONES -->
            <div role="tabpanel" class="tab-pane fade" id="others">
                <div class="container text-center section-header my-5">
                    <i class="zmdi zmdi-fire text-warning"></i>
                    <p class="lead">Opciones avanzadas para eliminar grandes cantidades de datos del sistema. Selecciona la opción que deseas eliminar.</p>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="report-content">
                                <i class="zmdi zmdi-calendar-close btn-delete" data-process="../process/DeleteAllLoans.php" data-text="todos los préstamos" data-type="delete"></i>
                                <h3>Eliminar préstamos</h3>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="report-content">
                                <i class="zmdi zmdi-male-alt btn-delete" data-process="../process/DeleteAllUsers.php?userType=Teacher" data-text="todos los docentes" data-type="delete"></i>
                                <h3>Eliminar docentes</h3>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="report-content">
                                <i class="zmdi zmdi-accounts-alt btn-delete" data-process="../process/DeleteAllUsers.php?userType=Student" data-text="todos los estudiantes" data-type="delete"></i>
                                <h3>Eliminar estudiantes</h3>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="report-content">
                                <i class="zmdi zmdi-male-female btn-delete" data-process="../process/DeleteAllUsers.php?userType=Personal" data-text="todo el personal administrativo" data-type="delete"></i>
                                <h3>Eliminar personal administrativo</h3>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="report-content">
                                <i class="zmdi zmdi-book btn-delete" data-process="../process/DeleteAllBooks.php" data-text="todos los libros" data-type="delete"></i>
                                <h3>Eliminar libros</h3>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="report-content">
                                <i class="zmdi zmdi-time-restore-setting btn-delete" data-process="../process/DeleteBitacora.php" data-text="registros de bitacora" data-type="delete"></i>
                                <h3>Eliminar bitácora</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


       
    </div>
</body>
</html>

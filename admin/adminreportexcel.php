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
            <p class="text-right">
                <a href="adminreport.php" class="btn btn-primary btn-sm"> <i class="zmdi zmdi-long-arrow-return"></i> &nbsp; Ver todos los reportes</a>
            </p>
        </div>
        <div class="container-fluid">
            <?php 
                if($_GET['user']=="Teacher" || $_GET['user']=="Student" || $_GET['user']=="Visitor" || $_GET['user']=="Personal"){

                    require '../report/Classes/PHPExcel.php';
                    include '../report/ReportLoansPendingEX.php';

                }else{
                    echo '
                        <p class="lead text-center"><i class="zmdi zmdi-close-circle"></i> Ocurrio un error inesperado, por favor intente nuevamente</p>
                    ';
                }
            ?>
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
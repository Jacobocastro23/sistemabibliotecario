<!DOCTYPE html>
<html lang="es">
<head>
    <title>Prestamos multiples</title>
    <?php
        session_start();
        $LinksRoute="./";
        include './inc/links.php'; 
    ?>
    <link rel="stylesheet" href="css/jquery.datetimepicker.css">
    <script src="js/SendForm.js"></script>
    <script src="js/jquery.datetimepicker.js"></script>
</head>
<body>
    <?php 
        include './library/configServer.php';
        include './library/consulSQL.php';
        if (!$_SESSION['UserPrivilege']=='Admin' && $_SESSION['SessionToken']=="") {
            header("Location: process/logout.php");
            exit();
        }
        include './inc/NavLateral.php';
    ?>
    <div class="content-page-container full-reset scroll">
        <?php 
            include './inc/NavUserInfo.php';
        ?>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Sistema bibliotecario <small>Préstamos Múltiples</small></h1>
            </div>
        </div>
        <p class="container lead">
            Bienvenido a la sección de préstamos múltiples, primero elija todos los libros que va a prestar, luego digite el código del usuario y elija el tipo de usuario que es.
        </p>
        <div class="container">
            <div class="page-header">
              <h1><i class="zmdi zmdi-search-for"></i> Buscar libro</h1>
            </div>
        </div>
        <br>
        <div class="container-fluid" style="margin-bottom: 70px;">
            <p>
                <strong>Elija un modo para buscar el libro y agregarlo al carrito:</strong><br><br>
                <strong>Manual</strong> Deberá de introducir el código del libro, a continuación en el formulario siguiente seleccionar la cantidad de libros a prestar, la fecha de entrega y salida del préstamo.<br><br>
                <strong>Automático</strong> Introduzca el código del libro y se agregara automáticamente al carrito con la cantidad de libros de 1 y la fecha actual del sistema.<br><br>
            </p>
            <ul class="nav nav-pills nav-justified">
              <li role="presentation"><a href="multipleloans.php">Manual</a></li>
              <li role="presentation" class="active"><a href="multipleloans2.php">Automático</a></li>
            </ul>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-offset-2">
                    <form action="" method="POST" autocomplete="off">
                        <input type="hidden" name="addBookMethod" value="auto">
                        <div class="row">
                            <div class="col-xs-12 col-md-8">
                                <div class="group-material">
                                    <input type="text" class="material-control" name="bookCodePm" placeholder="Codigo del libro" required="">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Código del libro</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <div class="group-material">
                                    <input type="submit" class="btn btn-primary btn-block" value="Agregar libro">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php 
            $currentDateForm=date("d.m.Y");
            if(isset($_POST['bookCodePm'])){
                include "./process/AddToPm.php";
            }
        ?>
        <section class="full-reset">
            <div class="container-fluid">
                <div class="row">
                    <?php  
                        if(isset($_POST['propresmulaction']) && isset($_SESSION['prestmultiple'])){
                            include "./process/processMultipleLoans.php";
                        }

                        if(isset($_POST['delpresmulaction'])){
                            unset($_SESSION['prestmultiple']);
                            echo '<script type="text/javascript">
                                swal({ 
                                    title:"¡Prestamos vaciados!", 
                                    text:"Los prestamos multiples se vaciaron con exito", 
                                    type: "success", 
                                    confirmButtonText: "Aceptar" 
                                });
                            </script>';
                        }
                    ?>
                    <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                        <div class="page-header">
                            <h1><i class="zmdi zmdi-shopping-cart"></i> Libros en el carrito</h1>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Cantidad</th>
                                    <th>Fecha Solicitud</th>
                                    <th>Fecha Entrega</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset($_SESSION['prestmultiple']) && count($_SESSION['prestmultiple'])>=1){
                                        foreach($_SESSION['prestmultiple'] as $databook){
                                            echo '  
                                                <tr>
                                                    <td>'.$databook['bookcode'].'</td>
                                                    <td>'.$databook['totalbooks'].'</td>
                                                    <td>'.$databook['startdate'].'</td>
                                                    <td>'.$databook['enddate'].'</td>
                                                </tr>
                                            ';
                                        }
                                    }else{
                                        echo '<tr><td colspan="4" class="text-center">No hay libros agregados</td></tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xs-12">
                        <div class="page-header">
                            <h1><i class="zmdi zmdi-shopping-basket"></i> Procesar o eliminar préstamos múltiples</h1>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Procesar préstamos múltiples</h3>
                            </div>
                            <div class="panel-body">
                                <form action="" method="POST" class="text-center" style="padding: 30px 0;">
                                    <input type="hidden" name="propresmulaction" value="1">
                                    <input type="hidden"  name="adminCode" value="<?php echo $_SESSION['primaryKey']; ?>">
                                    <div class="group-material">
                                        <input type="text" class="material-control" id="inputPersonals" placeholder="Codigo del usuario" name="userKey" required="">
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Codigo del usuario</label>
                                    </div>
                                    <div class="group-material">
                                        <span>Tipo de usuario</span>
                                        <select name="userType" class="material-control">
                                            <option value="Student">Estudiante</option>
                                            <option value="Teacher">Docente</option>
                                            <option value="Personal">Personal administrativo</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Procesar préstamos múltiples</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <h3 class="panel-title">Vaciar prestamos multiples</h3>
                            </div>
                            <div class="panel-body">
                                <form action="" method="POST" class="text-center">
                                    <input type="hidden" name="delpresmulaction">
                                    <button type="submit" class="btn btn-danger"><i class="zmdi zmdi-delete"></i> &nbsp;&nbsp; Vaciar prestamos multiples</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include './inc/footer.php'; ?>
    </div>
    <?php
        $checkYear=ejecutarSQL::consultar("SELECT * FROM institucion");
        $year=mysqli_fetch_array($checkYear, MYSQLI_ASSOC);
    ?>
    <script>
        $(document).ready(function(){
            var Year=<?php echo $year['Year']; ?>;
            $('.StarCalendarInput').on('blur', function(){
                var startCal=$(this).val();
                var datainput=$(this).attr('data-input');
                var idinput="inputEnd-"+datainput;
                if(startCal!==""){
                    $('#'+idinput).removeClass('material-input-disabled').attr('placeholder','Fecha de entrega');
                }
            });
            jQuery('.StarCalendarInput').datetimepicker({
                format:'d.m.Y',
                lang:'es',
                timepicker:false,
                minDate:'0',
                maxDate:Year+'/12/31',
                yearStart:Year,
                yearEnd:Year,
                scrollInput:false
            });
            jQuery('.EndCalendarInput').datetimepicker({
                format:'d.m.Y',
                lang:'es',
                timepicker:false,
                minDate:'0',
                maxDate:Year+'/12/31',
                yearStart:Year,
                yearEnd:Year,
                scrollInput:false
            });
            $('.search-box-icon').on('click', function(){
                var formDiv="#"+$(this).attr('data-id');
                if($(formDiv).css('display')=="none"){
                    $(formDiv).fadeIn();
                }else{
                    $(formDiv).fadeOut();
                }
            });
            $('.inputUsersearch').on('keyup', function(){
                var user=$(this).attr('data-user');
                var divRes="#"+$(this).attr('data-res');
                var Name=$(this).val();
                $.ajax({
                url:"process/SearchDataUsers.php?userType="+user+"&&Name="+Name,
                success:function(data){
                  $(divRes).html(data);
                }
              });
            });
        });
    </script>
    <?php 
        mysqli_free_result($checkYear);
    ?>
</body><style>
/* ================== Pestañas ================== */
.custom-tabs > li.active > a {
    background-color: #006400; /* verde bandera */
    color: #fff !important;
    border: 1px solid #004d00;
}
.custom-tabs > li > a {
    color: #006400;
    border: 1px solid #c8e6c9;
    background-color: #f1f8f1;
}
.custom-tabs > li > a:hover {
    background-color: #1f7a1f;
    color: #fff !important;
    border: 1px solid #004d00;
}

/* ================== Contenedores ================== */
.institution-box {
    background: #e8f5e9; /* verde muy claro */
    border: 1px solid #c8e6c9;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.12);
    transition: 0.3s;
}
.institution-box:hover {
    box-shadow: 0 10px 25px rgba(0,0,0,0.18);
}
.institution-box img {
    border: 3px solid #006400; /* borde verde bandera */
    border-radius: 50%;
    padding: 5px;
    background-color: #fff;
}
.institution-box .lead {
    color: #2e7d32;
    font-size: 16px;
    line-height: 1.6;
}

/* ================== Formulario ================== */
.container-flat-form {
    background: #fff;
    border-radius: 12px;
    padding: 25px;
    margin-bottom: 40px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    transition: 0.3s;
}
.container-flat-form:hover {
    box-shadow: 0 12px 28px rgba(0,0,0,0.18);
}
.title-flat-form {
    font-size: 20px;
    font-weight: bold;
    padding: 12px 15px;
    border-radius: 8px;
    margin-bottom: 20px;
    text-align: center;
    color: #fff;
}
.title-flat-blue, .title-flat-green {
    background-color: #006400; /* verde bandera */
}

/* Inputs */
.group-material {
    position: relative;
    margin-bottom: 25px;
}
.group-material input {
    font-size: 16px;
    padding: 10px 5px;
    display: block;
    width: 100%;
    border: none;
    border-bottom: 2px solid #ccc;
    background: transparent;
    transition: border-color 0.3s, box-shadow 0.3s;
    outline: none;
    border-radius: 4px 4px 0 0;
}
.group-material input:focus {
    border-bottom: 2px solid #006400;
    box-shadow: 0 2px 10px rgba(0,100,0,0.2);
}
.group-material label {
    position: absolute;
    top: 10px;
    left: 5px;
    font-size: 16px;
    color: #006400;
    pointer-events: none;
    transition: 0.3s;
}
.group-material input:focus + label,
.group-material input:not(:placeholder-shown) + label {
    top: -10px;
    font-size: 12px;
    color: #1f7a1f;
}

/* Botones */
.btn-flat {
    border-radius: 8px;
    padding: 10px 25px;
    font-weight: bold;
    transition: 0.3s;
}
.btn-primary.btn-flat, .btn-success.btn-flat {
    background-color: #006400;
    border: none;
    color: #fff;
}
.btn-primary.btn-flat:hover, .btn-success.btn-flat:hover {
    background: linear-gradient(45deg, #006400, #1f7a1f);
}

/* Paneles */
.panel-primary {
    border-color: #006400;
}
.panel-primary > .panel-heading {
    background-color: #006400;
    color: #fff;
}
.panel-danger {
    border-color: #b22222;
}
.panel-danger > .panel-heading {
    background-color: #b22222;
    color: #fff;
}

/* Tablas */
.table {
    border: 2px solid #006400;
}
.table th {
    background-color: #006400;
    color: white;
}
.table td {
    background-color: #e8f5e9;
}

/* Breadcrumb */
.breadcrumb li.active {
    color: #006400;
    font-weight: bold;
}

/* Animación para inputs */
.material-control {
    transition: all 0.3s ease;
}
</style>

</html>
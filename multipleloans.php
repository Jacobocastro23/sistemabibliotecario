<!DOCTYPE html>
<html lang="es">
<head>
<<<<<<< HEAD
    <title>Préstamos múltiples</title>
=======
    <title>Prestamos multiples</title>
>>>>>>> 2982a2b8fcadcb4714a8d27c107d0bcc15c0d2d1
    <?php
        session_start();
        $LinksRoute="./";
        include './inc/links.php'; 
    ?>
    <link rel="stylesheet" href="css/jquery.datetimepicker.css">
    <script src="js/SendForm.js"></script>
    <script src="js/jquery.datetimepicker.js"></script>
<<<<<<< HEAD

    <style>
    /* ================== Colores principales ================== */
    :root {
        --verde-principal: #006400; /* verde bandera */
        --verde-hover: #1f7a1f; /* verde brillante para hover */
        --verde-suave: #e8f5e9; /* verde muy claro para fondos */
    }

    /* ================== Body y textos ================== */
    body {
        background-color: var(--verde-suave);
        color: var(--verde-principal);
        font-family: 'Arial', sans-serif;
    }

    h1, h2, h3, h4, h5, h6 {
        color: var(--verde-principal);
    }

    /* ================== Pestañas ================== */
    .nav-pills > li.active > a {
        background-color: var(--verde-principal);
        color: #fff !important;
        border: 1px solid #004d00;
    }
    .nav-pills > li > a {
        color: var(--verde-principal);
        border: 1px solid #c8e6c9;
        background-color: #f1f8f1;
    }
    .nav-pills > li > a:hover {
        background-color: var(--verde-hover);
        color: #fff !important;
        border: 1px solid #004d00;
    }

    /* ================== Paneles ================== */
    .panel-primary {
        border-color: var(--verde-principal);
    }
    .panel-primary > .panel-heading {
        background-color: var(--verde-principal);
        color: white;
    }
    .panel-danger {
        border-color: #b22222;
    }
    .panel-danger > .panel-heading {
        background-color: #b22222;
        color: white;
    }

    /* ================== Tablas ================== */
    .table {
        border: 2px solid var(--verde-principal);
    }
    .table th {
        background-color: var(--verde-principal);
        color: white;
    }
    .table td {
        background-color: var(--verde-suave);
    }

    /* ================== Formularios ================== */
    .group-material {
        position: relative;
        margin-bottom: 25px;
    }
    .group-material input, .group-material select {
        font-size: 16px;
        padding: 10px 5px;
        width: 100%;
        border: none;
        border-bottom: 2px solid #ccc;
        background: transparent;
        outline: none;
        border-radius: 4px 4px 0 0;
        transition: border-color 0.3s, box-shadow 0.3s;
    }
    .group-material input:focus, .group-material select:focus {
        border-bottom: 2px solid var(--verde-principal);
        box-shadow: 0 2px 10px rgba(0,100,0,0.2);
    }
    .group-material label {
        position: absolute;
        top: 10px;
        left: 5px;
        font-size: 16px;
        color: var(--verde-principal);
        pointer-events: none;
        transition: 0.3s;
    }
    .group-material input:focus + label,
    .group-material input:not(:placeholder-shown) + label,
    .group-material select:focus + label {
        top: -10px;
        font-size: 12px;
        color: var(--verde-hover);
    }

    /* ================== Botones ================== */
    .btn-primary, .btn-success {
        background-color: var(--verde-principal);
        border: none;
        color: white;
        border-radius: 8px;
        font-weight: bold;
        transition: 0.3s;
    }
    .btn-primary:hover, .btn-success:hover {
        background: linear-gradient(45deg, var(--verde-principal), var(--verde-hover));
    }
    .btn-danger {
        background-color: #b22222;
        border: none;
        color: white;
    }
    .btn-danger:hover {
        background-color: #ff4500;
    }

    /* ================== Contenedores ================== */
    .container, .container-fluid, .content-page-container {
        background-color: var(--verde-suave);
        padding: 15px;
        border-radius: 12px;
    }

    /* ================== Breadcrumb ================== */
    .breadcrumb li.active {
        color: var(--verde-principal);
        font-weight: bold;
    }

    /* ================== Animaciones y efectos ================== */
    .material-control {
        transition: all 0.3s ease;
    }

    /* ================== Panel sombra ================== */
    .panel {
        box-shadow: 0 6px 15px rgba(0,0,0,0.12);
        border-radius: 12px;
    }
    </style>
=======
>>>>>>> 2982a2b8fcadcb4714a8d27c107d0bcc15c0d2d1
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
<<<<<<< HEAD
        <?php include './inc/NavUserInfo.php'; ?>
=======
        <?php 
            include './inc/NavUserInfo.php';
        ?>
>>>>>>> 2982a2b8fcadcb4714a8d27c107d0bcc15c0d2d1
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
              <li role="presentation" class="active"><a href="multipleloans.php">Manual</a></li>
              <li role="presentation"><a href="multipleloans2.php">Automático</a></li>
            </ul>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-offset-2">
                    <form action="" method="POST" autocomplete="off">
                        <div class="row">
                            <div class="col-xs-12 col-md-8">
                                <div class="group-material">
<<<<<<< HEAD
                                    <input type="text" class="material-control" name="bookCodeShopping" placeholder="Matricula" required="">
=======
                                    <input type="text" class="material-control" name="bookCodeShopping" placeholder="Codigo del libro" required="">
>>>>>>> 2982a2b8fcadcb4714a8d27c107d0bcc15c0d2d1
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Código del libro</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <div class="group-material">
                                    <input type="submit" class="btn btn-primary btn-block" value="Buscar libro">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<<<<<<< HEAD

=======
>>>>>>> 2982a2b8fcadcb4714a8d27c107d0bcc15c0d2d1
        <?php 
            if(isset($_POST['bookCodePm'])){
                include "./process/AddToPm.php";
            }
            $currentDateForm=date("d.m.Y");
        ?>
<<<<<<< HEAD

=======
>>>>>>> 2982a2b8fcadcb4714a8d27c107d0bcc15c0d2d1
        <div class="container-fluid">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title text-center"><i class="zmdi zmdi-shopping-cart-plus"></i> Agregar libro al carrito</h3>
                </div>
                <div class="panel-body">
                    <?php include "./process/AddBookShoppingKart.php" ?>
                </div>
            </div>
<<<<<<< HEAD
        </div>

=======

        </div>
>>>>>>> 2982a2b8fcadcb4714a8d27c107d0bcc15c0d2d1
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
<<<<<<< HEAD
                                    <input type="hidden" name="adminCode" value="<?php echo $_SESSION['primaryKey']; ?>">
                                    <div class="group-material">
                                        <input type="text" class="material-control" id="inputPersonals" placeholder="Matricula" name="userKey" required="">
=======
                                    <input type="hidden"  name="adminCode" value="<?php echo $_SESSION['primaryKey']; ?>">
                                    <div class="group-material">
                                        <input type="text" class="material-control" id="inputPersonals" placeholder="Codigo del usuario" name="userKey" required="">
>>>>>>> 2982a2b8fcadcb4714a8d27c107d0bcc15c0d2d1
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
<<<<<<< HEAD

=======
>>>>>>> 2982a2b8fcadcb4714a8d27c107d0bcc15c0d2d1
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
<<<<<<< HEAD
    <?php mysqli_free_result($checkYear); ?>
</body>
</html>
=======
    <?php 
        mysqli_free_result($checkYear);
    ?>
</body>
</html>
>>>>>>> 2982a2b8fcadcb4714a8d27c107d0bcc15c0d2d1

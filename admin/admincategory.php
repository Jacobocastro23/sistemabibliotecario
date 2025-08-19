<!DOCTYPE html>
<html lang="es">
<head>
    <title>Categorías</title>
    <?php
        session_start();
        $LinksRoute="../";
        include '../inc/links.php'; 
    ?>
    <script src="../js/SendForm.js"></script>

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
                <h1 class="all-tittles">Sistema bibliotecario <small>Administración Institución</small></h1>
            </div>
        </div>

        
<!-- Aqui se hace los contenedores  del administrador de institucion -->

        <div class="container-fluid">
            <ul class="nav nav-tabs nav-justified custom-tabs" style="font-size: 17px;">
              <li role="presentation"><a href="admininstitution.php">Institución</a></li>
              <li role="presentation"><a href="adminprovider.php">Proveedores</a></li>
              <li role="presentation"><a href="admincategory.php">Categorías</a></li>
              <!-- <li role="presentation"><a href="adminsection.php">Secciones</a></li> -->
            </ul>
        </div>

    

        <!-- Bienvenida -->
        <div class="container-fluid institution-box" style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3 text-center">
                    <br>
                    <img src="../assets/img/category.png" alt="categoría" class="img-responsive img-center" style="max-width: 120px;">
                </div>
                <br>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la sección para registrar nuevas categorías de libros. Completa el formulario a continuación para agregar una nueva categoría.
                </div>
            </div>
        </div>
        <!-- Breadcrumb -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb custom-breadcrumb">
                <li class="active">Nueva categoría</li>
                <li><a href="adminlistcategory.php">Listado de categorías</a></li>
            </ol>
        </div>
    </div>
</div>


        <!-- Formulario -->
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form">Agregar una nueva categoría</div>
                <form action="../process/AddCategory.php" method="post" class="form_SRCB" data-type-form="save" autocomplete="off">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <legend class="all-tittles">CÓDIGO/NOMBRE</legend><br>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input type="text" class="material-control" placeholder="Código de categoría" name="categoryCode" required pattern="[0-9]{1,20}" maxlength="20">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input type="text" class="material-control" placeholder="Nombre de la categoría" name="categoryName" required pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,50}" maxlength="50">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                           <div class="col-xs-12 text-center">
                                <button type="reset" class="btn btn-info mr-3"><i class="zmdi zmdi-roller"></i> Limpiar</button>
                                <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> Guardar</button>
                           </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="msjFormSend"></div>

        <!-- Modal ayuda -->
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    <h4 class="modal-title text-center all-tittles">Ayuda del sistema</h4>
                </div>
                <div class="modal-body">
                    <?php include '../help/help-admincategory.php'; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> De acuerdo</button>
                </div>
            </div>
          </div>
        </div>

      
    </div>
</body>
<style>
        /* ================== Pestañas ================== */
        .nav-tabs > li.active > a {
            background-color: #006400; /* verde bandera */
            color: #fff !important;
            border: 1px solid #004d00;
        }
        .nav-tabs > li > a {
            color: #006400;
            border: 1px solid #c8e6c9;
            background-color: #f1f8f1;
        }
        .nav-tabs > li > a:hover {
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
        .btn-info.btn-flat {
            background-color: #17a2b8;
            border: none;
            color: #fff;
        }
        .btn-info.btn-flat:hover {
            background: #138496;
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

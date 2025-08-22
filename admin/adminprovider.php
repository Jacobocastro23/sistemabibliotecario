<!DOCTYPE html>
<html lang="es">
<head>
    <title>Proveedores</title>
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
        <?php 
            include '../inc/NavUserInfo.php';
        ?>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Sistema bibliotecario <small>Administración Institución</small></h1>
            </div>
        </div>
        <div class="container-fluid">
            <ul class="nav nav-tabs nav-justified custom-tabs" style="font-size: 17px;">
              <li role="presentation"><a href="admininstitution.php">Institución</a></li>
              <li role="presentation"  class="active"><a href="adminprovider.php">Proveedores</a></li>
              <li role="presentation"><a href="admincategory.php">Categorías</a></li>
              <li role="presentation"><a href="adminsection.php">Grupos</a></li>
            </ul>
        </div>




        <div class="container-fluid provedor-box" style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3 text-center">
                    <img src="../assets/img/user04.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la sección para registrar un nuevo proveedor, debes de llenar todos los campos del siguiente formulario para poder registrar un proveedor
                </div>
            </div>
        </div>
<style>
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

/* ================== Contenedor Proveedor ================== */
.provedor-box {
    background: #e8f5e9; /* verde muy claro */
    border: 1px solid #c8e6c9;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.12);
    transition: 0.3s;
}
.provedor-box:hover {
    box-shadow: 0 10px 25px rgba(0,0,0,0.18);
}
.provedor-box img {
    border: 3px solid #006400; /* borde verde bandera */
    border-radius: 50%;
    padding: 5px;
    background-color: #fff;
}
.provedor-box .lead {
    color: #2e7d32; /* verde oscuro */
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
.title-flat-blue {
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

/* ================== Breadcrumb ================== */
.custom-breadcrumb {
    background-color: #f1f8f1; /* verde muy claro */
    border: 1px solid #c8e6c9;
    border-radius: 6px;
    padding: 10px 15px;
    font-size: 15px;
}
.custom-breadcrumb > li > a {
    color: #2e7d32;
    font-weight: 500;
    transition: color 0.3s ease;
}
.custom-breadcrumb > li > a:hover {
    color: #1b5e20;
    text-decoration: underline;
}
.custom-breadcrumb > .active {
    color: #fff;
    background-color: #2e7d32;
    padding: 4px 10px;
    border-radius: 4px;
    font-weight: bold;
}

/* Animación Inputs */
.material-control {
    transition: all 0.3s ease;
}
</style>




        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                      <li class="active">Nuevo proveedor</li>
                      <li><a href="adminlistprovider.php">Listado de proveedores</a></li>
                    </ol>
                </div>
            </div>
        </div>

<style>
/* -------------------
   Estilos Breadcrumb
-------------------- */
.custom-breadcrumb {
    background-color: #f1f8f1;   /* fondo verde claro */
    border: 1px solid #c8e6c9;   /* borde suave */
    border-radius: 6px;
    padding: 10px 15px;
    font-size: 15px;
}

.custom-breadcrumb > li > a {
    color: #2e7d32;              /* verde oscuro */
    font-weight: 500;
    transition: color 0.3s ease;
}

.custom-breadcrumb > li > a:hover {
    color: #1b5e20;              /* verde más fuerte al pasar */
    text-decoration: underline;
}

.custom-breadcrumb > .active {
    color: #fff;
    background-color: #2e7d32;   /* resaltado verde oscuro */
    padding: 4px 10px;
    border-radius: 4px;
    font-weight: bold;
}
</style>
<<<<<<< HEAD
<div class="container-fluid">
=======
















        <div class="container-fluid">
>>>>>>> 9cb6ae2 (Primer commit)
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Agregar un nuevo proveedor</div>
                <form action="../process/AddProvider.php" method="post" class="form_SRCB" data-type-form="save" autocomplete="off">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <legend class="all-tittles">NOMBRE DEL PROVEEDOR</legend><br>
                            </div>
                            <div class="col-xs-12">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general" placeholder="Nombre de proveedor" name="providerName" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe el nombre del proveedor">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Nombre</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <legend class="all-tittles">EMAIL/DIRECCIÓN/TELÉFONO</legend><br>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input type="email" class="material-control tooltips-general" placeholder="Email de proveedor" name="providerEmail" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe el Email del proveedor">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Email</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general" placeholder="Teléfono de proveedor" name="providerPhone" required="" pattern="[0-9+]{5,20}" maxlength="20" data-toggle="tooltip" data-placement="top" title="Solo números y símbolo +">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Teléfono</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general" placeholder="Dirección de proveedor" name="providerAddres" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Escribe la dirección del proveedor">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Dirección</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <legend class="all-tittles">RESPONSABLE DE ATENCIÓN</legend><br>
                            </div>
                            <div class="col-xs-12">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general" placeholder="Responsable de atención" name="providerResponsible" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Responsable de atención">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Responsable de atención</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                <p class="text-center">
                                    <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                    <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                                </p> 
                           </div>
                       </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="msjFormSend"></div>
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                </div>
                <div class="modal-body">
                    <?php include '../help/help-adminprovider.php'; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                </div>
            </div>
          </div>
        </div>
    </div>
</body>
</html>
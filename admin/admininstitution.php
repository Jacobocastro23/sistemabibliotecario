<!DOCTYPE html>
<html lang="es">
<head>
    <title>Institución</title>
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

<<<<<<< HEAD
Aqui se hace los contenedores  del administrador de institucion
=======
<!-- Aqui se hace los contenedores  del administrador de institucion -->
>>>>>>> 2982a2b8fcadcb4714a8d27c107d0bcc15c0d2d1
</div>
<div class="container-fluid">
    <ul class="nav nav-tabs nav-justified custom-tabs" style="font-size: 17px;">
      <li role="presentation" class="active"><a href="admininstitution.php">Institución</a></li>
      <li role="presentation"><a href="adminprovider.php">Proveedores</a></li>
      <li role="presentation"><a href="admincategory.php">Categorías</a></li>
<<<<<<< HEAD
      <li role="presentation"><a href="adminsection.php">Grupos</a></li>
=======
      <!-- <li role="presentation"><a href="adminsection.php">Secciones</a></li> -->
>>>>>>> 2982a2b8fcadcb4714a8d27c107d0bcc15c0d2d1
    </ul>
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



<div class="container-fluid institution-box" style="margin: 50px 0;">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3 text-center">
            <img src="../assets/img/institution.png" alt="user" 
                 class="img-responsive center-box" 
                 style="max-width: 110px;">
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
            Guarda los datos de tu institución, una vez almacenados los datos no podrás hacer más registros.
            Puedes actualizar la información actual, o eliminar el registro completamente y añadir uno nuevo, siempre
            y cuando no hayas registrado libros.
        </div>
    </div>
</div>

<style>
    .institution-box {
        background: #e8f5e9; /* verde muy claro */
        border: 1px solid #c8e6c9;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 3px 6px rgba(0,0,0,0.1);
    }

    .institution-box img {
        border: 3px solid #4caf50; /* borde verde */
        border-radius: 50%;
        padding: 5px;
        background-color: #fff;
    }

    .institution-box .lead {
        color: #2e7d32; /* texto verde oscuro */
        font-size: 16px;
        line-height: 1.6;
    }
</style>





        
        <?php 
            $checkInstitution=ejecutarSQL::consultar("SELECT * FROM institucion");
            if(mysqli_num_rows($checkInstitution)<=0){
        ?>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Guardar datos de la institución</div>
                <form action="../process/AddInstitution.php" method="post" class="form_SRCB" data-type-form="save"  autocomplete="off">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <legend class="all-tittles">Clabe de la institucion</legend><br>
                            </div>
                            <div class="col-xs-12">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general" placeholder="Clabe de la institucion" name="institutionCode" required="" pattern="[0-9]{1,15}" maxlength="15" data-toggle="tooltip" data-placement="top" title="Solo números, máximo 15 caracteres">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Clabe de la institucion</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <legend class="all-tittles">NOMBRE DE LA INSTITUCIÓN/DIRECTOR</legend><br>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general" placeholder="Nombre de la institución" name="institutionName" required="" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,50}" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe el nombre de la institución">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Nombre de la institución</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general" placeholder="Nombre del director o gerente de la institución" name="institutionDirector" required="" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{1,50}" maxlength="50" data-toggle="tooltip" data-placement="top" title="Nombre del director o gerente de la institución">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Nombre del director de la institución</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <legend class="all-tittles">ENCARGADO DE LA BIBLIOTECA</legend><br>
                            </div>
                            <div class="col-xs-12">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general" placeholder="Nombre del encargado de la biblioteca" name="institutionLibrarian" required="" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{1,50}" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe el nombre del encargado de la biblioteca">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Nombre del encargado de la biblioteca</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <legend class="all-tittles">TELÉFONO/AÑO</legend><br>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general" placeholder="Teléfono de la institución" name="institutionPhone" required="" pattern="[0-9+]{5,20}" maxlength="20" data-toggle="tooltip" data-placement="top" title="Solo números y símbolo +">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Teléfono</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general" placeholder="Año lectivo" name="institutionYear" required="" pattern="[0-9]{1,4}" maxlength="4" data-toggle="tooltip" data-placement="top" title="Solo números, máximo 4 caracteres">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Año</label>
                                </div>
                            </div>
                            <!-- <div class="col-xs-12 col-sm-4">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general" placeholder="Moneda que se utiliza en la institución" name="institutionCoin" required="" maxlength="1" data-toggle="tooltip" data-placement="top" title="Máximo 1 caracter, por ejemplo $">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Símbolo de moneda</label>
                                </div> -->
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-xs-12">
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
        <?php
            }else{
            $fila=mysqli_fetch_array($checkInstitution, MYSQLI_ASSOC);
        ?>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-green">Actualizar datos de la institución</div>
                <form action="../process/UpdateInstitution.php" method="post" class="form_SRCB" data-type-form="update"  autocomplete="off">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <legend class="all-tittles">Clabe de la institucion</legend><br>
                            </div>
                            <div class="col-xs-12">
                                <div class="group-material">
                                    <span>Clabe de la institucion</span>
                                    <input type="text" readonly value="<?php echo $fila["CodigoInfraestructura"]; ?>" class="material-control tooltips-general" name="institutionCode" required="" pattern="[0-9]{1,15}" maxlength="15">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <legend class="all-tittles">NOMBRE DE LA INSTITUCIÓN/DIRECTOR</legend><br>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input type="text" value="<?php echo $fila["Nombre"]; ?>" class="material-control tooltips-general" name="institutionName" required="" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,50}" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe el nombre de la institución">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Nombre de la institución</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input type="text" value="<?php echo $fila["NombreDirector"]; ?>" class="material-control tooltips-general" placeholder="Nombre del director o gerente de la institución" name="institutionDirector" required="" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{1,50}" maxlength="50" data-toggle="tooltip" data-placement="top" title="Nombre del director o gerente de la institución">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Nombre del director de la institución</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <legend class="all-tittles">ENCARGADO DE LA BIBLIOTECA</legend><br>
                            </div>
                            <div class="col-xs-12">
                                <div class="group-material">
                                    <input type="text" value="<?php echo $fila["NombreBibliotecario"]; ?>" class="material-control tooltips-general" placeholder="Nombre del encargado de la biblioteca" name="institutionLibrarian" required="" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ. ]{1,50}" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe el nombre del encargado de la biblioteca">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Nombre del encargado de la biblioteca</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <legend class="all-tittles">TELÉFONO/AÑO</legend><br>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="group-material">
                                    <input type="text" value="<?php echo $fila["Telefono"]; ?>" class="material-control tooltips-general" name="institutionPhone" required="" pattern="[0-9+]{5,20}" maxlength="20" data-toggle="tooltip" data-placement="top" title="Solo 8 números">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Teléfono</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="group-material">
                                    <input type="text" value="<?php echo $fila["Year"]; ?>" class="material-control tooltips-general" name="institutionYear" required="" pattern="[0-9]{1,4}" maxlength="4" data-toggle="tooltip" data-placement="top" title="Solo números, máximo 4 caracteres">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Año</label>
                                </div>
                            </div>
                            <!-- <div class="col-xs-12 col-sm-4">
                                <div class="group-material">
                                    <input type="text" value="<?php echo $fila["Moneda"]; ?>" class="material-control tooltips-general"  placeholder="Moneda que se utiliza en la institución" name="institutionCoin" required="" maxlength="1" data-toggle="tooltip" data-placement="top" title="Máximo 1 caracter, por ejemplo $">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Símbolo de moneda</label>
                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                           <div class="col-xs-12">
                                <p class="text-center">
                                    <button type="submit" class="btn btn-success"><i class="zmdi zmdi-refresh"></i> &nbsp;&nbsp; Actualizar</button>
                                </p>
                           </div>
                       </div>
                    </div>
               </form>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form"><i class="zmdi zmdi-delete"></i> &nbsp; Eliminar institución</div>
                <div class="row">
                    <div class="col-xs-12">
                        <?php 
                            $checkInstitutionBook=ejecutarSQL::consultar("SELECT * FROM libro");
                            if(mysqli_num_rows($checkInstitutionBook)>=1){
                                echo '<p class="text-center"><button  class="btn btn-danger btn-lg" disabled="disabled"><i class="zmdi zmdi-delete"></i> &nbsp;&nbsp; Eliminar</button></p>';
                            }else{
                                echo '<form action="../process/DeleteInstitution.php" method="post" class="form_SRCB" data-type-form="delete">   
                                    <input value="'. $fila["CodigoInfraestructura"] .'" type="hidden" name="primaryKey">
                                    <p class="text-center"><button type="submit" class="btn btn-danger btn-lg"><i class="zmdi zmdi-delete"></i> &nbsp;&nbsp; Eliminar</button></p>
                                </form>';
                            }
                            mysqli_free_result($checkInstitutionBook);
                        ?>
                    </div>
                </div>
            </div>
        </div> 
        <?php
            }
            mysqli_free_result($checkInstitution);
        ?>
        <div class="msjFormSend"></div>
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                </div>
                <div class="modal-body">
                    <?php include '../help/help-admininstitution.php'; ?>
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
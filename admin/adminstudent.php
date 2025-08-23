<!DOCTYPE html>
<html lang="es">
<head>
    <title>Estudiantes</title>
    <?php
        session_start();
        $LinksRoute="../";
        include '../inc/links.php'; 
    ?>
    <script src="../js/SendForm.js"></script>
    <script>
        $().ready(function(){
            $(".check-representative").keyup(function(){
              $.ajax({
                url:"../process/check-representative.php?DUI="+$(this).val(),
                success:function(data){
                  $(".representative-resul").html(data);
                }
              });
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
        <?php 
            include '../inc/NavUserInfo.php';
        ?>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Sistema bibliotecario <small>Administración Usuarios</small></h1>
            </div>
        </div>
        <div class="conteiner-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
              <li role="presentation"><a href="adminuser.php">Administradores</a></li>
              <li role="presentation"><a href="adminteacher.php">Docentes</a></li>
              <li role="presentation"  class="active"><a href="adminstudent.php">Estudiantes</a></li>
              <li role="presentation"><a href="adminpersonal.php">Personal administrativo</a></li>
            </ul>
        </div>
        <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="../assets/img/user03.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la sección para registrar nuevos estudiantes, para poder registrar un estudiante deberás de llenar todos los campos del siguiente formulario
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                      <li class="active">Nuevo estudiante</li>
                      <li><a href="adminliststudent.php">Listado de estudiantes</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Registrar un nuevo estudiante</div>
                <form action="../process/AddStudent.php" method="post" class="form_SRCB" data-type-form="save" autocomplete="off">
                    <?php
                        $checkTotalSection=ejecutarSQL::consultar("SELECT * FROM seccion");
                        if(mysqli_num_rows($checkTotalSection)<=0){
<<<<<<< HEAD
                            echo '<br><div class="alert alert-danger text-center" role="alert"><strong><i class="zmdi zmdi-alert-triangle"></i> &nbsp; ¡Importante!:</strong> No puedes registrar estudiantes, primero debes de agregar minimo un grupo al sistema</div>';
=======
                            echo '<br><div class="alert alert-danger text-center" role="alert"><strong><i class="zmdi zmdi-alert-triangle"></i> &nbsp; ¡Importante!:</strong> No puedes registrar estudiantes, primero debes de agregar secciones al sistema</div>';
>>>>>>> 2982a2b8fcadcb4714a8d27c107d0bcc15c0d2d1
                        }
                    ?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <legend class="all-tittles">DATOS DEL ESTUDIANTE</legend><br>
                            </div>
                            <div class="col-xs-12">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí la Matricula del alumno" name="studentNIE" required="" maxlength="20" data-toggle="tooltip" data-placement="top" title="Matricula del  estudiante">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Matricula</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí los nombres del alumno" name="studentName" required="" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" maxlength="50" data-toggle="tooltip" data-placement="top" title="Nombres del estudiante">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Nombres</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí los apellidos del alumno" name="studentSurname" required="" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" maxlength="50" data-toggle="tooltip" data-placement="top" title="Apellidos del estudiante">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Apellidos</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <legend class="all-tittles">GRUPO</legend><br>
                            </div>
                            <div class="col-xs-12">
                               <div class="group-material">
                                    <span>Grupo</span>
<<<<<<< HEAD
                                    <select class="material-control tooltips-general" name="studentSection" data-toggle="tooltip" data-placement="top" title="Elige los grupos al que pertenece el alumno">
=======
                                    <select class="material-control tooltips-general" name="studentSection" data-toggle="tooltip" data-placement="top" title="Elige la sección a la que pertenece el alumno">
>>>>>>> 2982a2b8fcadcb4714a8d27c107d0bcc15c0d2d1
                                        <option value="" disabled="" selected="">Selecciona un Grupo</option>
                                        <?php
                                            if(mysqli_num_rows($checkTotalSection)>0){
                                                while($fila=mysqli_fetch_array($checkTotalSection, MYSQLI_ASSOC)){
                                                    echo '<option value="'.$fila['CodigoSeccion'].'">'.$fila['Nombre'].'</option>';
                                                }
                                            }
                                            mysqli_free_result($checkTotalSection);
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-xs-12">
                                <legend class="all-tittles">DATOS DEL ENCARGADO</legend><br>
                            </div>
                            <div class="col-xs-12">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general" placeholder="Parentesco" name="representativeRelationship" required="" pattern="[a-zA-ZéíóúáñÑ ]{1,30}" maxlength="30" data-toggle="tooltip" data-placement="top" title="Parentesco">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Parentesco</label>
                                </div> 
                            </div>
                            <div class="col-xs-12">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general check-representative" placeholder="Escribe aquí la matricula del encargado" name="representativeDUI" pattern="[0-9-]{1,10}" required="" maxlength="10" data-toggle="tooltip" data-placement="top" title="Solamente números y guiones, 10 dígitos">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Matricula del encargado</label>
                                </div>
                            </div> -->
                            <div class="col-xs-12 representative-resul"></div>
                            <div class="col-xs-12">
                                <legend class="all-tittles">DATOS DE LA CUENTA <small>(para ingresar al sistema)</small></legend><br>
                            </div>
                            <div class="col-xs-12">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general input-check-user" data-user="Student" placeholder="Nombre de usuario" name="UserName" required="" maxlength="20" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,20}" data-toggle="tooltip" data-placement="top" title="Escribe un nombre de usuario sin espacios, que servira para iniciar sesión">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Nombre de usuario</label>
                                    <div class="check-user-bd"></div>
                               </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input type="password" class="material-control tooltips-general" placeholder="Contraseña" name="Password1" required="" maxlength="200" data-toggle="tooltip" data-placement="top" title="Escribe una contraseña">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Contraseña</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input type="password" class="material-control tooltips-general" placeholder="Repite la contraseña" name="Password2" required="" maxlength="200" data-toggle="tooltip" data-placement="top" title="Repite la contraseña">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Repetir contraseña</label>
                                </div>
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
        <div class="msjFormSend"></div>
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                </div>
                <div class="modal-body">
                    <?php include '../help/help-adminstudent.php'; ?>
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
<<<<<<< HEAD
<style>
    /* ================== Colores principales ================== */
    :root {
        --verde-bandera: #006400;
        --verde-oscuro: #004d00;
        --verde-medio: #1f7a1f;
        --verde-claro: #e8f5e9;
        --verde-borde: #c8e6c9;
    }

    /* ================== Pestañas ================== */
    .nav-tabs > li.active > a {
        background-color: var(--verde-bandera);
        color: #fff !important;
        border: 1px solid var(--verde-oscuro);
    }
    .nav-tabs > li > a {
        color: var(--verde-bandera);
        border: 1px solid var(--verde-borde);
        background-color: #f1f8f1;
        transition: 0.3s;
    }
    .nav-tabs > li > a:hover {
        background-color: var(--verde-medio);
        color: #fff !important;
        border: 1px solid var(--verde-oscuro);
    }

    /* ================== Contenedor Bienvenida ================== */
    .institution-box {
        background: var(--verde-claro);
        border: 1px solid var(--verde-borde);
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.12);
        transition: 0.3s;
    }
    .institution-box:hover {
        box-shadow: 0 10px 25px rgba(0,0,0,0.18);
    }
    .institution-box img {
        border: 3px solid var(--verde-bandera);
        border-radius: 50%;
        padding: 5px;
        background-color: #fff;
    }
    .institution-box .lead {
        color: var(--verde-medio);
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
        background-color: var(--verde-bandera);
    }

    /* Inputs */
    .group-material {
        position: relative;
        margin-bottom: 25px;
    }
    .group-material input,
    .group-material select {
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
    .group-material input:focus,
    .group-material select:focus {
        border-bottom: 2px solid var(--verde-bandera);
        box-shadow: 0 2px 10px rgba(0,100,0,0.2);
    }
    .group-material label {
        position: absolute;
        top: 10px;
        left: 5px;
        font-size: 16px;
        color: var(--verde-bandera);
        pointer-events: none;
        transition: 0.3s;
    }
    .group-material input:focus + label,
    .group-material input:not(:placeholder-shown) + label,
    .group-material select:focus + label,
    .group-material select:not([value=""]) + label {
        top: -10px;
        font-size: 12px;
        color: var(--verde-medio);
    }

    /* ================== Botones ================== */
    .btn-flat {
        border-radius: 8px;
        padding: 10px 25px;
        font-weight: bold;
        transition: 0.3s;
    }
    .btn-primary, .btn-success {
        background-color: var(--verde-bandera) !important;
        border: none !important;
        color: #fff !important;
    }
    .btn-primary:hover, .btn-success:hover {
        background: linear-gradient(45deg, var(--verde-bandera), var(--verde-medio)) !important;
    }
    .btn-info {
        background-color: #17a2b8 !important;
        border: none !important;
        color: #fff !important;
    }
    .btn-info:hover {
        background: #138496 !important;
    }

    /* ================== Breadcrumb ================== */
    .breadcrumb li.active {
        color: var(--verde-bandera);
        font-weight: bold;
    }

    /* Animación inputs */
    .material-control {
        transition: all 0.3s ease;
    }

    /* ================== Encabezados ================== */
    .page-header h1 {
        color: var(--verde-bandera);
        font-weight: bold;
    }
    legend.all-tittles {
        color: var(--verde-bandera);
        font-size: 18px;
        font-weight: bold;
        border-bottom: 2px solid var(--verde-borde);
        padding-bottom: 5px;
        margin-bottom: 15px;
    }
</style>
=======
>>>>>>> 9cb6ae2 (Primer commit)
</html>
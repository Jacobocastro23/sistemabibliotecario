<!DOCTYPE html>
<html lang="es">
<head>
    <title>Docentes</title>
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
              <h1 class="all-tittles">Sistema bibliotecario <small>Administración Usuarios</small></h1>
            </div>
        </div>
        <div class="conteiner-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
                <li role="presentation"><a href="adminuser.php">Administradores</a></li>
                <li role="presentation"  class="active"><a href="adminteacher.php">Docentes</a></li>
                <li role="presentation"><a href="adminstudent.php">Estudiantes</a></li>
                <li role="presentation"><a href="adminpersonal.php">Personal administrativo</a></li>
            </ul>
        </div>
        <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="../assets/img/user02.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la sección para registrar nuevos docentes. Para registrar un docente debes de llenar todos los campos del siguiente formulario, también puedes ver el listado de docentes registrados
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                      <li class="active">Nuevo docente</li>
                      <li><a href="adminlistteacher.php">Listado de docentes</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Registrar un nuevo docente</div>
                <form action="../process/AddTeacher.php" method="post" class="form_SRCB" data-type-form="save" autocomplete="off">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <legend class="all-tittles">DATOS BÁSICOS</legend><br>
                            </div>
                            <div class="col-xs-12">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el número de Matricula del  docente" name="teachingDUI" pattern="[0-9-]{1,10}" required="" maxlength="10" data-toggle="tooltip" data-placement="top" title="Solamente números y guiones, 10 dígitos">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Matricula</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí los nombres del docente" name="teachingName" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe los nombres del docente, solamente letras">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Nombres</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí los apellidos del docente" name="teachingSurname" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe los apellidos del docente, solamente letras">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Apellidos</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el número de teléfono del docente" name="teachingPhone" pattern="[0-9+]{5,20}" required="" maxlength="20" data-toggle="tooltip" data-placement="top" title="Solamente números y +">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Teléfono</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí la especialidad del docente" name="teachingSpecialty" required="" maxlength="40" data-toggle="tooltip" data-placement="top" title="Especialidad del docente">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Especialidad</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <legend class="all-tittles">TURNO</legend><br>
                            </div>
                            <!-- <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <span>Sección encargada</span>
                                    <select class="material-control tooltips-general" name="teachingSection" data-toggle="tooltip" data-placement="top" title="Elige la sección encargada del docente">
                                        <option value="Sin asignar" selected="">Sin asignar</option>
                                        <?php
                                            $checkSection=ejecutarSQL::consultar("SELECT * FROM seccion ORDER BY Nombre");
                                            while($fila=mysqli_fetch_array($checkSection, MYSQLI_ASSOC)){
                                                $checkSectionTeacher=ejecutarSQL::consultar("SELECT * FROM docente WHERE CodigoSeccion='".$fila['CodigoSeccion']."'");
                                                if(mysqli_num_rows($checkSectionTeacher)<=0){
                                                   echo '<option value="'.$fila['CodigoSeccion'].'">'.$fila['Nombre'].'</option>'; 
                                                } 
                                                mysqli_free_result($checkSectionTeacher);
                                            }
                                            mysqli_free_result($checkSection);
                                        ?>
                                    </select>
                                </div>
                            </div> -->
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <span>Turno</span>
                                    <select class="material-control tooltips-general" name="teachingTime" data-toggle="tooltip" data-placement="top" title="Elige el turno que labora el docente">
                                        <option value="Mañana">Mañana</option>
                                        <option value="Tarde">Tarde</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <legend class="all-tittles">DATOS DE LA CUENTA <small>(para ingresar al sistema)</small></legend><br>
                            </div>
                            <div class="col-xs-12">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general input-check-user" data-user="Teacher" placeholder="Nombre de usuario" name="UserName" required="" maxlength="20" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,20}" data-toggle="tooltip" data-placement="top" title="Escribe un nombre de usuario sin espacios, que servira para iniciar sesión">
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
                    <?php include '../help/help-adminteacher.php'; ?>
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
        .group-material input:not(:placeholder-shown) + label,
        .group-material select:focus + label,
        .group-material select:not([value=""]) + label {
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
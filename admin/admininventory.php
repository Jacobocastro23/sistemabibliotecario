<!DOCTYPE html>
<html lang="es">
<head>
    <title>Nuevo Libro</title>
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
              <h1 class="all-tittles">Sistema bibliotecario <small>Añadir libro</small></h1>
            </div>
        </div>
        <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="../assets/img/flat-book.png" alt="pdf" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la sección para agregar nuevos libros a la biblioteca, deberas de llenar todos los campos para poder registrar el libro
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <form action="../process/AddBook.php" method="POST" id="saveData" autocomplete="off" enctype="multipart/form-data">
                <div class="container-flat-form">
                    <div class="title-flat-form title-flat-blue">Nuevo libro</div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12">
                                <legend class="all-tittles">INFORMACIÓN BÁSICA</legend><br>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-lg-12">
                                <div class="group-material">
                                    <input type="text" class="tooltips-general material-control" placeholder="Escribe aquí el código del libro" name="bookCodeManual" pattern="[a-zA-Z0-9-]{1,100}" maxlength="100" data-toggle="tooltip" data-placement="top" title="Solamente números, letras y guiones">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Código de libro</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-lg-4">
                                <div class="group-material">
                                    <input type="text" class="tooltips-general material-control" placeholder="Escribe aquí el título o nombre del libro" name="bookName" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Escribe el título o nombre del libro">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Título</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-lg-4">
                                <div class="group-material">
                                    <input type="text" class="tooltips-general material-control" placeholder="Escribe aquí el autor del libro" name="bookAutor" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Escribe el nombre del autor del libro">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Autor</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-lg-4">
                                <div class="group-material">
                                    <input type="text" class="tooltips-general material-control" placeholder="Escribe aquí el país del libro" required="" name="bookCountry" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe el país del libro">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>País</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <legend class="all-tittles">CATEGORÍA</legend><br>
                            </div>
                            <div class="col-xs-12">
                                <div class="group-material">
                                    <span>Categoría</span>
                                    <select class="tooltips-general material-control" name="bookCategory" data-toggle="tooltip" data-placement="top" title="Elige la categoría del libro">
                                        <option value="" disabled="" selected="">Selecciona una categoría</option>
                                        <?php
                                            $checkCategory= ejecutarSQL::consultar("SELECT * FROM categoria");
                                            while($fila=mysqli_fetch_array($checkCategory, MYSQLI_ASSOC)){
                                                echo '<option value="'.$fila['CodigoCategoria'].'">'.$fila['Nombre'].'</option>'; 
                                            }
                                            mysqli_free_result($checkCategory);
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <legend class="all-tittles">PROVEEDOR</legend><br>
                            </div>
                            <div class="col-xs-12">
                                <div class="group-material">
                                    <span>Proveedor</span>
                                    <select class="tooltips-general material-control" name="bookProvider" data-toggle="tooltip" data-placement="top" title="Elige el proveedor del libro">
                                        <option value="" disabled="" selected="">Selecciona un proveedor</option>
                                        <?php
                                            $checkProvider= ejecutarSQL::consultar("SELECT * FROM proveedor");
                                            while($fila=mysqli_fetch_array($checkProvider, MYSQLI_ASSOC)){
                                                echo '<option value="'.$fila['CodigoProveedor'].'">'.$fila['Nombre'].'</option>'; 
                                            }
                                            mysqli_free_result($checkProvider);
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <legend class="all-tittles">OTROS DATOS</legend><br>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                               <div class="group-material">
                                   <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el año del libro" name="bookYear" required="" pattern="[0-9]{1,4}" maxlength="4" data-toggle="tooltip" data-placement="top" title="Solamente números, sin espacios">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Año</label>
                               </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí la editorial del libro" name="bookEditorial" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Editorial del libro">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Editorial</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí la edición del libro" name="bookEdition" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Edición del libro">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Edición</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general"  placeholder="Escribe aquí la cantidad de libros que registraras" name="bookCopies" required="" pattern="[0-9]{1,7}" maxlength="7" data-toggle="tooltip" data-placement="top" title="¿Cuántos libros registraras?">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Ejemplares</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <legend class="all-tittles">UBICACIÓN/CARGO/VALOR/RESUMEN</legend><br>
                            </div>
                            <div class="col-xs-12">
                                <div class="group-material">
                                    <span>Cargo</span>
                                    <select class="tooltips-general material-control" name="bookOffice" data-toggle="tooltip" data-placement="top" title="Elige el cargo del libro">
                                        <option value="" disabled="" selected="">Selecciona el cargo del libro</option>
                                        <option value="Entrega del ministerio">Entrega del ministerio</option>
                                        <option value="Donaciones">Donaciones</option>
                                        <option value="Compras con fondos propios">Compras con fondos propios</option>
                                        <option value="Presupuesto escolar">Presupuesto escolar</option>
                                        <option value="Otros">Otros</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                   <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí la ubicación del libro" name="bookLocation" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="¿Dónde se ubicara el libro?">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Ubicación</label>
                                </div>
                            </div> -->
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el precio estimado del libro" name="bookEstimated" required="" pattern="[0-9.]{1,7}" maxlength="7" data-toggle="tooltip" data-placement="top" title="Sólo números y un punto si el valor posee decimales. Ejemplo: 7.79">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Valor estimado</label>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="group-material">
                                    <span>Resumen del libro</span>
                                    <textarea class="material-control" name="bookDescription" rows="7" placeholder="Escribe aquí el resumen del libro"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <legend class="all-tittles">IMÁGEN Y ARCHIVO PDF</legend><br>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <span class="lead"><i class="zmdi zmdi-image"></i> Imágen</span>
                                    <input type="file" name="bookPicture">
                                    <small>Archivos permitidos: jpg, png<br>Tamaño máximo: 5MB</small>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="group-material">
                                    <span class="lead"><i class="zmdi zmdi-file"></i> PDF</span>
                                    <input type="file" name="bookPDF">
                                    <small>Archivos permitidos: PDF<br>Tamaño máximo: 100MB</small>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <span class="lead">¿El archivo PDF será visible para los usuarios?</span><br>
                                    <label for="download1">
                                        <input type="radio" name="bookDownload" id="download1" value="yes"> Si
                                    </label>
                                    <br>
                                    <label for="download2">
                                        <input type="radio" name="bookDownload" id="download2" checked="" value="no"> No
                                    </label>
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
                </div>
            </form>
        </div>
        <div class="msjFormSend"></div>
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                </div>
                <div class="modal-body">
                    <?php include '../help/help-admininventory.php'; ?>
                </div> -->
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
        /* ================== Contenedores ================== */
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

        .lead {
            color: #2e7d32;
        }

        /* ================== Inputs ================== */
        .group-material {
            position: relative;
            margin-bottom: 25px;
        }
        .group-material input,
        .group-material select,
        .group-material textarea {
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
        .group-material select:focus,
        .group-material textarea:focus {
            border-bottom: 2px solid #006400;
            box-shadow: 0 2px 10px rgba(0,100,0,0.2);
        }
        .group-material label,
        .group-material span {
            color: #006400;
            font-weight: 500;
        }
        .group-material label {
            position: absolute;
            top: 10px;
            left: 5px;
            font-size: 16px;
            pointer-events: none;
            transition: 0.3s;
        }
        .group-material input:focus + label,
        .group-material input:not(:placeholder-shown) + label,
        .group-material select:focus + label,
        .group-material select:not([value=""]) + label,
        .group-material textarea:focus + label,
        .group-material textarea:not(:placeholder-shown) + label {
            top: -10px;
            font-size: 12px;
            color: #1f7a1f;
        }

        /* ================== Botones ================== */
        .btn-flat {
            border-radius: 8px;
            padding: 10px 25px;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-primary.btn-flat,
        .btn-success.btn-flat {
            background-color: #006400;
            border: none;
            color: #fff;
        }
        .btn-primary.btn-flat:hover,
        .btn-success.btn-flat:hover {
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
        .breadcrumb li.active {
            color: #006400;
            font-weight: bold;
        }

        /* ================== Imagenes ================== */
        .center-box {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</html>
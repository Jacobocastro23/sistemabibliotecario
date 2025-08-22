<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
     <title>Inicio de sesión</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/linces.png" />
    <?php
        $LinksRoute="./";
        include './inc/links.php'; 
    ?>
    <link rel="stylesheet" >
    <script src="js/SendForm.js"></script>
    <style>
      /* Estilos generales para el body */
      body.full-cover-background {
          background-image: url('assets/img/image.png');
          background-size: cover;
          background-position: center;
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
          margin: 0;
          height: 100vh;
          display: flex;
          justify-content: center;
          align-items: center;
      }

      /* Contenedor del formulario */
      .form-container {
          background: rgba(255, 255, 255, 0.9);
          padding: 40px 30px;
          border-radius: 12px;
          box-shadow: 0 8px 20px rgba(0,0,0,0.2);
          width: 360px;
      }

      /* Icono principal */
      .form-container p.text-center i {
          color: #165336;
          font-size: 5rem;
          margin-bottom: 15px;
      }

      /* Título */
      h4.all-tittles {
          text-align: center;
          font-weight: 600;
          color: #165336;
          margin-bottom: 30px;
          text-transform: uppercase;
          letter-spacing: 1.2px;
      }

      /* Grupos de input */
      .group-material-login {
          position: relative;
          margin-bottom: 25px;
      }

      .material-login-control {
          width: 100%;
          border: none;
          border-bottom: 2px solid #ccc;
          font-size: 16px;
          padding: 12px 5px 8px 35px;
          outline: none;
          background: transparent;
          transition: border-color 0.3s;
      }

      .material-login-control:focus {
          border-bottom-color: #165336;
      }

      /* Ocultar placeholder pero necesario para :placeholder-shown */
      .material-login-control::placeholder {
          color: transparent;
      }

      /* Label posicionado sobre el input */
      .group-material-login label {
          position: absolute;
          top: 12px;
          left: 35px;
          color: #999;
          font-size: 18px;
          pointer-events: none;
          transition: 0.3s ease all;
          display: flex;
          align-items: center;
          gap: 6px;
          background: transparent;
      }

      /* Cuando el input está enfocado o tiene contenido */
      .material-login-control:focus + label,
      .material-login-control:not(:placeholder-shown) + label {
          top: -10px;
          left: 5px;
          font-size: 14px;
          color: #165336;
          background: white;
          padding: 0 5px;
          font-weight: 600;
          border-radius: 4px;
      }

      /* Select personalizado */
      .material-control-login {
          width: 100%;
          padding: 10px 10px;
          font-size: 16px;
          border: 2px solid #ccc;
          border-radius: 6px;
          background-color: white;
          color: #333;
          cursor: pointer;
          transition: border-color 0.3s;
      }

      .material-control-login:focus {
          border-color: #165336;
          outline: none;
      }

      /* Botón */
      .btn-login {
          width: 100%;
          background-color: #165336;
          border: none;
          padding: 12px 0;
          color: white;
          font-weight: 600;
          font-size: 16px;
          border-radius: 8px;
          cursor: pointer;
          display: flex;
          justify-content: center;
          align-items: center;
          gap: 10px;
          transition: background-color 0.3s ease;
      }

      .btn-login:hover {
          background-color: #123f29; /* verde más oscuro para hover */
      }

      /* Ocultar elementos innecesarios */
      .highlight-login,
      .bar-login {
          display: none;
      }
    </style>
</head>
<body class="full-cover-background">
    <div class="form-container">
        <p class="text-center" style="margin-top: 17px;">
          <img 
            src="assets/img/linces.png" 
            alt="Usuario" 
            style="
              width: 80px;
              height: 80px;
              border-radius: 50%;
              object-fit: cover;
              display: inline-block;
            "
          />
        </p>

        <h4 class="text-center all-tittles" style="margin-bottom: 30px;">inicia sesión con tu cuenta</h4>
        <form action="process/login.php" method="post" class="form_SRCB" data-type-form="login" autocomplete="off">
            <div class="group-material-login">
              <input type="text" id="loginName" class="material-login-control"  name="loginName" required maxlength="70" placeholder=" " />
              <label for="loginName"><i class="zmdi zmdi-account"></i> Usuario</label>
            </div><br>
            <div class="group-material-login">
              <input type="password" id="loginPassword" class="material-login-control" name="loginPassword" required maxlength="70" placeholder=" " />
              <label for="loginPassword"><i class="zmdi zmdi-lock"></i> Contraseña</label>
            </div>
            <div class="group-material">
                <select class="material-control-login" name="UserType">
                    <option value="" disabled selected>Tipo de usuario</option>
                    <option value="Student">Estudiante</option>
                    <option value="Teacher">Docente</option>
                    <option value="Personal">Personal administrativo</option>
                    <option value="Admin" selected>Administrador</option>
                </select>
            </div>
            <button class="btn-login" type="submit">Ingresar al sistema &nbsp; <i class="zmdi zmdi-arrow-right"></i></button>
        </form>
    </div>  
    <div class="msjFormSend hidden"></div>
</body>
</html>
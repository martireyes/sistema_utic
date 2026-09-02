<?php
session_start();
if ($_SESSION){
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <script>
        (() => {'use strict';const root = document.documentElement;
        if (root.getAttribute('data-lte-color-mode') === 'off') {
          return;
        }
        const STORAGE_KEY = 'lte-theme';
        let stored = null;
        try {
          stored = localStorage.getItem(STORAGE_KEY);
        } catch {
        }
        const authored = root.getAttribute('data-bs-theme');
        let resolved = 'light';
        if (stored === 'dark' || stored === 'light') {
          resolved = stored;
        } else if (authored === 'dark' || authored === 'light') {
          resolved = authored;
        } else if (globalThis.matchMedia('(prefers-color-scheme: dark)').matches) {
          resolved = 'dark';
        }
        root.setAttribute('data-bs-theme', resolved);
        root.style.colorScheme = resolved;
        if (resolved !== authored) {
          root.setAttribute('data-lte-theme-resolved', '');
        }
        })();
        </script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>LP3 | Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes"/>
        <meta name="color-scheme" content="light dark" />
        <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
        <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
        <link rel="shortcut icon" type="image/x-icon" href="img/venta.png">
        <meta name="title" content="LP3 | Login" />
        <meta name="author" content="ColorlibHQ" />
        <meta name="supported-color-schemes" content="light dark" />
        <link rel="preload" href="css/adminlte.css" as="style" />
        <link rel="stylesheet" href="css/source-sans-3.css" />
        <link rel="stylesheet" href="css/overlayscrollbars.min.css" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/adminlte.css" />
    </head>


    <body class="login-page bg-body-secondary">
        <main class="login-box">    
        <!-- <div class="container wll" id="sha">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <img src="img/user.png" class="img-responsive center-block" id="user">
                </div>
            </div>
        </div> -->
        <h1 class="login-logo">
            <a href="#"><b>Compra | Venta</b></a>
        </h1>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Iniciar sesión con su usuario</p>
                <form action="acceso.php" method="post">
                     <label class="visually-hidden" for="loginEmail">Usuario</label>
                     <div class="input-group mb-3">
                        <input id="usuario" type="text" class="form-control" placeholder="Usuario" />
                        <div class="input-group-text">
                            <span class="bi bi-envelope"></span>
                        </div>
                    </div>







                <input type="text" class="form-control" name="usuario" required="" autofocus="" placeholder="Ingrese su usuario"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="clave" required="" autofocus="" placeholder="Ingrese su clave"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button>
            <div class="checkbox">
                <label class="checkbox"><input type="checkbox" value="1" name="recuerdame"/>No cerrar sesión</label>
                <p class="help-block"><a href="#">¿No puede acceder a su cuenta?</a></p>
            </div>
            <?php
            //Mensaje de error
            if(!empty($_SESSION['error'])){?>
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign"></span>
                <?php echo $_SESSION['error']; ?>
            </div>
            <?php } ?>
        </form>
            </div>
        </div>
        </main>
        <script src="js/jquery-1.12.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
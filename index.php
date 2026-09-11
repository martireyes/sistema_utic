<?php
session_start();
if ($_SESSION){
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>LP3 | Acceso</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
        <meta name="color-scheme" content="light dark" />
        <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
        <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.9.1/dist/css/adminlte.min.css" />
        <link rel="shortcut icon" type="image/x-icon" href="img/venta.png">
    </head>
    <body>
        <div class="login-page bg-body-secondary">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <img src="img/user.png" class="img-responsive" id="user"/>
                </div>
            </div>
            <form class="login" action="acceso.php" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="usuario" required="" autofocus="" placeholder="Ingrese su usuario"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="clave" required="" autofocus="" placeholder="Ingrese su clave"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesi&oacute;n</button>
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
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign"></span>
                        Error de inicio
                    
                 </div>
                </div>
                <?php } ?>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@4.9.1/dist/js/adminlte.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>
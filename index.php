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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" media="print" onload="this.media = 'all'" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.9.1/dist/css/adminlte.min.css" />
        <link rel="shortcut icon" type="image/x-icon" href="img/venta.png">
    </head>
    <body>
        <div class="login-page bg-body-secondary">
            <main class="login-box">
                <h1 class="login-logo">
                    <a href="index.php"><b>LP3</b> | Acceso</a>
                </h1>
                <div class="card">
                    <div class="card-body login-card-body">
                        <p class="login-box-msg">Ingrese sus credenciales para iniciar sesión</p>

                        <form action="acceso.php" method="post">
                            <label for="validationTooltipUsername" class="visually-hidden" for="loginUser">Usuario</label>
                            <div class="input-group mb-3">
                                <input id="loginUser" type="text" class="form-control" name="usuario" placeholder="Usuario" required>
                                <div class="input-group-text">
                                    <span class="bi bi-envelope"></span>
                                </div>
                            </div>
                            <label class="visually-hidden" for="loginClave">Clave</label>
                            <div class="input-group mb-3">
                                <input id="loginClave" type="password" class="form-control" name="clave" placeholder="Clave"/>
                                <div class="input-group-text">
                                    <span class="bi bi-lock-fill"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="recuerdame">
                                        <label class="form-check-label" for="flexCheckDefault">Recuerdame</label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="d-grip gap-2">
                                        <button type="submit" class="btn btn-primary">Ingresar</button>
                                    </div>
                                </div>
                            </div>
                           <!-- <?php //Mensaje de error
                            if(!empty($_SESSION['error'])){?>
                            <div class="alert alert-danger" role="alert">
                                <span class="glyphicon glyphicon-exclamation-sign"></span>
                                <?php echo $_SESSION['error']; ?>
                                <div class="alert alert-danger" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign"></span>
                                    Error de inicio
                                </div>
                            </div>
                            <?php } ?> -->
                        </form>
                    </div>
                </div>
            </main>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@4.9.1/dist/js/adminlte.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>